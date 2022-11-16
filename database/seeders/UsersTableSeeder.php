<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'employee_id' => '0202240',
                'name'      => 'Samuel Adriel Romaito Manurung',
                'email'     => 'samuel@nusa.net.id',
                'password'  => bcrypt('12345678'),
                'utype'     => 'AuthMaster',
                'isApprovedByAdmin'     => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => '0202233',
                'name'      => 'M. Fikri Pasaribu',
                'email'     => 'fikri@nusa.net.id',
                'password'  => bcrypt('12345678'),
                'utype'     => 'AuthSales',
                'isApprovedByAdmin'     => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => '0202261',
                'name'      => 'Teguh Dana Prayuda',
                'email'     => 'teguhdana@nusa.net.id',
                'password'  => bcrypt('12345678'),
                'utype'     => 'AuthSalesManager',
                'isApprovedByAdmin'     => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => '0201826',
                'name'      => 'Cut Amalia',
                'email'     => 'cutamalia@nusa.net.id',
                'password'  => bcrypt('12345678'),
                'utype'     => 'AuthCRO',
                'isApprovedByAdmin'     => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        // User::create([
        //     'employee_id' => '0202241',
        //     'name'      => 'Fajar',
        //     'email'     => 'fajar@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201826',
        //     'name'      => 'Cut Amalia',
        //     'email'     => 'cutamalia@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()

        // ]);

        // User::create([
        //     'employee_id' => '0202240',
        //     'name'      => 'Samuel',
        //     'email'     => 'samuel@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0202206',
        //     'name'      => 'Riris',
        //     'email'     => 'riris@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0200519',
        //     'name'      => 'Syafii',
        //     'email'     => 'syafii@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201203',
        //     'name'      => 'Jefri',
        //     'email'     => 'jefri@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0200622',
        //     'name'      => 'Ali Putera',
        //     'email'     => 'aliputera@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201408',
        //     'name'      => 'Timmie',
        //     'email'     => 'timmie@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0200925',
        //     'name'      => 'Sovian',
        //     'email'     => 'sovian@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthMaster',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201908',
        //     'name'      => 'Ramon',
        //     'email'     => 'ramon@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0200907',
        //     'name'      => 'Bambang',
        //     'email'     => 'bambang@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201112',
        //     'name'      => 'Rudi',
        //     'email'     => 'sahrudi@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201005',
        //     'name'      => 'Budiman',
        //     'email'     => 'budiman@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201516',
        //     'name'      => 'Fani',
        //     'email'     => 'fani@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201318',
        //     'name'      => 'Jimmy',
        //     'email'     => 'jimmy@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'employee_id' => '0201926',
        //     'name'      => 'Abdul Majid',
        //     'email'     => 'abdulmajid@nusa.net.id',
        //     'password'  => bcrypt('Nusanet2022!'),
        //     'utype'     => 'AuthSales',
        //     'isApprovedByAdmin'     => 1,
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
    }
}
