<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'nomor_induk_dosen' => '12345678',
            'jenis_nomor_induk_dosen' => 'NIDN',
            'id_level_pendidikan_tertinggi' => 3,
            'pendidikan_magister' => 'S2 Informatika UGM',
            'bidang_keahlian' => 'Human Machine Devices',
            'id_pegawai' => 1,
            'id_pt_unit' => 4,
            'id_kategori_dosen' => 1
        ]);
    }
}
