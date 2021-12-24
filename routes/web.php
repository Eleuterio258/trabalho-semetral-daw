<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\BrandConttroller;
use App\Http\Controllers\Admin\OrderConttroller;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Api\Pay\PayController; 
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\CategoryController as Category;
use App\Http\Controllers\Frontend\Cart\CheckoutController;
use App\Http\Controllers\Frontend\Wishlist\WishlistController;
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('category/{name}', [Category::class, 'category']);
Route::get('category/{namecat}/{nameproduc}', [Product::class, 'productinfo']);
Route::get('shop/{nameproduc}', [Product::class, 'product'])->name('view');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('wishlist', [WishlistController::class, 'getWishlist'])->name('getWishlist');
Route::post('addToCart', [CartController::class, 'addToCart']);
Route::post('deleteToCart', [CartController::class, 'deleteToCart']);
Route::post('updateCart', [CartController::class, 'updateCart']);
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('destroy', [WishlistController::class, 'destroy']);
Route::post('addWishlist', [WishlistController::class, 'addToWishlist']);
Route::post('placeorder', [CheckoutController::class, 'placeorder'])->name('placeorder');
Route::get('order', [CheckoutController::class, 'order'])->name('placeorder');
Route::get('complete', [CheckoutController::class, 'complete'])->name('complete');
Route::get('view/{id}', [CheckoutController::class, 'view'])->name('complete');
Route::post('pay', [PayController::class, 'pay']);

    
 });



Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'admin']);
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.route');
    Route::post('post-category-form', [CategoryController::class, 'store']);
    Route::get('create-category', [CategoryController::class, 'create']);
    Route::get('all-categories', [CategoryController::class, 'index']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('get-product-form', [ProductController::class, 'create']);
    Route::post('post-product-form', [ProductController::class, 'store']);
    Route::get('all-products', [ProductController::class, 'index']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('post-product-edit-form/{id[', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('get-slider-form', [SliderController::class, 'create']);
    Route::post('post-slider-form', [SliderController::class, 'store']);
    Route::get('all-sliders', [SliderController::class, 'index']);
    Route::get('edit-slider/{id}', [SliderController::class, 'edit']);
    Route::post('post-slider-edit-form/{id}', [SliderController::class, 'update']);
    Route::get('delete-slider/{id}', [SliderController::class, 'destroy']);

    Route::get('get-brand-form', [BrandConttroller::class, 'create']);
    Route::post('post-brand-form', [BrandConttroller::class, 'store']);
    Route::get('all-brands', [BrandConttroller::class, 'index']);
    Route::get('edit-brand/{id}', [BrandConttroller::class, 'edit']);
    Route::post('post-brand-edit-form/{id}', [BrandConttroller::class, 'update']);
    Route::get('delete-brand/{id}', [BrandConttroller::class, 'destroy']);    

    Route::get('get-order-form', [OrderConttroller::class, 'create']);
    Route::post('post-order-form', [OrderConttroller::class, 'store']);
    Route::get('all-orders', [OrderConttroller::class, 'index']);
    Route::get('edit-order/{id}', [OrderConttroller::class, 'edit']);
    Route::post('post-order-edit-form/{id}', [OrderConttroller::class, 'update']);
    Route::get('delete-order{id}', [OrderConttroller::class, 'destroy']);    



    Route::get('send-mail-form', [EmailController::class, 'sendMailForm']);
    Route::post('post-send-mail-form', [EmailController::class, 'sendMail']);
 
 });