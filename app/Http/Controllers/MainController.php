<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
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
