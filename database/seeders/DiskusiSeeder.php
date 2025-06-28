<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diskusi;

class DiskusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diskusi::insert(
            [
                [
                    'wisata_id' => 1,
                    'user_id' => 1,
                    'parent_id' => null,
                    'pesan' => 'worth it ga?',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'wisata_id' => 1,
                    'user_id' => 2,
                    'parent_id' => 1,
                    'pesan' => 'lumayan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ],
        );
    }
}
