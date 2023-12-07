<?php

namespace App\Exports;

use App\Models\Pendanaan;
use App\Models\PTUnit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class SumberDanaExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        

        $data = Pendanaan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        return view('pendanaan.table', compact('data'));
    }
}
