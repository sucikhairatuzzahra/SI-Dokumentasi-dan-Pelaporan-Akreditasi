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
                'id' => 'PNP',
                'nama_pt_unit' => 'Politeknik Negeri Padang'
               
            ],
            [
                'id' => 'SPM',
                'nama_pt_unit' => 'Satuan Penjamin Mutu'
                
            ],
            [
                'id' => 'JUR.TI',
                'nama_pt_unit' => 'Jurusan Teknologi Informasi'
                
            ],
            [
                'id' => 'D4 TRPL',
                'nama_pt_unit' => 'D4 teknologi Rekayasa Perangkat Lunak'
           
            ],
            [
                'id' => 'D3 MI',
                'nama_pt_unit' => 'D3 Manajemen Informatika'
               
            ],
            [
                'id' => 'AKT',
                'nama_pt_unit' => 'Akuntansi'
                
            ],
            [
                'id' => 'P3M',
                'nama_pt_unit' => 'Pusat Penelitian Pengabdian kepada Masyarakt'
              
            ],
        ];
        foreach ($ptunits as $ptunit) {
            PTUnit::create($ptunit);
        }
    }
}
