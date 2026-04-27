<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Charizard 1999',
            'description' => '1ª Edición Base Set Holo',
            'price' => 265,
            'image' => 'charizard.jpg',
            'category' => 'Pokemon'
        ]);

        Product::create([
            'name' => 'Blue-Eyes White Dragon',
            'description' => 'Legend of Blue Eyes White Dragon',
            'price' => 120,
            'image' => 'blue_eyes.webp',
            'category' => 'Yugioh'
        ]);
    }
}