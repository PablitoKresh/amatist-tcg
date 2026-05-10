<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Agrega o quita un producto de la lista de favoritos (Toggle).
     */
    public function toggle(Product $product)
    {
        $user = Auth::user();

        // El método toggle hace todo el trabajo sucio por nosotros
        $user->favorites()->toggle($product->id);

        return back()->with('success', 'Lista de favoritos actualizada con éxito.');
    }

    /**
     * Muestra la lista de favoritos en el perfil del usuario.
     */
    public function index()
    {
        // Obtenemos los favoritos del usuario actual
        $favorites = Auth::user()->favorites;

        return view('profile.favorites', compact('favorites'));
    }
}