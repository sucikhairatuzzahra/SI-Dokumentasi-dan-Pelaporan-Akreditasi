<?php

namespace App\Exports;

use App\Models\BidangKerjaLulusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class BidangKerjaLulusanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = BidangKerjaLulusan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('bidang_kerja_lulusan.table', compact('data'));

    }
}
