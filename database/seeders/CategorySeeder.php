<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Уход за лицом',
            'Уход за волосами',
            'Макияж',
            'Парфюмерия',
            'Маникюр',
            'Уход за телом'
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name
            ]);
        }
    }
}