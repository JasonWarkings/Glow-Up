<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            [
                'title' => 'Hydrating Face Cream',
                'brand' => 'Luxe Beauty',
                'category' => 'Уход за лицом',
                'price' => 8500,
                'image' => 'products/cream.jpg',
                'description' => 'Увлажняющий крем для ежедневного ухода.',
                'partner_id' => 1,
            ],

            [
                'title' => 'Vitamin C Serum',
                'brand' => 'Glow Cosmetics',
                'category' => 'Сыворотки',
                'price' => 12000,
                'image' => 'products/serum.jpg',
                'description' => 'Сыворотка с витамином C для сияния кожи.',
                'partner_id' => 1,
            ],

            [
                'title' => 'Professional Hair Dryer',
                'brand' => 'BeautyPro',
                'category' => 'Техника',
                'price' => 25000,
                'image' => 'products/hairdryer.jpg',
                'description' => 'Профессиональный фен для укладки волос.',
                'partner_id' => 2,
            ],

            [
                'title' => 'Luxury Perfume Rose',
                'brand' => 'PerfumeLux',
                'category' => 'Парфюмерия',
                'price' => 32000,
                'image' => 'products/perfume.jpg',
                'description' => 'Элитный аромат с нотами розы и ванили.',
                'partner_id' => 2,
            ],

            [
                'title' => 'Cleansing Foam',
                'brand' => 'SkinLab',
                'category' => 'Очищение',
                'price' => 6500,
                'image' => 'products/foam.jpg',
                'description' => 'Мягкая пенка для очищения кожи.',
                'partner_id' => 1,
            ],

            [
                'title' => 'Matte Lipstick',
                'brand' => 'Luxe Beauty',
                'category' => 'Макияж',
                'price' => 5500,
                'image' => 'products/lipstick.jpg',
                'description' => 'Стойкая матовая помада.',
                'partner_id' => 1,
            ],

            [
                'title' => 'Eye Shadow Palette',
                'brand' => 'Glow Cosmetics',
                'category' => 'Макияж',
                'price' => 9900,
                'image' => 'products/palette.jpg',
                'description' => 'Палетка теней из 12 оттенков.',
                'partner_id' => 2,
            ],

            [
                'title' => 'Shampoo Repair',
                'brand' => 'SkinLab',
                'category' => 'Уход за волосами',
                'price' => 4800,
                'image' => 'products/shampoo.jpg',
                'description' => 'Восстанавливающий шампунь.',
                'partner_id' => 1,
            ],

            [
                'title' => 'Body Lotion',
                'brand' => 'Luxe Beauty',
                'category' => 'Уход за телом',
                'price' => 7200,
                'image' => 'products/lotion.jpg',
                'description' => 'Питательный лосьон для тела.',
                'partner_id' => 2,
            ],

            [
                'title' => 'Nail Care Set',
                'brand' => 'BeautyPro',
                'category' => 'Маникюр',
                'price' => 11500,
                'image' => 'products/nailset.jpg',
                'description' => 'Набор для профессионального маникюра.',
                'partner_id' => 2,
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}