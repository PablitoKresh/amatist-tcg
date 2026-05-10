<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importamos el modelo User

class Product extends Model
{
    use HasFactory;

    /**
     * Atributos asignables.
     */
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image',
        'stock' 
    ];

    /**
     * Relación con Categorías (Muchos a Muchos).
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Relación con Usuarios que marcaron este producto como favorito (Muchos a Muchos).
     * Apuntamos a la tabla 'product_user_favorites'.
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'product_user_favorites')
                    ->withTimestamps();
    }
}