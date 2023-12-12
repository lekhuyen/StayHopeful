<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker  = Factory::create();
        $limit = 10;

        for ($i = 0; $i < $limit; $i++){
            DB::table('donate_infos')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->randomFloat(2, 10, 1000),
                'project_id' => 5,
                'user_id' => 7,
                'method' => $faker->randomElement(['Bank']),
                'amount' => $faker->randomFloat(2, 10, 1000),
                'message' => $faker->text,
            ]);
        }
    }
}
