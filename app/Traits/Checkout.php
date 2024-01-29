<?php

namespace App\Traits;

use App\Models\Product;

trait Checkout
{

  public function StripePayment($order,$user)
  {

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

      $unit_amount = intval($product->sale * 100);

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
    $checkout=\Stripe\Checkout\Session::create([
      'line_items' =>[$productItems],
      'mode'=>'payment',
      'allow_promotion_codes'=>false,
      'metadata' =>['user_id'=>$user->id],
      'customer_email'=>$user->email,
      'success_url'=>route('success')."?session_id={CHECKOUT_SESSION_ID}",
      'cancel_url'=>route('cancel'),
    ]);

    $order->update(["bill"=>$bill,"p_id"=>$checkout->id]);

    return redirect()->away($checkout->url);

  }

}
