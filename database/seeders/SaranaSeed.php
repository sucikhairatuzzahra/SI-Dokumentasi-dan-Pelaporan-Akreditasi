<?php

namespace Database\Seeders;

use App\Models\SaranaPrasarana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaranaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaranaPrasarana::create([
            'sarana' => 'Ruang Kuliah 1',
            'daya_tampung' => 30,
            'luas_ruang' => 60,
            'jml_mhs' => 28,
            'jam_lyn' => '07.30-16.00',
            'perangkat' => 'test',
            'id_pt_unit' => 5,
        ]);
        SaranaPrasarana::create([
            'sarana' => 'Ruang Dosen',
            'daya_tampung' => 10,
            'luas_ruang' => 60,
            'jml_mhs' => 0,
            'jam_lyn' => '07.30-16.00',
            'perangkat' => 'tes1\r\ntes2',
            'id_pt_unit' => 4,
        ]);
    }
}
