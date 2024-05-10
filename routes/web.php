<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;

Route::get('/', function () {
    return view('home'); // Load home.blade.php as the starting page
})->name('home');

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/cart', [CartsController::class, 'store'])->name('store');
Route::get('/product', [ProductsController::class, 'index'])->name('product'); // Change to GET route
Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');


Route::post('/checkout/store', [OrdersController::class, 'store']);
Route::get('/myorders', [OrdersController::class, 'index2'])->name('myorders');
Route::get('/orders', [OrdersController::class, 'index']);

Route::delete('/delete-item/{itemId}', [CartsController::class, 'deleteItem'])->name('delete-item');

Route::post('/clear-cart', [CartsController::class, 'clearCart'])->name('clear-cart');

Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsForCheckout']);
Route::post('/process/user/payment', [CartsController::class, 'processPayment']);
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');

Route::post('orders/{orderId}/update-status', [OrdersController::class, 'orderStatusAdmin'])->name('order.update.admin');


Route::delete('orders/{orderId}/delete-order', [OrdersController::class, 'orderDelete'])->name('order.delete.admin');

Route::get('/order/admin/{orderId}', [OrdersController::class, 'orderAdmin'])->name('order.show.admin');

Route::get('/order/user/{orderId}', [OrdersController::class, 'orderUser'])->name('order.show.user');
Route::get('/order-report', [OrdersController::class, 'generateOrderReport'])->name('report.orders');

Route::get('/inventory/product/', [ProductsController::class, 'index2'])->name('product.inventory');
Route::get('/inventory/product/add', [ProductsController::class, 'create'])->name('product.create');
Route::post('/inventory/product/store', [ProductsController::class, 'store'])->name('product.store');

Route::get('/inventory/product/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit');
Route::put('/inventory/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::delete('/inventory/product/destroy/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');

