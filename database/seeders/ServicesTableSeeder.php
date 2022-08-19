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
            'service_name'  =>'Dedicated Fiber Optic',
            'service_price' => '0',
        ]);

        ServicesList::create([
            'service_name'  =>'Dedicated Wireless',
            'service_price' => '0',
        ]);

        ServicesList::create([
            'service_name'  =>'BroadBand Fiber Optic',
            'service_price' => '0',
        ]);

        ServicesList::create([
            'service_name'  =>'BroadBand Wireless',
            'service_price' => '0',
        ]);
    }
}
