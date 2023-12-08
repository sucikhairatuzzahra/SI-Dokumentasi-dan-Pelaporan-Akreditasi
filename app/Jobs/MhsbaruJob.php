<?php

namespace App\Jobs;

use App\Imports\MhsbaruImport;
use App\Models\Mhsbaru;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MhsbaruJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mhsbaru;
    protected $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mhsbaru, $filename)
    {
        $this->mhsbaru = $mhsbaru;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //KEMUDIAN KITA GUNAKAN PRODUCTIMPORT YANG MERUPAKAN CLASS YANG AKAN DIBUAT SELANJUTNYA
        //IMPORT DATA EXCEL TADI YANG SUDAH DISIMPAN DI STORAGE, KEMUDIAN CONVERT MENJADI ARRAY
        $files = (new MhsbaruImport)->toArray(storage_path('app/public/uploads/' . $this->filename));

        //KEMUDIAN LOOPING DATANYA
        foreach ($files[0] as $row) {
            // if ($row[4] != '' && filter_var($row[4], FILTER_VALIDATE_URL)) {

            //FORMATTING URLNYA UNTUK MENGAMBIL FILE-NAMENYA BESERTA EXTENSION
            //JADI PASTIKAN PADA TEMPLATE MASS UPLOADNYA NANTI PADA BAGIAN URL
            //HARUS DIAKHIRI DENGAN NAMA FILE YANG LENGKAP DENGAN EXTENSION
            $explodeURL = explode('/', $row[4]);
            $explodeExtension = explode('.', end($explodeURL));
            $filename = time() . Str::random(6) . '.' . end($explodeExtension);

            //DOWNLOAD GAMBAR TERSEBUT DARI URL TERKAIT
            file_put_contents(storage_path('app/public/products') . '/' . $filename, file_get_contents($row[4]));

            //KEMUDIAN SIMPAN DATANYA DI DATABASE
            Mhsbaru::create([
                'id_thn_akademik' => $row[0],
                'id_pt_unit' => $row[1],
                'daya_tampung' => $row[2],
                'pendaftar' => $row[3],
                'lulus_seleksi' => $row[4],
                'maba_reguler' => $row[5],
                'maba_transfer' => $row[6],
                'mhs_aktif_reguler' => $row[7],
                'mhs_aktif_transfer' => $row[8]
            ]);
        }
        //JIKA PROSESNYA SUDAH SELESAI MAKA FILE YANG ADA DISTORAGE AKAN DIHAPUS
        Storage::delete(storage_path('app/public/uploads/' . $this->filename));
    }
}
