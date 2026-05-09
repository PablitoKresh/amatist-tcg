<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\Category;
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
    $categorias = Category::with('products')->get();
    return view('catalogo', compact('categorias'));
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

Route::patch('/admin/orders/{order}', [OrderController::class, 'updateStatus'])
    ->middleware('admin')
    ->name('admin.orders.update');

Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
});