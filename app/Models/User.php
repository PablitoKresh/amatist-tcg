<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;
use App\Models\Product; // Importamos el modelo Product

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atributos asignables (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',       // NUEVO: Para la foto de perfil
        'favorite_tcg', // NUEVO: Para el juego favorito
        'bio',          // NUEVO: Para el lema de duelista
    ];

    /**
     * Atributos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de tipos
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con Pedidos (Uno a Muchos)
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relación con Favoritos (Muchos a Muchos)
     * Usamos la tabla intermedia 'product_user_favorites'
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'product_user_favorites')
                    ->withTimestamps(); // Para saber cuándo se añadió a favoritos
    }
}