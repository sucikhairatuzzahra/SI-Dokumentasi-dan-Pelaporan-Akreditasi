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
                'nama_level_pendidikan' => 'Sarjana',
                'kode_level_pendidikan' => 'S1',
                'dosen' => 't'
            ],
            [
                'nama_level_pendidikan' => 'Sarjana Terapan',
                'kode_level_pendidikan' => 'D4',
                'dosen' => 't'
            ],
            [
                'nama_level_pendidikan' => 'Magister',
                'kode_level_pendidikan' => 'S2',
                'dosen' => 'y'
            ],
            [
                'nama_level_pendidikan' => 'Magister Terapan',
                'kode_level_pendidikan' => 'S2 Terapan',
                'dosen' => 'y'

            ],
            [
                'nama_level_pendidikan' => 'Doktor',
                'kode_level_pendidikan' => 'S3',
                'dosen' => 'y'
            ],
            [
                'nama_level_pendidikan' => 'Doktor Terapan',
                'kode_level_pendidikan' => 'S3 Terapan',
                'dosen' => 'y'
            ],
        ];
        foreach ($level as $kategoridosen) {
            LevelPendidikanTertinggi::create($kategoridosen);
        }
    }
}
