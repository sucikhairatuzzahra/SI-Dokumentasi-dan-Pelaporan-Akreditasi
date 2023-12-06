<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'nama_pegawai' => 'Ucup',
            'tanggal_lahir' => '2023-12-06',
            'nip' => '12345678',
            'aktif' => 'ya'
        ]);
    }
}
