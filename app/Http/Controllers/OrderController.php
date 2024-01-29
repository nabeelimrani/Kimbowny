<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Traits\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
  use Checkout;
    public function storeOrder(Request $request)
    {
      if(empty(session()->get('cart')))
      {
        return redirect()->back();
      }
      $request->validate([
        "email"=>"required",
        "firstname"=>"required",
        "lastname"=>"required",
        "address"=>"required",
        "area"=>"required",
        "phone"=>"required",
        "country"=>"required",
        'pcode' => [
          'nullable',
          'string',
          Rule::exists('coupons', 'code'),
        ],
        "city"=>"required",
        'payment_method' => 'required|in:stripe,tabby',

        'pass' => [
          'string',
          'min:8',
          Rule::requiredIf(!auth()->check()),
        ],
      ]);

       if($request->pass && auth()->guest())
       {


          $user=User::create([
            "firstname"=>$request->firstname,
            "lastname"=>$request->lastname,
            "address"=>$request->address,
            "area"=>$request->area,
            "country"=>$request->country,
            "city"=>$request->city,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "password"=>Hash::make($request->pass),
          ]);
         Auth::login($user);
       }
       else{
         auth()->user()->update([
           "firstname"=>$request->firstname,
           "lastname"=>$request->lastname,
           "address"=>$request->address,
           "area"=>$request->area,
           "country"=>$request->country,
           "city"=>$request->city,
           "phone"=>$request->phone,
         ]);
         $user=auth()->user();
       }


      $note=$request->note;
      $order=Order::create(["user_id"=>$user->id,"note"=>$note]);
      if($request->payment_method=="stripe") {

        return $this->StripePayment($order, $user);
      }

    }

}
