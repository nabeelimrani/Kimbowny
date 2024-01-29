<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function updateSuccess($request)
    {
      $sessionId = $request->get('session_id');
      \Stripe\Stripe::setApiKey(config("keys.s_sk"));
      $sessionId = $request->get('session_id');


      try{
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if (!$session) {
          throw new NotFoundHttpException;
        }



        $order = Order::where('p_id', $session->id)->first();

        if (!$order) {
          throw new NotFoundHttpException();
        }

        if ($order->_status === 'pending') {
          $order->_status = 'paid';
          $order->save();
        }
        return 1;
//      session()->forget('cart');
//      return view('success', compact('order'));
      }catch (\Exception $e) {
        throw new NotFoundHttpException();
      }
    }
}
