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
            'name'      =>'Fajar',
            'email'     => 'fajar@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',
        ]);

        User::create([
            'name'      =>'Cut Amalia',
            'email'     => 'cutamalia@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([

            'name'      =>'samuel',
            'email'     => 'samuel@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',
        ]);

        User::create([
            'name'      =>'Riris',
            'email'     => 'riris@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',
        ]);

        User::create([
            'name'      =>'Syafii',
            'email'     => 'syafii@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Jefri',
            'email'     => 'jefri@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Ali Putera',
            'email'     => 'aliputera@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Timmie',
            'email'     => 'timmie@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Sovian',
            'email'     => 'sovian@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',


        ]);

        User::create([
            'name'      =>'Ramon',
            'email'     => 'ramon@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Bambang',
            'email'     => 'bambang@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Rudi',
            'email'     => 'sahrudi@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Budiman',
            'email'     => 'budiman@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',
        ]);

        User::create([
            'name'      =>'Fani',
            'email'     => 'fani@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Jimmy',
            'email'     => 'jimmy@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

        User::create([
            'name'      =>'Abdul Majid',
            'email'     => 'abdulmajid@nusa.net.id',
            'password'  => bcrypt('12345678'),
            'utype'     => 'AuthMaster',

        ]);

    }
}
