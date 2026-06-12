<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Hydrating Face Cream',
                'brand' => 'CeraVe',
                'category' => 'Уход за кожей',
                'price' => 25,
            ],
            [
                'title' => 'Vitamin C Serum',
                'brand' => 'The Ordinary',
                'category' => 'Уход за кожей',
                'price' => 18,
            ],
            [
                'title' => 'Matte Lipstick',
                'brand' => 'Maybelline',
                'category' => 'Макияж',
                'price' => 12,
            ],
            [
                'title' => 'Volume Mascara',
                'brand' => 'Loreal',
                'category' => 'Макияж',
                'price' => 16,
            ],
            [
                'title' => 'Shampoo Repair',
                'brand' => 'Pantene',
                'category' => 'Уход за волосами',
                'price' => 14,
            ],
            [
                'title' => 'Hair Oil Elixir',
                'brand' => 'Moroccanoil',
                'category' => 'Уход за волосами',
                'price' => 34,
            ],
        ]);
    }
}