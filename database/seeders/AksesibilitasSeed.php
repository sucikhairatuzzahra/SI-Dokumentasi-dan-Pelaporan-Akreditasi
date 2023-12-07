<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aksesibilitas;

class AksesibilitasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'jenis_data' => 'Mahasiswa',
                'secara_manual' => '',
                'tanpa_jrg' => '',
                'lan' => '',
                'wan' => '	https://presensi.pnp.ac.id/ti/'
            ],
        ];

        foreach ($data as $item) {
            Aksesibilitas::create($item);
        }
    }
}
