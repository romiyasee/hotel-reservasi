<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kamar')->insert([
            [
                'nama_kamar' => 'Deluxe Room',
                'tipe' => 'Deluxe',
                'harga' => 500000,
                'deskripsi' => 'Kamar luas dengan fasilitas lengkap',
            ],
            [
                'nama_kamar' => 'Standard Room',
                'tipe' => 'Standard',
                'harga' => 300000,
                'deskripsi' => 'Kamar sederhana dengan harga terjangkau',
            ],
        ]);
    }
}
