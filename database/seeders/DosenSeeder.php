<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dosen::create([
        //     'nomor_induk_dosen' => '12345678',
        //     'jenis_nomor_induk_dosen' => 'NIDN',
        //     'id_level_pendidikan_tertinggi' => 3,
        //     'pendidikan_magister' => 'S2 Informatika UGM',
        //     'bidang_keahlian' => 'Human Machine Devices',
        //     'id_pegawai' => 1,
        //     'id_pt_unit' => 4,
        //     'id_kategori_dosen' => 1
        // ]);

        // DB::insert("INSERT INTO `dosen` (`nomor_induk_dosen`, `jenis_nomor_induk_dosen`, `id_level_pendidikan_tertinggi`, `pendidikan_magister`, `pendidikan_doktor`, `bidang_keahlian`, `jabatan_akademik`, `id_pegawai`, `id_pt_unit`, `id_kategori_dosen`) VALUES
        // ('0019077609', 'NIDK', 3, 'Teknologi Informasi', '-', 'Teknologi Informasi', 'Lektor Kepala', 1, 5, 1),
        // ('0010056608', 'NIDN', 3, 'Informatika', '-', 'Informatika', 'Lektor Kepala', 2, 4, 1),
        // ('0029017603', 'NIDN', 3, 'Sistem Informasi', '-', 'Sistem Informasi', 'Lektor Kepala', 3, 4, 1);");

        Dosen::factory()->count(10)->create();
    }
}
