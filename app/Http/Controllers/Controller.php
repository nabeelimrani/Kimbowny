<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
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

      session()->forget('cart');
        session()->forget('oid');
        return view('client.pages.success', compact('order'));
      }catch (\Exception $e) {
        throw new NotFoundHttpException();
      }
    }
    public function updateSuccess_ur($request)
    {
       $paymentId=$request->payment_id;
      $uri = 'https://api.tabby.ai/api/v1/payments';
      $client = new Client();
      try {
        $response = $client->get($uri . '/' . $paymentId, [
          'headers' => [
            'Authorization' => 'Bearer ' . config('keys.t_sk')
          ]
        ]);
      } catch (\Exception $e) {
        Log::error($e);
        throw new NotFoundHttpException();
      }

      $payment=json_decode($response->getBody()->getContents(), true);
      $order = Order::where('p_id', $payment['id'])->first();

      if (!$order) {
        throw new NotFoundHttpException();
      }

      if ($order->_status === 'pending') {
        $order->_status = 'paid';
        $order->save();
      }
      session()->forget('cart');
      session()->forget('oid');
      return view('client.pages.success', compact('order'));

    }
}
