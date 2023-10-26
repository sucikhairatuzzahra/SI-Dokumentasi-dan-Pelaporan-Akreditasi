<?php

namespace Database\Seeders;

use App\Models\JenisLuaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateJenisLuaranSeeder extends Seeder
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
                'jenis_luaran' => 'Publikasi di jurnal nasional tidak terakreditasi'
            ],
            [
                'jenis_luaran' => 'Publikasi di jurnal nasional terakreditasi'
            ],
            [
                'jenis_luaran' => 'Publikasi di jurnal internasional'
            ],
            [
                'jenis_luaran' => 'Publikasi di jurnal internasional bereputasi'
            ],
            [
                'jenis_luaran' => 'Publikasi di seminar wilayah/lokal/perguruan tinggi'
            ],
            [
                'jenis_luaran' => 'Publikasi di seminar nasional'
            ],
            [
                'jenis_luaran' => 'Publikasi di seminar internasional'
            ],
            [
                'jenis_luaran' => 'Pagelaran/pameran/presentasi tingkat wilayah'
            ],
            [
                'jenis_luaran' => 'Pagelaran/pameran/presentasi tingkat nasional '
            ],
            [
                'jenis_luaran' => 'Pagelaran/pameran/presentasi tingkat internasional'
            ],

        ];
        foreach ($jenis as $jeniskeluaran) {
            JenisLuaran::create($jeniskeluaran);
        }
    }
}
