<?php

namespace Database\Seeders;

use App\Models\LevelPTUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateLevelPTUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            [
                'kode_level_pt_unit' => 'PT',
                'nama_level_pt_unit' => 'Perguruan Tinggi',
                'induk_level_pt_unit' => '1',
                'jenis_level_pt_unit' => 'pt',
                'aktif' => 'y'
            ],
            [
                'kode_level_pt_unit' => 'Jurusan',
                'nama_level_pt_unit' => 'Jurusan',
                'induk_level_pt_unit' => '1',
                'jenis_level_pt_unit' => 'upps',
                'aktif' => 'y'
            ],
            [
                'kode_level_pt_unit' => 'PS',
                'nama_level_pt_unit' => 'Program Studi',
                'induk_level_pt_unit' => '2',
                'jenis_level_pt_unit' => 'ps',
                'aktif' => 'y'
            ],
            [
                'kode_level_pt_unit' => 'Unit',
                'nama_level_pt_unit' => 'Unit',
                'induk_level_pt_unit' => '1',
                'jenis_level_pt_unit' => 'non_upps_ps',
                'aktif' => 'y'
            ],
            [
                'kode_level_pt_unit' => 'Bagian',
                'nama_level_pt_unit' => 'Bagian',
                'induk_level_pt_unit' => '1',
                'jenis_level_pt_unit' => 'non_upps_ps',
                'aktif' => 'y'
            ],
        ];
        foreach ($level as $levelptunit) {
            LevelPTUnit::create($levelptunit);
        }
    }
}
