<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Aras',
            'email' => 'a@a',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Marius',
            'email' => 'm@m',
            'password' => Hash::make('123'),
            'role' => 'manager'
        ]);

        $faker = Faker::create();

        foreach(range(1, 10) as $i) {
            DB::table('clients')->insert([
                'name' => $faker->cityPrefix ,
                'surname' => $faker->name ,
                'personalId' => rand(10000000000, 99999999999) ,
            ]);
        }
    }
}
