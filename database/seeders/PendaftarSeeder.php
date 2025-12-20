<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $namaIndonesia = [
            'Ahmad Fauzi',
            'Siti Aminah',
            'Rizky Pratama',
            'Nurul Hidayah',
            'Budi Santoso',
            'Dewi Lestari',
            'Fajar Ramadhan',
            'Lina Marlina',
            'Hendra Wijaya',
            'Putri Ayu',
            'Miftahul Huda',
            'Aulia Rahman',
            'Salsabila Putri',
            'Muhammad Iqbal',
            'Nadia Safitri',
        ];

        $sekolahSumenep = [
            'SMA Negeri 1 Sumenep',
            'SMA Negeri 2 Sumenep',
            'SMA Negeri 1 Kalianget',
            'SMA Negeri 1 Bluto',
            'SMA Negeri 1 Saronggi',
            'SMA Negeri 1 Pragaan',
            'SMA Negeri 1 Ambunten',
            'SMA Negeri 1 Pasongsongan',
            'SMA Negeri 1 Guluk-Guluk',
            'SMA Negeri 1 Lenteng',
            'SMK Negeri 1 Sumenep',
            'SMK Negeri 2 Sumenep',
            'SMK Negeri 1 Kalianget',
            'SMK Negeri 1 Guluk-Guluk',
            'SMK Negeri 1 Bluto',
            'MAN 1 Sumenep',
            'MAN 2 Sumenep',
            'MA An-Nuqayah Guluk-Guluk',
            'MA Al-Amien Prenduan',
            'MA Al-Ittihad Guluk-Guluk',
            'SMP Negeri 1 Sumenep',
            'SMP Negeri 2 Sumenep',
            'SMP Negeri 3 Sumenep',
            'SMP Negeri 1 Kalianget',
            'SMP Negeri 1 Guluk-Guluk',
            'SMP Negeri 1 Bluto',
            'SMP Negeri 1 Saronggi',
        ];

        for ($i = 0; $i < 50; $i++) {
            DB::table('pendaftar')->insert([
                'id_user'       => fake()->unique()->numberBetween(1000, 9999),
                'nama_lengkap'  => $namaIndonesia[array_rand($namaIndonesia)],
                'tetala'        => fake()->date(),
                'email'         => fake()->unique()->safeEmail(),
                'password'      => bcrypt('password'),
                'instansi'      => $sekolahSumenep[array_rand($sekolahSumenep)],
                'status'        => 'pending',
                'surat'         => null,
            ]);
        }
    }
}
