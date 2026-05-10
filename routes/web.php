<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product; // Añadido para las stats de admin
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController; // <-- Importante para favoritos
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogo', function () {
    $categorias = Category::with('products')->get();
    return view('catalogo', compact('categorias'));
})->name('catalogo');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

// Auth
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS REGISTRADOS (Auth)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    
    // Perfil
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');

    // FAVORITOS (Problema 5)
    // El toggle sirve para añadir/quitar con un solo clic
    Route::post('/favoritos/toggle/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/mis-favoritos', [FavoriteController::class, 'index'])->name('favorites.index');

    // Pedidos
    Route::post('/comprar/{id}', [OrderController::class, 'comprar'])->name('comprar');
    Route::get('/mis-pedidos', function () {
        $orders = auth()->user()->orders;
        return view('pedidos', compact('orders'));
    })->name('pedidos.index');

});

/*
|--------------------------------------------------------------------------
| RUTAS DE ADMINISTRADOR (Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Dashboard principal
    Route::get('/', function () {
        $orders = Order::with('items.product', 'user')->get();
        return view('admin', compact('orders'));
    })->name('admin.dashboard');

    // Gestión de Productos
    Route::resource('products', ProductController::class)->names('admin.products');

    // Estadísticas de Favoritos (Requisito Admin Problema 5)
    Route::get('/stats/favoritos', function () {
        $topFavoritos = Product::withCount('favoritedBy')
            ->orderBy('favorited_by_count', 'desc')
            ->take(10)
            ->get();
        return view('admin.favorites_stats', compact('topFavoritos'));
    })->name('admin.favorites.stats');

    // Pedidos Admin
    Route::patch('/orders/{order}', [OrderController::class, 'updateStatus'])->name('admin.orders.update');

});