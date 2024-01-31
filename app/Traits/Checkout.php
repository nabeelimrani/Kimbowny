<?php

namespace App\Traits;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
trait Checkout
{

  public function StripePayment($order,$user)
  {
    $shippingfee=null;
    $productItems=[];
    $bill=0;
    \Stripe\Stripe::setApiKey(config('keys.s_sk'));
    $productItems = [];
    foreach (session()->get('cart', []) as $key => $cart) {
      $qty = $cart['qty'];
      $id = $cart['id'];
      $color=$cart['color']??null;
      $size=$cart['size']??null;
      $product = Product::find($id);

      if ($order->discount) {

        $discountedPrice = $product->sale - ($product->sale * ($order->discount / 100));
        $unit_amount = intval($discountedPrice * 100);
      } else {

        $unit_amount = intval($product->sale * 100);
      }


      $productItems[] = [
        'price_data' => [
          'currency' => 'AED',
          'product_data' => [
            'name' => $product->name,
          ],
          'unit_amount' => $unit_amount,
        ],
        'quantity' => $qty,
      ];
      $bill += $product->sale * $qty;

      $order->products()->attach($id, [
        "quantity" => $qty,
        "sale" => $product->sale,
        "purchase" => $product->purchase,
        "total" => $product->sale * $qty,
        "item_color"=>$color,
        "item_size"=>$size,
      ]);
    }

    if ($order->discount) {
      $bill = $bill - ($bill * ($order->discount / 100));
    }

    $checkout=\Stripe\Checkout\Session::create([
      'line_items' =>[$productItems],
      'mode'=>'payment',
      'allow_promotion_codes'=>false,
      'metadata' =>['user_id'=>$user->id],
      'customer_email'=>$user->email,
      'success_url'=>route('success')."?session_id={CHECKOUT_SESSION_ID}",
      'cancel_url'=>route('cancel'),
    ]);
    if($user->country=="Saudi Arabia")
    {
      $bill+=30;
      $shippingfee=30;
    }
    if($bill<=100)
    {
      if($user->country=="United Arab Emirates")
      {
        $bill+=10;
        $shippingfee=10;
      }
    }
    $order->update(["bill"=>$bill,"p_id"=>$checkout->id,"shippingfee"=>$shippingfee]);

    return redirect()->away($checkout->url);

  }
  public function tabbypayment($order,$user)
  {
    $bill=0;
    $shippingfee=null;
    $items = collect([]);

    foreach (session()->get('cart', []) as $key => $cart) {
      $qty = $cart['qty'];
      $id = $cart['id'];
      $color=$cart['color']??null;
      $size=$cart['size']??null;
      $product = Product::find($id);

      if ($order->discount) {

        $discountedPrice = $product->sale - ($product->sale * ($order->discount / 100));
        $unit_amount = intval($discountedPrice * 100);
      } else {

        $unit_amount = intval($product->sale * 100);
      }


      $items->push([
        'title' => $product->name,
        'quantity' => intval($qty),
        'unit_price' => $unit_amount,
        'category' => $product->category->name,
      ]);
      $bill += $product->sale * $qty;

      $order->products()->attach($id, [
        "quantity" => $qty,
        "sale" => $product->sale,
        "purchase" => $product->purchase,
        "total" => $product->sale * $qty,
        "item_color"=>$color,
        "item_size"=>$size,
      ]);
    }
    if ($order->discount) {
      $bill = $bill - ($bill * ($order->discount / 100));
    }
    $order_data = [
      'amount'=> intval($bill),
      'currency' => 'AED',
      'description'=> 'description',
//      'full_name'=> $user->fullname,
//      'buyer_phone'=> $user->phone,
//      'buyer_email' => $user->email,
//      'address'=> $user->address,
//      'city' => $user->city,
//      'zip'=> $user->zipcode,
      'full_name'=> 'ALi Omer',
      'buyer_phone'=> '+971500000001',
      'buyer_email' => 'card.success@tabby.ai',
      'address'=> 'Saudi Riyadh',
      'city' => 'Riyadh',
      'zip'=> '1234',


      'order_id'=> (string) $order->id,
      'registered_since' => '11-12-2023',
      'loyalty_level'=> 0,
      'success-url'=> route('success-ur'),
      'cancel-url' => route('cancel-ur'),
      'failure-url' => route('failure-ur'),
      'items' => $items,
    ];
    $body = $this->getConfig( $order_data);

    $http = Http::withToken(config('keys.t_sk'))->baseUrl("https://api.tabby.ai/api/v2/");

    $response = $http->post('checkout',$body);

    $payment= $response->object();
    if($user->country=="Saudi Arabia")
    {
      $bill+=30;
      $shippingfee=30;
    }
    if($bill<=100)
    {
      if($user->country=="United Arab Emirates")
      {
        $bill+=10;
        $shippingfee=10;
      }
    }
    $order->update(["bill"=>$bill,"p_id"=>$payment->payment->id,"shippingfee"=>$shippingfee]);
    $redirect_url = $payment->configuration->available_products->installments[0]->web_url;

    return redirect($redirect_url);





  }
  public function getConfig($data)
  {
    $body= [];

    $body = [
      "payment" => [
        "amount" => $data['amount'],
        "currency" => $data['currency'],
        "description" =>  $data['description'],
        "buyer" => [
          "phone" => $data['buyer_phone'],
          "email" => $data['buyer_email'],
          "name" => $data['full_name'],
          "dob" => null,
        ],
        "shipping_address" => [
          "city" => $data['city'],
          "address" =>  $data['address'],
          "zip" => $data['zip'],
        ],
        "order" => [
          "tax_amount" => "0.00",
          "shipping_amount" => "0.00",
          "discount_amount" => "0.00",
          "updated_at" => now(),
          "reference_id" => $data['order_id'],
          "items" =>
            $data['items']
          ,
        ],
        "buyer_history" => [
          "registered_since" => Carbon::createFromFormat('d-m-Y', $data['registered_since'])->format('c'),
          "loyalty_level" => $data['loyalty_level'],
        ],
      ],

      "lang" => app()->getLocale(),
      "merchant_code" => "uae",
      "merchant_urls" => [
        "success" => $data['success-url'],
        "cancel" => $data['cancel-url'],
        "failure" => $data['failure-url'],
      ]
    ];

    return $body;
  }
}
