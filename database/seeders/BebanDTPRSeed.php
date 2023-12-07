<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BebanDTPR;

class BebanDTPRSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BebanDTPR::create([
            'id_thn_akademik' => 1,
            'id_dosen' => 1,
            'pgjrn_ps_sendiri' => 10,
            'pgjrn_ps_lain_pt_sendiri' => 12,
            'pgjrn_pt_lain' => 0,
            'sks_penelitian' => 10,
            'sks_pengabdian' => 8,
            'manajemen_pt_sendiri' => 5,
            'manajemen_pt_lain' => 5,
        ]);
    }
}
