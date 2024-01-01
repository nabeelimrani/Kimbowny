<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('frontEnd.login');
    }
       public function registerPage(Request $request, $slug=null)
    {
        
        return view('frontEnd.register',compact("slug"));
    }
    public function registerUser(Request $request)
    {
     $request->validate([
    'firstname' => 'required',
    'lastname' => 'required',
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
    
    ]);
     if($request['referral_code'])
     {
        $check=User::where("referral_code",$request['referral_code'])->first();
        if(!$check)
         return redirect()->back()->with('error', 'Your Invitation code is incorrect. Please recheck the Invitation link.');
     }
        
        $user=User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'referral_code' => $request['referral_code'],
            'password' => Hash::make($request['password']),
        ]);
         Auth::login($user);

        return redirect('/');

    }
 
}
