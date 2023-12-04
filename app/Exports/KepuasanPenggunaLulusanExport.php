<?php

namespace App\Exports;

use App\Models\KepuasanPenggunaLulusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KepuasanPenggunaLulusanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = KepuasanPenggunaLulusan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('kepuasan_pengguna_lulusan.table', compact('data'));
    }
}
