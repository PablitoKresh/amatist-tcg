<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category; // Añadimos esto para poder listar categorías en los formularios
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra la lista de productos con sus categorías y stock.
     */
    public function index()
    {
        // IMPORTANTE: Cargamos la relación 'categories' para que el index blade no falle
        $productos = Product::with('categories')->get();
        return view('admin.products.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un producto.
     */
    public function create()
    {
        // Cargamos todas las categorías para poder elegirlas en el formulario
        $categorias = Category::all();
        return view('admin.products.create', compact('categorias'));
    }

    /**
     * Guarda un nuevo producto.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0', // Validamos el nuevo campo stock
            'image' => 'required|string',
        ]);

        $producto = Product::create($datos);

        // Si mandas categorías desde el formulario, las vinculamos
        if ($request->has('categories')) {
            $producto->categories()->sync($request->categories);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
    {
        //
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(Product $product)
    {
        $categorias = Category::all();
        // Cargamos el producto con sus categorías actuales
        $product->load('categories');
        return view('admin.products.edit', ['producto' => $product, 'categorias' => $categorias]);
    }

    /**
     * Actualiza el producto.
     */
    public function update(Request $request, Product $product)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0', // Actualizamos el stock
            'image' => 'required|string',
        ]);

        $product->update($datos);

        // Actualizamos la relación en la tabla intermedia
        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina el producto.
     */
    public function destroy(Product $product)
    {
        // Eliminamos las relaciones en la tabla intermedia antes de borrar el producto
        $product->categories()->detach();
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}