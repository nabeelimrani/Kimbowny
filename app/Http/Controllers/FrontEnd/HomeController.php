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
}
