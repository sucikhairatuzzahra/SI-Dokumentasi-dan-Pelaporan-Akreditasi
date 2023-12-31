<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TahunAkademik;

class CreateTahunAkademikSeeder extends Seeder
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
                'tahun_akademik' => '2023/2024',
                'tahun' => '2023'
            ],
            [
                'tahun_akademik' => '2022/2023',
                'tahun' => '2022'
            ],
            [
                'tahun_akademik' => '2021/2022',
                'tahun' => '2022'
            ],
            [
                'tahun_akademik' => '2020/2021',
                'tahun' => '2020'
            ],
            [
                'tahun_akademik' => '2019/2020',
                'tahun' => '2019'
            ],
            [
                'tahun_akademik' => '2018/2019',
                'tahun' => '2018'
            ],
            [
                'tahun_akademik' => '2017/2018',
                'tahun' => '2017'
            ],
            [
                'tahun_akademik' => '2016/2017',
                'tahun' => '2016'
            ],
           

        ];
        foreach ($data as $ta) {
            TahunAkademik::create($ta);
        }
    }
}
