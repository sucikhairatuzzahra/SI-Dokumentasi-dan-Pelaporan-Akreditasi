<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pegawai::create([
        //     'nama_pegawai' => 'Ucup',
        //     'tanggal_lahir' => '2023-12-06',
        //     'nip' => '12345678',
        //     'aktif' => 'ya'
        // ]);

        // DB::insert("INSERT INTO `pegawai` (`nama_pegawai`, `tanggal_lahir`, `nip`, `aktif`) VALUES
        // ('Variyetmi Wira, SE.,MM', '1980-01-01', '198011012006042001', 'ya'),
        // ('Ronal Hadi, ST., M.Kom', '1981-01-01', '198111012006042001', 'ya'),
        // ('Dwiny Meidelfi, S.Kom.,M.Cs', '1978-03-03', '19780415 200012 1 002', 'ya');");

        Pegawai::factory()->count(10)->create();
    }
}
