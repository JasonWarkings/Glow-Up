<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Partner;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $partners = Partner::all();

        $products = [
            [
                'title' => 'Увлажняющий крем для лица',
                'category' => 'Уход за лицом',
                'description' => 'Крем для сухой кожи, увлажнение, питание, восстановление барьера кожи',
            ],
            [
                'title' => 'Сыворотка против акне',
                'category' => 'Уход за лицом',
                'description' => 'Лечение прыщей, акне, воспалений, очищение пор',
            ],
            [
                'title' => 'Очищающий гель для лица',
                'category' => 'Уход за лицом',
                'description' => 'Глубокое очищение кожи, уменьшение жирности, уход за порами',
            ],
            [
                'title' => 'Шампунь против выпадения волос',
                'category' => 'Уход за волосами',
                'description' => 'Укрепление волос, восстановление, рост волос',
            ],
            [
                'title' => 'Питательная маска для волос',
                'category' => 'Уход за волосами',
                'description' => 'Восстановление структуры волос, блеск, питание',
            ],
            [
                'title' => 'Крем для рук увлажняющий',
                'category' => 'Уход за телом',
                'description' => 'Сухая кожа рук, питание, защита',
            ],
            [
                'title' => 'Парфюмерная вода Luxe Aroma',
                'category' => 'Парфюмерия',
                'description' => 'Лёгкий аромат, стойкость, премиальная парфюмерия',
            ],
        ];

        foreach ($partners as $partner) {
            foreach ($products as $item) {
                Product::create([
                    'title' => $item['title'],
                    'brand' => $partner->name,
                    'category' => $item['category'],
                    'price' => rand(5000, 20000),
                    'image' => 'products/default.jpg',
                    'description' => $item['description'],
                    'partner_id' => $partner->id,
                    'discount_active' => rand(0, 1),
                ]);
            }
        }
    }
}