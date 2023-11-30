<?php

namespace Database\Seeders;

use App\Models\BidangKerjaLulusan;
use Illuminate\Database\Seeder;

class BidangKerjaLulusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKerjaLulusan::create([
            'tahun_lulus' => 2020,
            'jumlah_lulusan' => 100,
            'lulusan_terlacak' => 100,
            'bidang_infokom' => 54,
            'bidang_noninfokom' => 0,
            'internasional' => 12,
            'nasional' => 1,
            'wirausaha' => 20,
            'id_pt_unit' => 5,
        ]);
    }
}
