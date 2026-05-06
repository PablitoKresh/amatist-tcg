<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $pokemon = Category::where('slug', 'pokemon')->first();
        $yugioh = Category::where('slug', 'yu-gi-oh')->first();

        $charizard = Product::create([
            'name' => 'Charizard 1999',
            'description' => '1ª Edición Base Set Holo',
            'price' => 265,
            'image' => 'charizard.jpg',
        ]);
        $charizard->categories()->attach($pokemon->id); // Asumiendo que la categoría "Pokemon" tiene ID 1


        $blueDragon = Product::create([
            'name' => 'Blue-Eyes White Dragon',
            'description' => 'Legend of Blue Eyes White Dragon',
            'price' => 120,
            'image' => 'blue_eyes.webp',
        ]);

        $blueDragon->categories()->attach($yugioh->id); 
    }
}