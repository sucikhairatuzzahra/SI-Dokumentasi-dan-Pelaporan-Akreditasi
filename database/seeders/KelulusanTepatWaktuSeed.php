<?php

namespace Database\Seeders;

use App\Models\KelulusanTepatWaktu;
use Illuminate\Database\Seeder;

class KelulusanTepatWaktuSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelulusanTepatWaktu::create([
            'tahun_masuk' => 2019,
            'jml_mhs' => 100,
            'tahun_lulus' => 2023,
            'wisuda_ke' => 62,
            'jml_lulusan' => 70,
            'masa_studi' => '4',
            'id_pt_unit' => 5
        ]);
    }
}
