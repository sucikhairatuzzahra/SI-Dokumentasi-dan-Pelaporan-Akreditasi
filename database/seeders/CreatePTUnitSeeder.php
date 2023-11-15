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
                'induk_pt_unit' => '0',
                'id_level_pt_unit' => '1',
                'id_jenjang_program' => '1'
            ],
            [
                'kode_pt_unit' => 'SPM',
                'nama_pt_unit' => 'Satuan Penjamin Mutu'
                
            ],
            [
                'kode_pt_unit' => 'JUR.TI',
                'nama_pt_unit' => 'Jurusan Teknologi Informasi'
                
            ],
            [
                'kode_pt_unit' => 'D4 TRPL',
                'nama_pt_unit' => 'D4 teknologi Rekayasa Perangkat Lunak'
           
            ],
            [
                'kode_pt_unit' => 'D3 MI',
                'nama_pt_unit' => 'D3 Manajemen Informatika'
               
            ],
            [
                'kode_pt_unit' => 'AKT',
                'nama_pt_unit' => 'Akuntansi'
                
            ],
            [
                'kode_pt_unit' => 'P3M',
                'nama_pt_unit' => 'Pusat Penelitian Pengabdian kepada Masyarakt'
              
            ],
        ];
        foreach ($ptunits as $ptunit) {
            PTUnit::create($ptunit);
        }
    }
}
