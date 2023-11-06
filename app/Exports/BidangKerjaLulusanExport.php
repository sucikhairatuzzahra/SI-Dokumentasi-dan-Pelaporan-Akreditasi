<?php

namespace App\Exports;

use App\Models\BidangKerjaLulusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BidangKerjaLulusanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('kaprodi.page.bidang_kerja_lulusan.table', [
            'data' => BidangKerjaLulusan::all()
        ]);
    }
}
