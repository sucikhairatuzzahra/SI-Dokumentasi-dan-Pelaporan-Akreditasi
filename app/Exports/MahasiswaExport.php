<?php

namespace App\Exports;

use App\Models\Mhsbaru;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;



class MahasiswaExport implements FromView, ShouldAutoSize
{
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 15, // Column A width
    //         'B' => 15, // Column B width
    //         'C' => 15,
    //         'D' => 15,
    //         'E' => 15,
    //         'F' => 15,
    //         'G' => 15,
    //         'H' => 15,
    //         'I' => 15,
    //         'J' => 15,
    //         'K' => 15,
    //         'L' => 15,


    //     ];
    // }

    public function view(): View
    {
        $data = Mhsbaru::with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        return view('mahasiswa.table', compact('data'));
    }
}
