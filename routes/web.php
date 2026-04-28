<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Http\Controllers\Admin\ProductController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/catalogo', function () {
    $productos = Product::all();
    return view('catalogo', compact('productos'));
})->name('catalogo');

Route::post('/comprar/{id}', [OrderController::class, 'comprar'])
    ->middleware('auth');

Route::get('/mis-pedidos', function () {
    $orders = auth()->user()->orders;
    return view('pedidos', compact('orders'));
})->middleware('auth');

Route::get('/admin', function () {
    $orders = Order::with('items.product', 'user')->get();
    return view('admin', compact('orders'));
})->middleware('admin');

Route::resource('admin/products', ProductController::class)
    ->names('admin.products')
    ->middleware('admin');