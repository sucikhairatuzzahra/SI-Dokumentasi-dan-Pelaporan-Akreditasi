<?php

namespace Database\Seeders;

use App\Models\JenjangProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateJenjangProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jp = [
            [
                'kode_jenjang_program' => '-',
                'nama_jenjang_program' => 'Non Jenjang',
                'aktif' => 'y'
            ],
            [
                'kode_jenjang_program' => 'D1',
                'nama_jenjang_program' => 'Diploma 1',
                'aktif' => 't'
            ],
            [
                'kode_jenjang_program' => 'D2',
                'nama_jenjang_program' => 'Diploma 2',
                'aktif' => 't'
            ],
            [
                'kode_jenjang_program' => 'D3',
                'nama_jenjang_program' => 'Diploma 3',
                'aktif' => 'y'
            ],
            [
                'kode_jenjang_program' => 'D4',
                'nama_jenjang_program' => 'Diploma 4',
                'aktif' => 'y'
            ],
            [
                'kode_jenjang_program' => 'S2 Terapan',
                'nama_jenjang_program' => 'Magister Terapan',
                'aktif' => 'y'
            ],
            [
                'kode_jenjang_program' => 'S3 Terapan',
                'nama_jenjang_program' => 'Doktor Terapan',
                'aktif' => 't'
            ],

        ];
        foreach ($jp as $jjgprogram) {
            JenjangProgram::create($jjgprogram);
        }
    }
}
