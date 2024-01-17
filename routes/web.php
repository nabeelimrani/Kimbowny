<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/info",function (){
  $item=session()->get('cart',[]);
  return $item;
});
Route::get("/forget",
  function () {
    $item = session()->forget('cart');
    return "session killed";
  });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\MainController::class)->group(function(){
Route::get('/','landingPage')->name('landingPage');
Route::get('/contact','contact')->name('contact');
Route::get('/about','about')->name('about');
Route::get('/cart','cart')->name('cart');
Route::get('/checkout','checkout')->name('checkout');
Route::get('/privacy-Policy','privacy')->name('privacy');
Route::get('/fAQ','faq')->name('faq');
Route::get('/product/{product}','productPage')->name('product');


Route::post("/addToCart",'addToCart')->name("addToCart");
Route::post("/loadCart",'loadCart')->name("loadCart");
});

