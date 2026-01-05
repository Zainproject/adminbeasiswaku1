<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create penyedia beasiswa user
        User::create([
            'name' => 'Penyedia Beasiswa',
            'email' => 'beasiswa1@gmail.com',
            'password' => Hash::make('beasiswa1123'),
            'role' => 'penyedia',
        ]);

        // Create test pendaftar user
        User::create([
            'name' => 'Test Pendaftar',
            'email' => 'pendaftar@gmail.com',
            'password' => Hash::make('pendaftar123'),
            'role' => 'pendaftar',
        ]);
    }
}
