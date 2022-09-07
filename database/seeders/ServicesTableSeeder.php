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
        ServicesList::create([
            'package_name'  =>'Broadband FO Home Basic 30 Mbps',
            'package_price' => '388500',
            'category'  =>'Personal',
            'period' => 'Bulanan',
        ]);

        ServicesList::create([
            'package_name'  =>'Broadband FO Home Basic 30 Mbps (TAHUNAN)',
            'package_price' => '4662000',
            'category'  =>'Personal',
            'period' => 'Tahunan',
        ]);

        ServicesList::create([
            'package_name'  =>'Broadband FO Home Standard 50 Mbps',
            'package_price' => '499500',
            'category'  =>'Personal',
            'period' => 'Bulanan',
        ]);

        ServicesList::create([
            'package_name'  =>'Broadband FO Home Standard 50 Mbps (TAHUNAN)',
            'package_price' => '5994000',
            'category'  =>'Personal',
            'period' => 'Tahunan',
        ]);

        ServicesList::create([
            'package_name'  =>'Broadband FO Home Premium 100 Mbps',
            'package_price' => '888000',
            'category'  =>'Personal',
            'period' => 'Bulanan',
        ]);

        ServicesList::create([
            'package_name'  =>'Broadband FO Home Premium 100 Mbps (TAHUNAN)',
            'package_price' => '10656000',
            'category'  =>'Personal',
            'period' => 'Tahunan',
        ]);
    }
}
