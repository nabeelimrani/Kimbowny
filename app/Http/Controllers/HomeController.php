<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateinfo(Request $request)
    {
        $request->validate([
          "firstname"=>"required",
          "lastname"=>"required",
          "address"=>"required",
          "area"=>"required",
          "city"=>"required",
          "country"=>"required",
        ]);

        auth()->user()->update([
          "firstname"=>$request->firstname,
          "lastname"=>$request->lastname,
          "address"=>$request->address,
          "area"=>$request->area,
          "city"=>$request->city,
          "country"=>$request->country,
        ]);
        return 1;
    }
    public  function updatePassword(Request $request)
    {
      $request->validate([
        "current-password" => "required|current_password",
        "new-password" => "required_with:current-password|min:8",
        "confirm-password" => "required|same:new-password",
      ], [
        "current-password.required" => "Please enter your current password.",
        "current-password.current_password" => "Incorrect current password.",
        "new-password.required_with" => "Please enter a new password.",
        "new-password.min" => "New password must be at least :min characters.",
        "confirm-password.required" => "Please confirm your new password.",
        "confirm-password.same" => "The new password and confirmation do not match.",
      ]);
      $user = Auth::user();
      $user->password = Hash::make($request->input('new-password'));
      $user->save();

      return 1;
    }
    public function index()
    {

           return view('home');
    }
}
