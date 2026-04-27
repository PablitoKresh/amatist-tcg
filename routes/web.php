<?php

use Illuminate\Support\Facades\Route;

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
use Laravel\Fortify\Features;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Models\Order;

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