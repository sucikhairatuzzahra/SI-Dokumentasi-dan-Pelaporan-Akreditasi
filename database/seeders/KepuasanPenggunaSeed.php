<?php

namespace Database\Seeders;

use App\Models\KepuasanPenggunaLulusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KepuasanPenggunaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KepuasanPenggunaLulusan::create([
            'jenis_kemampuan' => 'Kerjasama Tim',
            'sangat_baik' => 50,
            'baik' => 35,
            'cukup' => 10,
            'kurang' => 5,
            'rencana_tindak_lanjut' => 'Meningkat kualitas pendidikan agar mencetak lulusan berkualitas',
            'id_pt_unit' => 5,
        ]);
    }
}
