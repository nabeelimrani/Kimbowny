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


Route::get('/log-out',function (){
  \Illuminate\Support\Facades\Auth::logout();
  return redirect(url("/"));
})->name("log-out");

Route::get("/mail",
  function () {
    sendEmail("rezveshah1211@gmail.com","checking","yar check kr rha hon");
    return "sent!!!";
  });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/success', [App\Http\Controllers\MainController::class, 'success_s'])->name('success');
Route::get('/cancel', [App\Http\Controllers\MainController::class, 'cancel_ur'])->name('cancel');
Route::controller(\App\Http\Controllers\HomeController::class)->group(function (){
  Route::post("/updateCrediantials",'updatePassword')->name('updateCrediantials');
  Route::post("/updateinfo",'updateinfo')->name('updateinfo');
});

Route::controller(\App\Http\Controllers\OrderController::class)->group(function (){
  Route::post("/storeOrder",'storeOrder')->name('storeOrder');
});

Route::get("/search",[\App\Http\Controllers\SearchController::class,'index'])->name('search');


Route::controller(App\Http\Controllers\MainController::class)->group(function(){
Route::get('/','landingPage')->name('landingPage');
Route::get('/contact','contact')->name('contact');
Route::get('/about','about')->name('about');
Route::get('/cart','cart')->name('cart');
Route::get('/checkout','checkout')->name('checkout');
Route::get('/success-ur','success_ur')->name('success-ur');
Route::get('/cancel-ur','cancel_ur')->name('cancel-ur');
Route::get('/failure-ur','cancel_ur')->name('failure-ur');
Route::get('/privacy-Policy','privacy')->name('privacy');
Route::get('/fAQ','faq')->name('faq');
Route::get('/product/{product}','productPage')->name('product');
Route::get("/category/{category}",'shopPage');
Route::get("/brand/{brand}",'brandPage');
Route::get("/pet/{pet}",'petPage')->name('petpage');
Route::get("/userAccount",'userAccount')->name('userAccount')->middleware('auth');
Route::get("/wishlist",'wishlist')->name('wishlist')->middleware('auth');
Route::post("/addrating",'addrating')->name('addrating')->middleware('auth');

Route::post("/clearCart",'clearCart')->name("clearCart");
Route::post("/check_payment",'check_payment')->name("check_payment");
Route::post("/addToCart",'addToCart')->name("addToCart");
Route::post("/loadCart",'loadCart')->name("loadCart");
Route::post("/loadWishlist",'loadWishlist')->name("loadWishlist");
Route::post("/removeItem",'removeItem')->name("removeItem");
Route::post("/addToWishlist",'addToWishlist')->name("addToWishlist");
Route::post("/deletewishlist",'deletewishlist')->name("deletewishlist");
Route::post("/addToCartProductPage",'addToCartProductPage')->name("addToCartProductPage");
Route::post("/checkEmail",'checkEmail')->name("checkEmail");
Route::post("/getcities",'getcities')->name("getcities");
});
Route::prefix("admin")->name("admin.")->group(function(){
 Route::middleware(["guest:admin"])->group(function(){
   //yeh admin me guest ky route
    Route::get("/login",[\App\Http\Controllers\AdminController::class,'login'])->name('adminlogin');
 });
  Route::middleware(["auth:admin"])->group(function() {

    // yeh admin me auth waly hain route
    Route::get("/dashboard",[\App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
  });



});
