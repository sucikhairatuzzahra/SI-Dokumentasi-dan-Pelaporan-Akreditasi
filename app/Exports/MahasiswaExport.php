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
    public function view(): View
    {
        $data = Mhsbaru::with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        return view('mahasiswa.table', compact('data'));
    }
}
