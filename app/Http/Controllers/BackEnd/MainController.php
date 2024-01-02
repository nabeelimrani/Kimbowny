<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('backEnd.index');
    }

    public function login()
    {
        return view('backEnd.login');
    }

    public function register()
    {
        return view('backEnd.create-account');
    }

    public function forgot()
    {
        return view('backEnd.forgot-password');
    }
}
