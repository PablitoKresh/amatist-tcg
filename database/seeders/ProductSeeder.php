<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buscamos las categorías por su slug
        $pokemon = Category::where('slug', 'pokemon')->first();
        $yugioh = Category::where('slug', 'yu-gi-oh')->first();
        $magic = Category::where('slug', 'magic-the-gathering')->first(); 

        // 2. Definimos todos los productos con sus datos y stock
        $productos = [
            // --- POKÉMON ---
            [
                'name' => 'Charizard 1999',
                'description' => '1ª Edición Base Set Holo. La joya de cualquier colección.',
                'price' => 265,
                'stock' => 5,
                'image' => 'charizard.jpg',
                'category' => $pokemon
            ],
            [
                'name' => 'Venusaur Holo',
                'description' => 'Base Set Rare Holo. El guardián del bosque.',
                'price' => 140,
                'stock' => 8,
                'image' => 'venusaur.jpg',
                'category' => $pokemon
            ],
            [
                'name' => 'Blastoise Stage 2',
                'description' => 'Carta con potentes cañones de agua. Muy difícil de conseguir.',
                'price' => 160,
                'stock' => 3,
                'image' => 'blastoise.png',
                'category' => $pokemon
            ],
            [
                'name' => 'Alakazam Holo',
                'description' => 'Poder psíquico legendario del set original.',
                'price' => 95,
                'stock' => 6,
                'image' => 'alakazam.png',
                'category' => $pokemon
            ],
            // --- YU-GI-OH! ---
            [
                'name' => 'Blue-Eyes White Dragon',
                'description' => 'Legend of Blue Eyes White Dragon. El orgullo de Kaiba.',
                'price' => 120,
                'stock' => 10,
                'image' => 'blue_eyes.webp',
                'category' => $yugioh
            ],
            [
                'name' => 'Dark Magician',
                'description' => 'El mago definitivo en términos de ataque y defensa.',
                'price' => 85,
                'stock' => 15,
                'image' => 'dark_magician.jpg',
                'category' => $yugioh
            ],
            [
                'name' => 'Exodia the Forbidden One',
                'description' => 'Si consigues las 5 piezas, ganas la partida automáticamente.',
                'price' => 500,
                'stock' => 1,
                'image' => 'exodia.webp',
                'category' => $yugioh
            ],
            [
                'name' => 'Red-Eyes Black Dragon',
                'description' => 'Un dragón feroz con un ataque devastador. Muy raro.',
                'price' => 110,
                'stock' => 4,
                'image' => 'red_eyes.webp',
                'category' => $yugioh
            ],
            // --- MAGIC: THE GATHERING (NUEVAS) ---
            [
                'name' => 'Black Lotus',
                'description' => 'Edición Alpha. La carta más poderosa y cara de la historia de Magic.',
                'price' => 25000,
                'stock' => 1,
                'image' => 'black_lotus.webp',
                'category' => $magic
            ],
            [
                'name' => 'Ancestral Recall',
                'description' => 'Roba tres cartas por un solo maná. Una ventaja de cartas sin igual.',
                'price' => 4500,
                'stock' => 2,
                'image' => 'ancestral_recall.webp',
                'category' => $magic
            ],
            [
                'name' => 'Time Walk',
                'description' => 'Toma un turno extra. Rompe las reglas del tiempo en el juego.',
                'price' => 3800,
                'stock' => 1,
                'image' => 'time_walk.jpg',
                'category' => $magic
            ],
            [
                'name' => 'Mox Sapphire',
                'description' => 'Joya legendaria. Acelera tu maná azul desde el primer turno.',
                'price' => 3200,
                'stock' => 3,
                'image' => 'mox_sapphire.webp',
                'category' => $magic
            ],
        ];

        // 3. Recorremos el array y creamos los productos
        foreach ($productos as $item) {
            $product = Product::create([
                'name'        => $item['name'],
                'description' => $item['description'],
                'price'       => $item['price'],
                'stock'       => $item['stock'],
                'image'       => $item['image'],
            ]);

            // Asociamos la categoría si existe
            if ($item['category']) {
                $product->categories()->attach($item['category']->id);
            }
        }
    }
}