<?php

namespace Database\Seeders;

use App\Models\Wisata;
use App\Models\GaleriWisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        $wisata = Wisata::create([
            'nama' => 'Pantai Natsepa',
            'deskripsi' => 'Pantai indah di Ambon dengan pasir putih dan air jernih.',
            'lokasi' => 'Ambon, Maluku',
            'kategori' => 'pantai',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=...', // ganti sesuai
        ]);

        GaleriWisata::insert([
            ['wisata_id' => $wisata->id, 'foto' => 'pantai1.jpg'],
            ['wisata_id' => $wisata->id, 'foto' => 'pantai2.jpg'],
            ['wisata_id' => $wisata->id, 'foto' => 'pantai3.jpg'],
        ]);
    }
}
