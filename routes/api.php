<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Pay\PayController; 
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Custemer\Cart\CartController;
use App\Http\Controllers\Api\Admin\OrderController as Admin;
use App\Http\Controllers\Api\Custemer\Order\OrderController;
use App\Http\Controllers\Api\Delivery\AuthDeliveryController;
use App\Http\Controllers\Api\Custemer\Cart\CheckoutController;
use App\Http\Controllers\Api\Custemer\Product\ProductController;
use App\Http\Controllers\Api\Custemer\Wishlist\WishlistController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('jwt.auth');
    Route::get('me', [AuthController::class, 'userProfile'])->middleware('jwt.auth');
});

Route::group(['middleware' => 'api', 'prefix' => 'cart'], function () {
    Route::get('cart', [CartController::class, 'getCart']);
    Route::post('addCart', [CartController::class, 'addToCard'])->middleware('jwt.auth');
    Route::delete('deleteToCart/{id}', [CartController::class, 'delete'])->middleware('jwt.auth');
    Route::put('updateToCart/{id}', [CartController::class, 'update'])->middleware('jwt.auth');
    Route::post('incremento', [CartController::class, 'incremento'])->middleware('jwt.auth');
    Route::post('decremento', [CartController::class, 'decremento'])->middleware('jwt.auth');
});

Route::group(['middleware' => 'api', 'prefix' => 'auth/delivery'], function () {
    Route::post('login', [AuthDeliveryController::class, 'login']);
    Route::post('register', [AuthDeliveryController::class, 'register']);
    Route::post('logout', [AuthDeliveryController::class, 'logout'])->middleware('jwt.auth');
    Route::post('refresh', [AuthDeliveryController::class, 'refresh'])->middleware('jwt.auth');
    Route::get('me', [AuthDeliveryController::class, 'userProfile'])->middleware('jwt.auth');
});




//produtos by category
Route::get('productscategory/{id}', [ProductController::class, 'getByCategoryId']);
//Rotas de produtos
Route::get('products/{id}', [ProductController::class, 'getProductById']);
//searchProduct
Route::get('search/{name}', [ProductController::class, 'searchProduct']);
//all de produtos
Route::get('products', [ProductController::class, 'index']);
Route::get('stockout', [ProductController::class, 'stockout']);
//hot de produtos
Route::get('hotproducts', [ProductController::class, 'getHotProducts']);
//new de produtos
Route::get('newarrival', [ProductController::class, 'getNewArrival']);
Route::get('popularProduct', [ProductController::class, 'popularProduct']);

//wishlist
Route::get('wishlist', [WishlistController::class, 'getWishlist']);
Route::post('addWishlist', [WishlistController::class, 'addToWishlist'])->middleware('jwt.auth');
Route::delete('destroy/{id}', [WishlistController::class, 'destroy'])->middleware('jwt.auth');

//chackout
Route::get('checkout', [CheckoutController::class, 'place'])->middleware('jwt.auth');
Route::get('orderpending', [OrderController::class, 'orderpending'])->middleware('jwt.auth');
Route::get('ordercomplete', [OrderController::class, 'ordercomplete'])->middleware('jwt.auth');
Route::get('orderdetalhe/{id}', [OrderController::class, 'orderdetalhe'])->middleware('jwt.auth');
Route::get('myorders', [OrderController::class, 'index'])->middleware('jwt.auth');
//Rotas de sliders admin
Route::post('addslider', [SliderController::class, 'store']);
Route::get('sliders', [SliderController::class, 'index']);
Route::put('updateslider/{id}', [SliderController::class, 'update']);
Route::delete('deleteslider/{id}', [SliderController::class, 'destroy']);

//categories admin
Route::post('addcategory', [CategoryController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);
Route::put('updatcategoryr/{id}', [CategoryController::class, 'update']);
Route::delete('deletecategory/{id}', [CategoryController::class, 'destroy']);




//ad
Route::get('allOrders', [Admin::class, 'allOrders'])->middleware('jwt.auth');
Route::get('/pay', [PayController::class, 'pay']);