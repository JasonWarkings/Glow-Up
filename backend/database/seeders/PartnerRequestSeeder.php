<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerRequest;

class PartnerRequestSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name'   => 'Luxe Beauty',
                'email'  => 'luxe@beauty.kz',
                'password' => bcrypt('password'),
                'status' => 'approved',
            ],
            [
                'name'   => 'BeautyPro',
                'email'  => 'info@beautypro.kz',
                'password' => bcrypt('password'),
                'status' => 'approved',
            ],
            [
                'name'   => 'Glow Cosmetics',
                'email'  => 'hello@glow.kz',
                'password' => bcrypt('password'),
                'status' => 'pending',
            ],
            [
                'name'   => 'SkinLab',
                'email'  => 'contact@skinlab.kz',
                'password' => bcrypt('password'),
                'status' => 'pending',
            ],
            [
                'name'   => 'PerfumeLux',
                'email'  => 'sales@perfumelux.kz',
                'password' => bcrypt('password'),
                'status' => 'rejected',
            ],
        ];

        foreach ($partners as $partner) {
            PartnerRequest::create($partner);
        }
    }
}