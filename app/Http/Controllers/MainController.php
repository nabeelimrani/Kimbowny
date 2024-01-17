<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function productPage(Product $product)
  {
    $products=Product::where("category_id",$product->category_id)->get();
    return view("client.pages.product",compact("product","products"));
  }
  public function loadCart()
  {
    $output='';
    $total=0;
    $totalPrice=0;
    if (session()->has('cart')) {
      $total=count(session('cart'));
      $items=session()->get('cart',[]);
      foreach($items as $index=>$item)
      {
        $pid=$item['id'];
        $qty=$item['qty'];
        $product=Product::find($pid);

        $totalPrice+=$product->sale*$qty;

      }

      return 1;
    }
  }
  public function addToCart()
  {
    $id=request('id');
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
    public function landingPage()
    {
        $fproducts=Product::with("category")->where("feature",1)->get();
        $categories=Category::all();
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
        return view("client.pages.checkout");
    }
    public function cart()
    {
        return view("client.pages.cart");
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
