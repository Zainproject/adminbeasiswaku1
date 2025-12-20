<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('status')->insert([
            ['status' => 'pending',  'created_at' => now(), 'updated_at' => now()],
            ['status' => 'diterima', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'ditolak',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
