<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MhsbaruImport implements WithStartRow, WithChunkReading
{
    use Importable;

    //JADI KITA BATAS DATA YANG AKAN DIGUNAKAN MULAI DARI BARIS KEDUA, KARENA BARIS PERTAMA DIGUNAKAN SEBAGAI HEADING AGAR MEMUDAHKAN ORANG YANG MENGISI DATA PADA FILE EXCEL
    public function startRow(): int
    {
        return 2;
    }

    //KEMUDIAN KITA GUNAKAN chunkSize UNTUK MENGONTROL PENGGUNAAN MEMORY DENGAN MEMBATASI LOAD DATA DALAM SEKALI PROSES
    public function chunkSize(): int
    {
        return 100;
    }
}
