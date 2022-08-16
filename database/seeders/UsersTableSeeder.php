<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>'Samuel',
            'email'     => 'samuel@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);
    }
}
