<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerRequest;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name'        => 'Luxe Beauty',
                'email'       => 'luxe@beauty.kz',
                'password'    => bcrypt('password'),
                'description' => 'Профессиональная косметика премиум класса',
                'status'      => 'approved',
            ],
            [
                'name'        => 'BeautyPro',
                'email'       => 'info@beautypro.kz',
                'password'    => bcrypt('password'),
                'description' => 'Профессиональные инструменты для красоты',
                'status'      => 'approved',
            ],
            [
                'name'        => 'Glow Cosmetics',
                'email'       => 'hello@glow.kz',
                'password'    => bcrypt('password'),
                'description' => 'Натуральная косметика нового поколения',
                'status'      => 'pending',
            ],
            [
                'name'        => 'SkinLab',
                'email'       => 'contact@skinlab.kz',
                'password'    => bcrypt('password'),
                'description' => 'Уходовая косметика на основе науки',
                'status'      => 'pending',
            ],
            [
                'name'        => 'PerfumeLux',
                'email'       => 'sales@perfumelux.kz',
                'password'    => bcrypt('password'),
                'description' => 'Элитная парфюмерия',
                'status'      => 'rejected',
            ],
        ];

        foreach ($partners as $partner) {
            PartnerRequest::create($partner);
        }
    }
}