<?php

namespace Database\Seeders;

use App\Models\Pendanaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendanaanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dana = [
            [
                'sumber_dana' => 'Dana dari SPP Mahasiswa',
                'jumlah' => '90000000',
                'bukti' => null,
                'keterangan' => 'Rekapitulasi dana UKT Mahasiswa TA 2021/2022',
                'id_pt_unit' => 5,
            ],
            [
                'sumber_dana' => 'Dana dari PEMDA',
                'jumlah' => '1550000',
                'bukti' => null,
                'keterangan' => 'Naskah Perjanjian Hibah Daerah Pemerintah Kabupaten Tanah Datar',
                'id_pt_unit' => 4,
            ],
            [
                'sumber_dana' => 'Dana dari DIPA',
                'jumlah' => '1550000',
                'bukti' => null,
                'keterangan' => 'Laporan realisasi keuangan PNP',
                'id_pt_unit' => 4,
            ]
        ];

        foreach ($dana as $item) {
            Pendanaan::create($item);
        }
    }
}
