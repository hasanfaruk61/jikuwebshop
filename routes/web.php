<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//   return view('welcome');
//});


Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');
Route::get('category', [\App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('view-category/{slug}', [\App\Http\Controllers\Frontend\FrontendController::class, 'view_category']);
Route::get('category/{slug}/{product_slug}', [\App\Http\Controllers\Frontend\FrontendController::class, 'product_view']);

//Search
Route::post('search_product', [\App\Http\Controllers\Frontend\FrontendController::class, 'searchProduct']);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class, 'delete_product']);
Route::post('update-cart',[CartController::class, 'update_cart']);

//Cart icon product count
Route::get('load-cart-data', [CartController::class, 'cart_count']);

//Cart Authenticate
Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class, 'view_cart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'place_order']);

    Route::get('my_orders', [UserController::class, 'index']);
    Route::get('detail/{id}', [UserController::class, 'detailOrder']);



});


//Admin or User Entry Control
Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/dashboard', [FrontendController::class, 'index']);

//Admin Category_edit
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('add-category',[CategoryController::class, 'add']);
    Route::post('insert-category',[CategoryController::class, 'insert']);
    Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

//Admin Products_edit
    Route::get('products',[\App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('add-products',[\App\Http\Controllers\Admin\ProductController::class, 'add']);
    Route::post('insert-product',[\App\Http\Controllers\Admin\ProductController::class, 'insert']);
    Route::get('edit-prod/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::put('update-product/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::get('delete-product/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'destroy']);

//Admin Orders_edit
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('admin/detail/{id}',[OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'update_order']);
    Route::get('order-history', [OrderController::class, 'order_history']);

//Admin User_edit
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('user_detail/{id}', [DashboardController::class, 'view_user']);


});
