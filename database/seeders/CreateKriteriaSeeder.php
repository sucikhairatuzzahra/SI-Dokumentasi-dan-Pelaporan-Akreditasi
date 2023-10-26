<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $krt = [
            [
                'kode_kriteria' => 'kriteria 1',
                'nama_kriteria' => 'Visi, Misi, Tujuan dan Strategi'
            ],
            [
                'kode_kriteria' => 'kriteria 2',
                'nama_kriteria' => 'Tata Pamong, Tata Kelola, dan Kerjasama'
            ],
            [
                'kode_kriteria' => 'kriteria 3',
                'nama_kriteria' => 'Mahasiswa'
            ],
            [
                'kode_kriteria' => 'kriteria 4',
                'nama_kriteria' => 'Sumber Daya Manusia'
            ],
            [
                'kode_kriteria' => 'kriteria 5',
                'nama_kriteria' => 'Keuangan, Sarana dan Prasarana'
            ],
            [
                'kode_kriteria' => 'kriteria 6',
                'nama_kriteria' => 'Pendidikan'
            ],
            [
                'kode_kriteria' => 'kriteria 7',
                'nama_kriteria' => 'Penelitian'
            ],
            [
                'kode_kriteria' => 'kriteria 8',
                'nama_kriteria' => 'Pengabdian Kepada Masyarakat'
            ],
            [
                'kode_kriteria' => 'kriteria 9',
                'nama_kriteria' => 'Luaran dan Capaian Tridarma'
            ],

        ];
        foreach ($krt as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
