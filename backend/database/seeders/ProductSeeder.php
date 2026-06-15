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

        $categories = [
            'Уход за лицом',
            'Уход за волосами',
            'Макияж',
            'Парфюмерия',
            'Маникюр',
            'Уход за телом'
        ];

        foreach ($partners as $partner) {

            for ($i = 1; $i <= 15; $i++) {
                $active = rand(0, 1);
                Product::create([
                    'title' => "Товар {$i} {$partner->name}",
                    'brand' => $partner->name,
                    'category' => $categories[array_rand($categories)],
                    'price' => rand(3000, 25000),
                    'image' => 'products/default.jpg',
                    'description' => 'Профессиональная косметика высокого качества.',
                    'partner_id' => $partner->id,

                    'discount_active' => $active,
                    'discount_percent' => $active ? rand(5, 30) : null,
                ]);
            }
        }
    }
}