<?php

namespace Database\Seeders;

use App\Models\PTUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePTUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ptunits = [
            [
                'kode_pt_unit' => 'PNP',
                'nama_pt_unit' => 'Politeknik Negeri Padang',
               'induk_pt_unit' => '0'
            ],
            [
                'kode_pt_unit' => 'SPM',
                'nama_pt_unit' => 'Satuan Penjamin Mutu',
                'induk_pt_unit' => '1'
            ],
            [
                'kode_pt_unit' => 'JUR.TI',
                'nama_pt_unit' => 'Jurusan Teknologi Informasi',
                'induk_pt_unit' => '1'
            ],
            [
                'kode_pt_unit' => 'D4 TRPL',
                'nama_pt_unit' => 'D4 teknologi Rekayasa Perangkat Lunak',
                'induk_pt_unit' => '2'
            ],
            [
                'kode_pt_unit' => 'D3 MI',
                'nama_pt_unit' => 'D3 Manajemen Informatika',
                'induk_pt_unit' => '2'
            ],
            [
                'kode_pt_unit' => 'D3 TK',
                'nama_pt_unit' => 'D3 Teknik Komputer',
                'induk_pt_unit' => '2'
            ],
            [
                'kode_pt_unit' => 'AKT',
                'nama_pt_unit' => 'Akuntansi',
                'induk_pt_unit' => '0'
            ],
            [
                'kode_pt_unit' => 'P3M',
                'nama_pt_unit' => 'Pusat Penelitian Pengabdian kepada Masyarakt',
                'induk_pt_unit' => '0'
            ],
        ];
        foreach ($ptunits as $ptunit) {
            PTUnit::create($ptunit);
        }
    }
}
