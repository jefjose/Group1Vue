<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;

// Route::get('/', function () {
//     return view('product');
// });

Route::get('/', [ProductsController::class, 'index']);

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/cart', [CartsController::class, 'store'])->name('store');
