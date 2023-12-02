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
                'id_pt_unit' => 3
            ],
            [
                'nama' => 'Suci Khairatuz Zahra',
                'jenis_tenaga_kependidikan' => 'Tata niaga',
                'jenjang_pendidikan' => 's2',
                'id_pt_unit' => 5
            ]
        ];

        foreach ($data as $item) {
            TenagaKependidikan::create($item);
        }
    }
}
