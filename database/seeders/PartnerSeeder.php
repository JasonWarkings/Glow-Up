<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Luxe Beauty',
                'email' => 'luxe@beauty.kz',
                'password' => bcrypt('password'),
                'description' => 'Премиальная косметика: кремы, уход за кожей, anti-age',
                'status' => 'approved',
            ],
            [
                'name' => 'BeautyPro',
                'email' => 'info@beautypro.kz',
                'password' => bcrypt('password'),
                'description' => 'Профессиональный уход за волосами, шампуни, восстановление',
                'status' => 'approved',
            ],
            [
                'name' => 'Glow Cosmetics',
                'email' => 'hello@glow.kz',
                'password' => bcrypt('password'),
                'description' => 'Натуральная косметика, уход за кожей, акне, очищение',
                'status' => 'approved',
            ],
            [
                'name' => 'SkinLab',
                'email' => 'contact@skinlab.kz',
                'password' => bcrypt('password'),
                'description' => 'Дерматология, лечение акне, сыворотки, кислоты',
                'status' => 'approved',
            ],
            [
                'name' => 'PerfumeLux',
                'email' => 'sales@perfumelux.kz',
                'password' => bcrypt('password'),
                'description' => 'Элитная парфюмерия и нишевые ароматы',
                'status' => 'approved',
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}