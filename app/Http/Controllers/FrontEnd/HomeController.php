<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontEnd.index');
    }

    public function blog()
    {
        return view('frontEnd.blog');
    }

    public function shopCategory()
    {
        return view('frontEnd.category');
    }
    public function singleProduct()
    {
        return view('frontEnd.single-product');
    }
    public function cart()
    {
        return view('frontEnd.cart');
    }
    public function conformation()
    {
        return view('frontEnd.confirmation');
    }
    public function contact()
    {
        return view('frontEnd.contact');
    }
    public function checkout()
    {
        return view('frontEnd.checkout');
    }
    public function singleblog()
    {
        return view('frontEnd.single-blog');
    }
    public function login()
    {
        return view('frontEnd.login');
    }
    public function tracking()
    {
        return view('frontEnd.tracking');
    }
    public function element()
    {
        return view('frontEnd.elements');
    }

}
