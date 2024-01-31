<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller
{
  public function success_s(Request $request)
  {
    return $this->updateSuccess($request);
  }
  public function getcities()
  {
    $country=request('val');
    $output="";
    if($country == "United Arab Emirates")
    {
      $output = '<option ' . (old('city') == 'Abu Dhabi' ? 'selected' : '') . '>Abu Dhabi</option>' .
        '<option ' . (old('city') == 'Dubai' ? 'selected' : '') . '>Dubai</option>' .
        '<option ' . (old('city') == 'Sharjah' ? 'selected' : '') . '>Sharjah</option>' .
        '<option ' . (old('city') == 'Al Ain' ? 'selected' : '') . '>Al Ain</option>' .
        '<option ' . (old('city') == 'Ajman' ? 'selected' : '') . '>Ajman</option>' .
        '<option ' . (old('city') == 'Ras Al Khaimah' ? 'selected' : '') . '>Ras Al Khaimah</option>' .
        '<option ' . (old('city') == 'Fujairah' ? 'selected' : '') . '>Fujairah</option>' .
        '<option ' . (old('city') == 'Umm Al Quwain' ? 'selected' : '') . '>Umm Al Quwain</option>' .
        '<option ' . (old('city') == 'Khor Fakkan' ? 'selected' : '') . '>Khor Fakkan</option>' .
        '<option ' . (old('city') == 'Dibba Al-Fujairah' ? 'selected' : '') . '>Dibba Al-Fujairah</option>' .
        '<option ' . (old('city') == 'Jebel Ali' ? 'selected' : '') . '>Jebel Ali</option>' .
        '<option ' . (old('city') == 'Madinat Zayed' ? 'selected' : '') . '>Madinat Zayed</option>' .
        '<option ' . (old('city') == 'Ruwais' ? 'selected' : '') . '>Ruwais</option>' .
        '<option ' . (old('city') == 'Ghayathi' ? 'selected' : '') . '>Ghayathi</option>' .
        '<option ' . (old('city') == 'Liwa Oasis' ? 'selected' : '') . '>Liwa Oasis</option>';

    }
    if($country == "Saudi Arabia")
    {
      $output="
<option value=''>Choose...</option>
    <option value='Riyadh'>Riyadh</option>
    <option value='Jeddah'>Jeddah</option>
    <option value='Mecca'>Mecca</option>
    <option value='Medina'>Medina</option>
    <option value='Dammam'>Dammam</option>
    <option value='Khobar'>Khobar</option>
    <option value='Tabuk'>Tabuk</option>
    <option value='Abha'>Abha</option>
    <option value='Buraidah'>Buraidah</option>
    <option value='Ta'if'>Ta'if</option>
    <option value='Najran'>Najran</option>
    <option value='Hail'>Hail</option>
    <option value='Khamis Mushait'>Khamis Mushait</option>
    <option value='Al Qassim'>Al Qassim</option>
    <option value='Jizan'>Jizan</option>


      ";
    }
    return json_encode(["output"=>$output]);
  }
  public function checkEmail()
  {
    $email = request('email');
    $check = User::where("email", $email)->first();

    if ($check && auth()->guest()) {
      return 1;
    }

    return 2;
  }

  public function addrating()
  {

    $rating = Rating::where("product_id", \request('product_id'))->where("user_id", auth()->id())->first();
    if ($rating) {
      $rating->update(["rating" => \request('ratt'), "comment" => \request("comment")]);
    } else {
      auth()->user()->ratings()->create(["product_id" => \request('product_id'), "rating" => \request('ratt'), "comment" => \request('comment')]);
    }
    return redirect()->back()->with('success', "Comment has been added");
  }
  public function check_payment()
  {

    $endpoint_secret = env('SW_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
      $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    } catch (\UnexpectedValueException $e) {

      info('UnexpectedValueException: ' . $e->getMessage());
      return response('', 400);
    } catch (\Stripe\Exception\SignatureVerificationException $e) {

      info('SignatureVerificationException: ' . $e->getMessage());
      return response('', 400);
    }


    switch ($event->type) {
      case 'checkout.session.completed':
        $session = $event->data->object;

        $order = Order::where('p_id', $session->id)->first();
        if ($order && $order->_status === 'pending') {
          $order->_status = 'paid';
          $order->save();

        }
        break;


      default:

        info('Received unknown event type: ' . $event->type);
    }

    return response('');
  }

  public function wishlist(){
    $products=auth()->user()->wishlist;
    return view("client.pages.wishlist",compact("products"));
  }
  public function success_ur(Request $request)
  {
    return $this->updateSuccess_ur($request);
  }
  public function userAccount()

  {
    $referrals=auth()->user()->referrals;
    return view("client.pages.userAccount",compact("referrals"));
  }
  public function petPage(Pet $pet)
  {
    $products=$pet->products()->with("ratings","category")->paginate(15);
    return $this->shopView($products);
  }
  public function deletewishlist()
  {
    $user=auth()->user();
    if($user->wishlist->contains(request('id'))) {
      $user->wishlist()->detach(request('id'));
    }
      return 1;
  }
  public function loadWishlist()
  {
    $output = "";
    $total = 0;
    if (auth()->check() || auth()->user()->wishlist) {
      $items = auth()->user()->wishlist;
      $total = count($items);

      foreach ($items as $index => $item) {

        $output .= "<li>
    <div class='slider-images'>
        <a href='".url($item->pagelink())."'><img src='".asset($item->photo)."' alt=''></a>
    </div>
    <div class='slider-content'>
        <h3 class='theme-title'>{$item->name}</h3>
        <div class='product-price'>
            <span class='price'><ins>AED :".$item->sale."</ins></span>
        </div>
    </div>
    <div class='whislist-status'>
        <span class='".($item->quantity < 1 ? 'out-of-stock-label' : '')."'>".($item->quantity > 1 ? 'In Stock' : 'Out of Stock')."</span>
    </div>
    <div data-id='".$item->id."' class='slide-remove-btn delwish'>
        <i class='fas fa-times-circle'></i>
    </div>
</li>";


      }

      return json_encode(["output"=>$output,"total"=>$total]);
    }


    return 1;
    return 1;
  }
  public function addToWishlist()
  {
    $user=auth()->user();
    if(!$user->wishlist->contains(request('id'))) {
      $user->wishlist()->attach(request('id'));
      return 1;
    }
    return 2;
  }
public function brandPage(Brand $brand)
{
  $products=$brand->products()->paginate(15);
  return $this->shopView($products);
}
  public function shopPage(Request $request,Category $category)
  {

    $products=$category->products()->with("ratings","category")->paginate(15);
     return $this->shopView($products);
  }
  public function clearCart()
  {
    session()->forget('cart');
    return 1;
  }
  public function cancel_ur()
  {
    $oid=session()->get('oid');
    if($oid)
    {
      $order=Order::find($oid);
      $order->products()->detach();
      $order->delete();
    }
    return view("client.pages.cancel");
  }
  public function removeItem()
  {
    $id=request()->id;
    $items=session()->get('cart',[]);
    unset($items[$id]);
    array_values($items);
    session()->put('cart',$items);
    return 1;
  }
  public function productPage(Product $product)
  {
    $products=Product::with("category","ratings")->where("category_id",$product->category_id)->take(10)->get();
    return view("client.pages.product",compact("product","products"));
  }
  public function loadCart()
  {
    $output = "";
    $total = 0;
    $totalPrice = 0;

    if (session()->has('cart')) {
      $total = count(session('cart'));
      $items = session()->get('cart', []);

      foreach ($items as $index => $item) {
        $pid = $item['id'];
        $qty = $item['qty'];
        $product = Product::find($pid);

        $totalPrice += $product->sale * $qty;

        $output .= "<li><div class='slider-images'>
                            <a href='" . url($product->pagelink()) . "'><img src='" . asset($product->photo) . "' alt=''></a>
                         </div><div class='slider-content'>
                         <a href='".$product->pagelink()."'><h3 class='theme-title'>" . $product->name . "
                         </h3></a>
                         <div class='product-price'>
                         <span class='price'><ins>AED:" . $product->sale*$qty . "
                         </ins>
                         <span>| Qty:".$qty."</span>
                         ";
        if(array_key_exists('color',$item))
          $output.="| <span>Color:".$item['color']."</span> |";
        if(array_key_exists('size',$item))
          $output.="<span>Size:".$item['size']."</span>";
        $output.="
                         </span>
                            </div>
                         </div>

                         <div data-id=".$index." class='slide-remove-btn'>
                            <i class='fas fa-times-circle'></i>
                         </div>
                      </li>";
      }

      return json_encode(["output"=>$output,"total"=>$total,"totalprice"=>$totalPrice]);
    }


    return 1;
  }

  public function addToCartProductPage(Request $request)
  {
    $rules = [];

    if ($request->has("color")) {
      $rules["color"] = "required";
    }

    if ($request->has("size")) {
      $rules["size"] = "required";
    }

    $request->validate($rules);

    $id = $request->input('id');
    $qty = $request->input('qty');

    $flag = 0;
    $items = session()->get('cart', []);

    foreach ($items as $index => &$item) {
      if ($item['id'] == $id) {
        $item['qty'] = $qty;
        if ($request->has('color')) {
          $item['color'] = $request->input('color');
        }
        if ($request->has('size')) {
          $item['size'] = $request->input('size');
        }
        $flag = 1;
        session()->put('cart', $items);
        break;
      }
    }

    if ($flag == 0) {
      $array = ["id" => $id, "qty" => $qty];
      if ($request->has('size')) {
        $array['size'] = $request->input('size');
      }
      if ($request->has('color')) {
        $array['color'] = $request->input('color');
      }
      session()->push('cart', $array);
    }

    return 1;

  }

  public function addToCart()
  {

    if(!empty(request()->all()))
    {
      $id=request('id');
      $qty=request('qty');
      $flag=0;

      $items=session()->get('cart',[]);

      foreach($items as $index=>&$item)
      {

        if($item['id']==$id)
        {
          $item['qty']=$qty;
          $flag=1;
          session()->put('cart', $items);
          break;
        }
      }

      if($flag==0)
      {
        $array=["id"=>$id,"qty"=>$qty];
        session()->push('cart',$array);

      }
      return 1;
    }
  }
  protected function shopView($products)
  {
    $categories=Category::with("products")->get();

    return view("client.pages.shop",compact("products","categories"));
  }
    public function landingPage()
    {

        $fproducts=Product::with("category","ratings")->where("feature",1)->get();
        $categories=Category::with("products.ratings")->get() ;
        $pets=Pet::with("products")->get();
        return view("welcome",compact("categories","fproducts","pets"));
    }
    public function faq()
    {
        return view("client.pages.faq");
    }
    public function privacy()
    {
        return view("client.pages.privacy");
    }
    public function checkout()
    {

      $total = 0;
      $totalPrice = 0;
      $fee = 0;
      $isSaudi = false;
      $products = collect();
      $user = auth()->user() ?? null;
      if ($user && $user->country == 'Saudi Arabia')
        $isSaudi = true;

      if (session()->has('cart')) {
        $total = count(session('cart'));
        $items = session()->get('cart', []);

        foreach ($items as $index => $item) {
          $pid = $item['id'];
          $qty = $item['qty'];
          $product = Product::find($pid);

          if ($product) {

            $products->push([
              'id' => $product->id,
              'link' => asset($product->pagelink()),
              'name' => $product->name,
              'sale' => $product->sale,
              'photo' => asset($product->photo),
              'discount' => $product->discount,
              'quantity' => $qty,
              'index' => $index,
              'color' => $cartItem['color'] ?? 'nill',
              'size' => $cartItem['size'] ?? 'nill',
            ]);

            $totalPrice += $product->sale * $qty;

          }
        }
      }
        if ($totalPrice < 100 && $totalPrice != 0) {
          if ($user && $user->country == 'Saudi Arabia')
            $fee = 30;
          else
            $fee = 10;
        }
        $products=json_decode($products);

        return view("client.pages.checkout", compact("totalPrice", "total", "fee", "isSaudi","products"));

    }
    public function cart()
    {
      $cart = session('cart', []);
      $products = collect();
      $total=0;
      foreach ($cart as $index=>$cartItem) {
        $product = Product::find($cartItem['id']);

        if ($product) {
          $total+=$product->sale*$cartItem['qty'];
          $products->push([
            'id' => $product->id,
            'link' => asset($product->pagelink()),
            'name' => $product->name,
            'sale' => $product->sale,
            'photo' => asset($product->photo),
            'quantity' => $cartItem['qty'],
            'index' => $index,
            'color' => $cartItem['color'] ?? 'nill',
            'size' => $cartItem['size'] ?? 'nill',
          ]);

        }

      }
      $products=json_decode($products);
        return view("client.pages.cart",compact("products","total"));
    }
    public function about()
    {
       return view('client.pages.about');
    }
    public function contact()
    {
        return view("client.pages.contact");
    }
}
