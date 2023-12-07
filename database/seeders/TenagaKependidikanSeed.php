<?php

namespace Database\Seeders;

use App\Models\TenagaKependidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenagaKependidikanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Marissa Ayu Saphira',
                'jenis_tenaga_kependidikan' => 'Administrasi',
                'jenjang_pendidikan' => 'd3',
                'unit_kerja' => 'Program Studi D4-TRPL'
            ],
            [
                'nama' => 'Suci Khairatuz Zahra',
                'jenis_tenaga_kependidikan' => 'Tata niaga',
                'jenjang_pendidikan' => 's2',
                'unit_kerja' => 'Program Studi D3-MI'
            ]
        ];

        foreach ($data as $item) {
            TenagaKependidikan::create($item);
        }
    }
}
