<?php

namespace App\Exports;

use App\Models\Pendanaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SumberDanaExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Pendanaan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('pendanaan.table', compact('data'));
    }
}
