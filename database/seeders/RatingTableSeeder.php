<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\feedbackTable;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords = [
            ['id' => 1, 'message' => 'excellent project', 'rating' => 5, 'status' => 0],
            ['id' => 2, 'message' => 'amazing one', 'rating' => 4, 'status' => 0],
            ['id' => 3, 'message' => 'helpful project', 'rating' => 2, 'status' => 0]
        ];
        feedbackTable::insert($ratingRecords);
    }
}
