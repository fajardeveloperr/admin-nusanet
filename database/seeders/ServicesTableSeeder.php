<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicesList;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newDataService = new ServicesList();

        $newDataService->insert([
            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Basic',
                'package_speed' => '30',
                'package_top' => 'Bulanan',
                'package_price' => ''
            ],
            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Basic',
                'package_speed' => '30',
                'package_top' => 'Tahunan',
                'package_price' => ''
            ]
        ]);
    }
}
