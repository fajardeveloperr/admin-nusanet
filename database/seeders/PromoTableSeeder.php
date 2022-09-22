<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PromoList;
use Carbon\Carbon;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newDataService = new PromoList();
        $newDataService->insert([
            [
                'promo_code' => 'TESTHOME1',
                'package_name' => 'Broadband Home',
                'package_top' => 'Tahunan',
                'discount_cut' => '-',
                'monthly_cut' => '1',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'promo_code' => 'TESTBUSSINESS1',
                'package_name' => 'Broadband Bussiness',
                'package_top' => 'Bulanan',
                'discount_cut' => '15',
                'monthly_cut' => '1',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'promo_code' => 'TESTBUSSINESS2',
                'package_name' => 'Broadband Bussiness',
                'package_top' => 'Tahunan',
                'discount_cut' => '15',
                'monthly_cut' => '-',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'promo_code' => 'TESTDEDICATED141',
                'package_name' => 'Dedicated 1:4',
                'package_top' => 'Bulanan',
                'discount_cut' => '15',
                'monthly_cut' => '-',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'promo_code' => 'TESTDEDICATED142',
                'package_name' => 'Dedicated 1:4',
                'package_top' => 'Tahunan',
                'discount_cut' => '15',
                'monthly_cut' => '-',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'promo_code' => 'TESTDEDICATED111',
                'package_name' => 'Dedicated 1:1',
                'package_top' => 'Bulanan',
                'discount_cut' => '10',
                'monthly_cut' => '-',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'promo_code' => 'TESTDEDICATED112',
                'package_name' => 'Dedicated 1:1',
                'package_top' => 'Tahunan',
                'discount_cut' => '10',
                'monthly_cut' => '-',
                'activate_date' => '2022-09-01 00:00:00',
                'expired_date' => '2022-09-30 00:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}

