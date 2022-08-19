<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceList;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceList::create([
            'service_name'  =>'Dedicated Fiber Optic',
            'service_price' => '0',
        ]);

        ServiceList::create([
            'service_name'  =>'Dedicated Wireless',
            'service_price' => '0',
        ]);

        ServiceList::create([
            'service_name'  =>'BroadBand Fiber Optic',
            'service_price' => '0',
        ]);

        ServiceList::create([
            'service_name'  =>'BroadBand Wireless',
            'service_price' => '0',
        ]);
    }
}
