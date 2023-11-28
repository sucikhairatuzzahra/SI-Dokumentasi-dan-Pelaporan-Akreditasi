<?php

namespace Database\Seeders;

use App\Models\KategoriDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKategoriDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama_kategori_dosen' => 'Dosen Tetap Perguruan Tinggi',
                'kode_kategori_dosen' => 'DT'
            ],
            [
                'nama_kategori_dosen' => 'Dosen Tidak Tetap Perguruan Tinggi',
                'kode_kategori_dosen' => 'DTT'
            ],
            [
                'nama_kategori_dosen' => 'Dosen Industri/Praktisi',
                'kode_kategori_dosen' => 'DI/P'
            ],
        ];
        foreach ($kategori as $kategoridosen) {
            KategoriDosen::create($kategoridosen);
        }
    }
}
