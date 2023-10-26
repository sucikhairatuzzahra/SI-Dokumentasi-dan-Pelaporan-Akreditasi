<?php

namespace Database\Seeders;

use App\Models\JumlahTenagaKependidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateJumlahTngKependidikanSeeder extends Seeder
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
                'sma/smk' => 'kriteria 1',
                'nama_kriteria' => 'Visi, Misi, Tujuan dan Strategi'
            ],
            [
                'sma/smk' => 'kriteria 2',
                'nama_kriteria' => 'Tata Pamong, Tata Kelola, dan Kerjasama'
            ],
            [
                'sma/smk' => 'kriteria 3',
                'nama_kriteria' => 'Mahasiswa'
            ],
            [
                'sma/smk' => 'kriteria 4',
                'nama_kriteria' => 'Sumber Daya Manusia'
            ],
            [
                'sma/smk' => 'kriteria 5',
                'nama_kriteria' => 'Keuangan, Sarana dan Prasarana'
            ],
            [
                'sma/smk' => 'kriteria 6',
                'nama_kriteria' => 'Pendidikan'
            ],
            [
                'sma/smk' => 'kriteria 7',
                'nama_kriteria' => 'Penelitian'
            ],
            [
                'sma/smk' => 'kriteria 8',
                'nama_kriteria' => 'Pengabdian Kepada Masyarakat'
            ],
            [
                'sma/smk' => 'kriteria 9',
                'nama_kriteria' => 'Luaran dan Capaian Tridarma'
            ],

        ];
        foreach ($krt as $kriteria) {
            JumlahTenagaKependidikan::create($kriteria);
        }
    }
}
