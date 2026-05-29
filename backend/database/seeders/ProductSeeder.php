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
                'category' => 'Skincare',
                'brand' => 'CeraVe',
                'price' => 25,
                'discount' => '10%',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Vitamin C Serum',
                'category' => 'Skincare',
                'brand' => 'The Ordinary',
                'price' => 18,
                'discount' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Matte Lipstick',
                'category' => 'Makeup',
                'brand' => 'Maybelline',
                'price' => 12,
                'discount' => '5%',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Volume Mascara',
                'category' => 'Makeup',
                'brand' => 'Loreal',
                'price' => 16,
                'discount' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Shampoo Repair',
                'category' => 'Haircare',
                'brand' => 'Pantene',
                'price' => 14,
                'discount' => '15%',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Hair Oil Elixir',
                'category' => 'Haircare',
                'brand' => 'Moroccanoil',
                'price' => 34,
                'discount' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}