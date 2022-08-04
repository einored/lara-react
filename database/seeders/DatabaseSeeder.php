<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $faker = Faker::create('lt_LT');
        $colors = collect(['crimson', 'pink']);
        do {
            $colors->push($faker->safeColorName);
            $colors = $colors->unique();
        } while ($colors->count() < 10);

        foreach($colors as $color) {
            DB::table('colors')->insert([
                'color' => $color,
                'color_name' => $color,
            ]);
        }

        $things = ['book', 'wallet', 'bottle', 'mouse', 'phone'];
        foreach($things as $thing) {
            DB::table('things')->insert([
                'thing_name' => $thing,
                'color_id' => rand(0, 9),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            // 'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10,
        ]);
    }
}
