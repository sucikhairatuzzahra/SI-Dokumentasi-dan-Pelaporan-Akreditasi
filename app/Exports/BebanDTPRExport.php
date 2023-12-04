<?php

namespace App\Exports;

use App\Models\BebanDTPR;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BebanDTPRExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = BebanDTPR::with( 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        return view('beban_dtpr.table', compact('data'));
    }
}
