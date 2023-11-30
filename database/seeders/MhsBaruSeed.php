<?php

namespace Database\Seeders;

use App\Models\Mhsbaru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MhsBaruSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhsBarus = [
            [
                'id_thn_akademik' => 1,
                'id_pt_unit' => 4,
                'daya_tampung' => 200,
                'pendaftar' => 580,
                'lulus_seleksi' => 300,
                'maba_reguler' => 200,
                'maba_transfer' => 20,
                'mhs_aktif_reguler' => 890,
                'mhs_aktif_transfer' => 0,
            ],
            [
                'id_thn_akademik' => 1,
                'id_pt_unit' => 5,
                'daya_tampung' => 300,
                'pendaftar' => 1000,
                'lulus_seleksi' => 400,
                'maba_reguler' => 250,
                'maba_transfer' => 0,
                'mhs_aktif_reguler' => 590,
                'mhs_aktif_transfer' => 1,
            ]
        ];


        foreach ($mhsBarus as $mhsBaru) {
            Mhsbaru::create($mhsBaru);
        }
    }
}
