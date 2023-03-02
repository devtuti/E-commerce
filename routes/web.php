<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\front\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/add_cart/{id?}', [ProductController::class, 'insert_cart'])->name('add.cart');
Route::get('/cart', [ProductController::class, 'show_cart'])->name('cart');
Route::put('/cart_update/{id?}', [ProductController::class, 'update_cart'])->name('cart_update');
Route::delete('/cart_remove/{id?}', [ProductController::class, 'remove_cart'])->name('cart_remove');
