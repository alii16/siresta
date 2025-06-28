<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'wisata_id' => 1,
            'user_id' => 1,
            'rating' => 4,
            'komentar' => 'bagus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
