<?php

namespace App\Exports;

use App\Models\TenagaKependidikan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TenagaKependidikanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = TenagaKependidikan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('kependidikan.table', compact('data'));
    }
}
