<?php

namespace Database\Seeders;

use App\Models\MasaTungguLulusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasaTungguLulusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasaTungguLulusan::create([
            'tahun_lulus' => 2020,
            'jumlah_lulusan' => 50,
            'lulusan_terlacak' => 20,
            'waktu_tunggu' => 7,
            'id_pt_unit' => 5
        ]);
    }
}
