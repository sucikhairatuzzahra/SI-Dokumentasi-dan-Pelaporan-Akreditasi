<?php

namespace Database\Seeders;

use App\Models\IPKLulusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IPKLulusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IPKLulusan::create([
            'tahun_lulus' => 2020,
            'jumlah_lulusan' => 29,
            'ipk_min' => 3,
            'ipk_rata_rata' => 3.53,
            'ipk_max' => 3.98,
            'id_pt_unit' => 5,
        ]);
    }
}
