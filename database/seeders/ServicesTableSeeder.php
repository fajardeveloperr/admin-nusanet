<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicesList;
use Carbon\Carbon;

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
                'package_price' => '388500',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Basic',
                'package_speed' => '30',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Standart',
                'package_speed' => '50',
                'package_top' => 'Bulanan',
                'package_price' => '499500',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Standart',
                'package_speed' => '50',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Premium',
                'package_speed' => '100',
                'package_top' => 'Bulanan',
                'package_price' => '888000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Home',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Premium',
                'package_speed' => '100',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Primary',
                'package_speed' => '30',
                'package_top' => 'Bulanan',
                'package_price' => '700000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Primary',
                'package_speed' => '30',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Advanced',
                'package_speed' => '50',
                'package_top' => 'Bulanan',
                'package_price' => '1200000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Advanced',
                'package_speed' => '50',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Pro',
                'package_speed' => '100',
                'package_top' => 'Bulanan',
                'package_price' => '1980000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Fiber Optic',
                'package_categories' => 'Pro',
                'package_speed' => '100',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Silver',
                'package_speed' => '10',
                'package_top' => 'Bulanan',
                'package_price' => '649000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Silver',
                'package_speed' => '10',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Gold',
                'package_speed' => '20',
                'package_top' => 'Bulanan',
                'package_price' => '999000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Gold',
                'package_speed' => '20',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Diamond',
                'package_speed' => '30',
                'package_top' => 'Bulanan',
                'package_price' => '1599000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Broadband Bussiness',
                'package_type' => 'Wireless',
                'package_categories' => 'Diamond',
                'package_speed' => '30',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '50',
                'package_top' => 'Bulanan',
                'package_price' => '1999000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '50',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '75',
                'package_top' => 'Bulanan',
                'package_price' => '2899000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '75',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '100',
                'package_top' => 'Bulanan',
                'package_price' => '3499000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 4',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '100',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '10',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '15',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '20',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '30',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '40',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '50',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '60',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '70',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '80',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '90',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '100',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '150',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '200',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '300',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '400',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '500',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '600',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '700',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '800',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '900',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '1000',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '10',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '15',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '20',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '30',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '40',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '50',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '60',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '70',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '80',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '90',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '100',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '150',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '200',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '300',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '400',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '500',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '600',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '700',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '800',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '900',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Fiber Optic',
                'package_categories' => '-',
                'package_speed' => '1000',
                'package_top' => 'Tahunan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '10',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '15',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '20',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '30',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '40',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package_name' => 'Dedicated 1 : 1',
                'package_type' => 'Wireless',
                'package_categories' => '-',
                'package_speed' => '50',
                'package_top' => 'Bulanan',
                'package_price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
