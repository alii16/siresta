<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Wisata',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'foto_profil' => 'man.jpg',
            'role' => 'admin',
        ]);

        // User biasa
        User::create([
            'name' => 'Pengunjung',
            'email' => 'tes@gmail.com',
            'password' => Hash::make('tes123123'),
            'role' => 'user',
        ]);
    }
}
