<?php

namespace Database\Seeders;

use App\Models\LevelPendidikanTertinggi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateLevelPendidikanTertinggiSeeder extends Seeder
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
                'nama_kategori_dosen' => 'Dosen Tetap Perguruan Tinggi',
                'kode_kategori' => 'DT'
            ],
            [
                'nama_kategori_dosen' => 'Dosen Tidak Tetap Perguruan Tinggi',
                'kode_kategori' => 'DTT'
            ],
            [
                'nama_kategori_dosen' => 'Dosen Industri/Praktisi',
                'kode_kategori' => 'DI/P'
            ],
        ];
        foreach ($level as $kategoridosen) {
            LevelPendidikanTertinggi::create($kategoridosen);
        }
    }
}
