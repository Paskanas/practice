<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('users')->insert([
            'name' => 'Mamutas',
            'email' => 'mamutas@gmail.com',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10
        ]);

        //restorants
        DB::table('restorants')->insert([
            'title' => 'Restoranas1',
            'city' => 'Vilnius',
            'address' => 'Sauletekio aleja 10',
            'working_time' => '10:00-18:00'
        ]);
        DB::table('restorants')->insert([
            'title' => 'Restoranas2',
            'city' => 'Kaunas',
            'address' => 'Nemenčinė',
            'working_time' => '11:00-20:00'
        ]);


        //dishes
        DB::table('dishes')->insert([
            'restorant_id' => 1,
            'title' => 'Pizza',
            'price' => 10.11
        ]);
        DB::table('dishes')->insert([
            'restorant_id' => 1,
            'title' => 'Burger',
            'price' => 9.99
        ]);
        DB::table('dishes')->insert([
            'restorant_id' => 2,
            'title' => 'Pink soup',
            'price' => 2.22
        ]);
        DB::table('dishes')->insert([
            'restorant_id' => 2,
            'title' => 'Tom yum',
            'price' => 5.33
        ]);
    }
}
