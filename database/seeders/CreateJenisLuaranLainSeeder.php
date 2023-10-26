<?php

namespace Database\Seeders;

use App\Models\JenisLuaranLain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateJenisLuaranLainSeeder extends Seeder
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
                'jenis_luaran_lain' => 'Pengakuan HKI (Paten, Paten Sederhana)i '
            ],
            [
                'jenis_luaran_lain' => 'Pengakuan HKI (Hak Cipta, Desain Produk Industri, Perlindungan Varietas Tanaman, Desain Tata Letak Sirkuit Terpadu, dll.)'
            ],
            [
                'jenis_luaran_lain' => 'Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial.'
            ],
            [
                'jenis_luaran_lain' => 'Diterbitkan dalam bentuk Buku ber-ISBN, Book Chapter'
            ],

        ];
        foreach ($jenis as $jenisluaranlain) {
            JenisLuaranLain::create($jenisluaranlain);
        }
    }
}
