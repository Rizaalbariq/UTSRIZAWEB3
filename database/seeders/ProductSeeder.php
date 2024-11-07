<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'nim' => '21111' . str_pad($i, 2, '0', STR_PAD_LEFT), // Menambahkan NIM dengan format 2111101, 2111102, ..., 2111120
                'name' => 'Riza Al-Bariq ' . $i, // Nama dengan nomor urut
                'tempat_lahir' => 'Tempat ' . $i, // Menggunakan tempat yang berbeda untuk setiap entri
                'tanggal_lahir' => '2000-01-01', // Tanggal lahir yang sama untuk semua entri
            ]);
        }

    }
}
