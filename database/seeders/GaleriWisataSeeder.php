<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GaleriWisata;

class GaleriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GaleriWisata::insert([
            [
                'wisata_id' => 1,
                'foto' => 'galeri/pantai1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wisata_id' => 1,
                'foto' => 'galeri/pantai2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wisata_id' => 1,
                'foto' => 'galeri/pantai3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
