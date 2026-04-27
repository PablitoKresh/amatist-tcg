<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // IMPORTANTE: Esto permite que Laravel guarde los datos del Seeder
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image', 
        'category'
    ];
}