<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        Promotion::insert([
            [
                'title' => 'Летняя распродажа',
                'description' => 'Скидки до 30%',
                'discount' => 30,
                'category' => 'Уход за лицом'
            ],
            [
                'title' => 'Beauty Week',
                'description' => 'Скидка на декоративную косметику',
                'discount' => 20,
                'category' => 'Макияж'
            ]
        ]);
    }
}