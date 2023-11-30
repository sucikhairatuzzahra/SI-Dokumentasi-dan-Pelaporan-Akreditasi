<?php

namespace Database\Seeders;

use App\Models\PPKMDariDTPR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PPKMDariDTPRSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PPKMDariDTPR::create([
            'nama_dtpr' => 'Yulherniwati, S.Kom., M.T.',
            'jenis_penelitian_pengabdian' => 'penelitian',
            'judul' => 'dokumentasi akreditasi',
            'ketua' => 'tidak',
            'id_luaran' => 1,
            'id_luaran_lain' => 1,
            'tahun' => 2023,
            'dana' => '15000000',
            'bukti' => null,
            'id_pt_unit' => 5
        ]);
    }
}
