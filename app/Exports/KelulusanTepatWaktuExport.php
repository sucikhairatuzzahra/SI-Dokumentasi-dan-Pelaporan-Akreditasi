<?php

namespace App\Exports;

use App\Models\KelulusanTepatWaktu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KelulusanTepatWaktuExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = KelulusanTepatWaktu::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('kelulusan_tw.table', compact('data'));
    }
}
