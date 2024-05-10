<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;

Route::get('/', function () {
    return view('home'); // Load home.blade.php as the starting page
});

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/cart', [CartsController::class, 'store'])->name('store');
Route::get('/product', [ProductsController::class, 'index'])->name('product'); // Change to GET route
Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');
Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsForCheckout']);
Route::post('/process/user/payment', [CartsController::class, 'processPayment']);
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');

