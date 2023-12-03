<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSumberPembiayaan;

class CreateJenisSumberPembiayaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'jenis_sumber_pembiayaan' => 'Mandiri',
            ],
            [
                'jenis_sumber_pembiayaan' => 'Perguruan Tinggi',
            ],
            [
                'jenis_sumber_pembiayaan' => 'Lembaga dalam negri (di luar PT)',
            ],
            [
                'jenis_sumber_pembiayaan' => 'Lembaga luar negri',
            ],
        ];
        foreach ($jenis as $pembiayaan) {
            JenisSumberPembiayaan::create($pembiayaan);
        }
    }
}
