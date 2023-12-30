<?php
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
});
