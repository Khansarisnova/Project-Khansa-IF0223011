<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jadwal::create([
            "no" => "01",
            "tanggal" => "14/7/2025",
            "hari" => "Senin",
            "jam" => "08.45",
            "ruangan" => "L1.R2",
            "mata_kuliah" => "Pemograman web",
            "status_ujian" => "Belum",
        ]);
    }
}
