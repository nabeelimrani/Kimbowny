<?php

use App\Http\Controllers\BackEnd\MainController;
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => HomeController::class], function () {
    Route::get('/', 'index')->name('home');
    Route::get('/blog', 'blog')->name('blog.view');
    Route::get('/shop/category', 'shopCategory')->name('shop.category');
    Route::get('/shop/single/product', 'singleProduct')->name('shop.single');
    Route::get('/cart', 'cart')->name('shop.cart');
    Route::get('/conformation', 'conformation')->name('conformation');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/singleblog', 'singleblog')->name('singleblog');
    Route::get('/tracking', 'tracking')->name('tracking');
    Route::get('/element', 'element')->name('element');

});
Route::group(['controller' => MainController::class], function () {
    Route::get('/admin/home', 'index')->name('adminhome');
    Route::get('/admin/login', 'login')->name('admin.login');
    Route::get('/admin/register', 'register')->name('admin.register');
    Route::get('/admin/forgot', 'forgot')->name('admin.forgot');

});

Auth::routes(["register" => false]);

Route::get('/register/{slug?}', [App\Http\Controllers\AuthController::class, 'registerPage'])->middleware(['guest'])->name("register");

Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginPage'])->middleware(['guest'])->name("login");

Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerUser'])->middleware(['guest'])->name("register");
