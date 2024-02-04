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

Route::get('/log-out', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(url("/"));
})->name("log-out");

Route::get("/admin-logout", function () {
    auth('admin')->logout();
    return redirect(url("/"));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/success', [App\Http\Controllers\MainController::class, 'success_s'])->name('success');
Route::get('/cancel', [App\Http\Controllers\MainController::class, 'cancel_ur'])->name('cancel');
Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::post("/updateCrediantials", 'updatePassword')->name('updateCrediantials');
    Route::post("/updateinfo", 'updateinfo')->name('updateinfo');
});

Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
    Route::post("/storeOrder", 'storeOrder')->name('storeOrder');
});

Route::get("/search", [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::controller(App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'landingPage')->name('landingPage');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about', 'about')->name('about');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/success-ur', 'success_ur')->name('success-ur');
    Route::get('/cancel-ur', 'cancel_ur')->name('cancel-ur');
    Route::get('/failure-ur', 'cancel_ur')->name('failure-ur');
    Route::get('/privacy-Policy', 'privacy')->name('privacy');
    Route::get('/fAQ', 'faq')->name('faq');
    Route::get('/product/{product}', 'productPage')->name('product');
    Route::get("/category/{category}", 'shopPage');
    Route::get("/brand/{brand}", 'brandPage');
    Route::get("/pet/{pet}", 'petPage')->name('petpage');
    Route::get("/userAccount", 'userAccount')->name('userAccount')->middleware('auth');
    Route::get("/wishlist", 'wishlist')->name('wishlist')->middleware('auth');
    Route::post("/addrating", 'addrating')->name('addrating')->middleware('auth');

    Route::post("/clearCart", 'clearCart')->name("clearCart");
    Route::post("/check_payment", 'check_payment')->name("check_payment");
    Route::post("/addToCart", 'addToCart')->name("addToCart");
    Route::post("/loadCart", 'loadCart')->name("loadCart");
    Route::post("/loadWishlist", 'loadWishlist')->name("loadWishlist");
    Route::post("/removeItem", 'removeItem')->name("removeItem");
    Route::post("/addToWishlist", 'addToWishlist')->name("addToWishlist");
    Route::post("/deletewishlist", 'deletewishlist')->name("deletewishlist");
    Route::post("/addToCartProductPage", 'addToCartProductPage')->name("addToCartProductPage");
    Route::post("/checkEmail", 'checkEmail')->name("checkEmail");
    Route::post("/getcities", 'getcities')->name("getcities");
});
// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
        Route::post('/login', [\App\Http\Controllers\AdminController::class, 'submit'])->name('loginsubmit');
        // Add more guest admin routes here
    });

    // Authenticated Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

        Route::get('/pending/orders', [\App\Http\Controllers\AdminController::class, 'pending'])->name('orders.pending');
        Route::get('/completed/orders', [\App\Http\Controllers\AdminController::class, 'completed'])->name('orders.completed');
        Route::get('/orders/{id}/delete', [\App\Http\Controllers\AdminController::class, 'delete'])->name('orders.delete');
        Route::post('/update/order', [\App\Http\Controllers\AdminController::class, 'updateorder'])->name('updateorder');

        Route::get('/canceled/orders', [\App\Http\Controllers\AdminController::class, 'canceled'])->name('orders.canceled');
        Route::get('canceled/orders/{id}/delete', [\App\Http\Controllers\AdminController::class, 'canceleddelete'])->name('canceled.orders.delete');

        Route::get('/profile', [\App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [\App\Http\Controllers\AdminController::class, 'profileupdate'])->name('profileupdate');

        Route::get('/banner/index', [\App\Http\Controllers\AdminController::class, 'indexBanner'])->name('banner.index');
        Route::post('/banner/store', [\App\Http\Controllers\AdminController::class, 'storeBanner'])->name('banner.store');
        Route::get('/banner/show', [\App\Http\Controllers\AdminController::class, 'showBanner'])->name('banner.show');
        Route::post('/banner/del/{id}', [\App\Http\Controllers\AdminController::class, 'delBanner'])->name('banner.del');
        Route::post('/banner/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editBanner'])->name('banner.edit');

        Route::get('/category/index', [\App\Http\Controllers\AdminController::class, 'indexCategory'])->name('category.index');
        Route::post('/category/store', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('category.store');
        Route::get('/category/show', [\App\Http\Controllers\AdminController::class, 'showCategory'])->name('category.show');
        Route::post('/category/del/{id}', [\App\Http\Controllers\AdminController::class, 'delCategory'])->name('category.del');
        Route::post('/category/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editCategory'])->name('category.edit');

        Route::get('/color/index', [\App\Http\Controllers\AdminController::class, 'indexColor'])->name('color.index');
        Route::post('/color/store', [\App\Http\Controllers\AdminController::class, 'storeColor'])->name('color.store');
        Route::get('/color/show', [\App\Http\Controllers\AdminController::class, 'showColor'])->name('color.show');
        Route::post('/color/del/{id}', [\App\Http\Controllers\AdminController::class, 'delColor'])->name('color.del');
        Route::post('/color/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editColor'])->name('color.edit');

        Route::get('/coupon/index', [\App\Http\Controllers\AdminController::class, 'indexCoupon'])->name('coupon.index');
        Route::post('/coupon/store', [\App\Http\Controllers\AdminController::class, 'storeCoupon'])->name('coupon.store');
        Route::get('/coupon/show', [\App\Http\Controllers\AdminController::class, 'showCoupon'])->name('coupon.show');
        Route::post('/coupon/del/{id}', [\App\Http\Controllers\AdminController::class, 'delCoupon'])->name('coupon.del');
        Route::post('/coupon/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editCoupon'])->name('coupon.edit');

        Route::get('/brand/index', [\App\Http\Controllers\AdminController::class, 'indexBrand'])->name('brand.index');
        Route::post('/brand/store', [\App\Http\Controllers\AdminController::class, 'storeBrand'])->name('brand.store');
        Route::get('/brand/show', [\App\Http\Controllers\AdminController::class, 'showBrand'])->name('brand.show');
        Route::post('/brand/del/{id}', [\App\Http\Controllers\AdminController::class, 'delBrand'])->name('brand.del');
        Route::post('/brand/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editBrand'])->name('brand.edit');

        Route::get('/pet/index', [\App\Http\Controllers\AdminController::class, 'indexPet'])->name('pet.index');
        Route::post('/pet/store', [\App\Http\Controllers\AdminController::class, 'storePet'])->name('pet.store');
        Route::get('/pet/show', [\App\Http\Controllers\AdminController::class, 'showPet'])->name('pet.show');
        Route::post('/pet/del/{id}', [\App\Http\Controllers\AdminController::class, 'delPet'])->name('pet.del');
        Route::post('/pet/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editPet'])->name('pet.edit');

        Route::get('/size/index', [\App\Http\Controllers\AdminController::class, 'indexSize'])->name('size.index');
        Route::post('/size/store', [\App\Http\Controllers\AdminController::class, 'storeSize'])->name('size.store');
        Route::get('/size/show', [\App\Http\Controllers\AdminController::class, 'showSize'])->name('size.show');
        Route::post('/size/del/{id}', [\App\Http\Controllers\AdminController::class, 'delSize'])->name('size.del');
        Route::post('/size/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editSize'])->name('size.edit');

        Route::get('/faq/index', [\App\Http\Controllers\AdminController::class, 'indexFaq'])->name('faq.index');
        Route::post('/faq/store', [\App\Http\Controllers\AdminController::class, 'storeFaq'])->name('faq.store');
        Route::get('/faq/show', [\App\Http\Controllers\AdminController::class, 'showFaq'])->name('faq.show');
        Route::post('/faq/del/{id}', [\App\Http\Controllers\AdminController::class, 'delFaq'])->name('faq.del');
        Route::post('/faq/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editFaq'])->name('faq.edit');

        Route::get('/faq/status/update', [\App\Http\Controllers\AdminController::class, 'statusUpdateFaq'])->name('faq.status.update');

        Route::get('/product/index', [\App\Http\Controllers\AdminController::class, 'indexProduct'])->name('product.index');
        Route::post('/product/store', [\App\Http\Controllers\AdminController::class, 'storeProduct'])->name('product.store');
        Route::get('/product/show', [\App\Http\Controllers\AdminController::class, 'showProduct'])->name('product.show');
        Route::post('/product/del/{id}', [\App\Http\Controllers\AdminController::class, 'delProduct'])->name('product.del');
        Route::post('/product/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editProduct'])->name('product.edit');

        Route::get('/product/feature/update', [\App\Http\Controllers\AdminController::class, 'featureUpdateProduct'])->name('product.feature.update');

        // Add more authenticated admin routes here
    });
});
