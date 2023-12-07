<?php

namespace App\Exports;

use App\Models\PPKMDariDTPR;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class PPKMDTPRExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('kaprodi.page.ppkm_dtpr.table', [
            'data' => PPKMDariDTPR::all()
        ]);
    }
}
