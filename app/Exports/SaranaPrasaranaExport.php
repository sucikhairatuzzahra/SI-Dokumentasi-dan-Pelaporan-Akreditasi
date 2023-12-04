<?php

namespace App\Exports;

use App\Models\SaranaPrasarana;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SaranaPrasaranaExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = SaranaPrasarana::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('sarana_prasarana.table', compact('data'));
    }
}
