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
        return view('kaprodi.page.kelulusan_tepat_waktu.table', [
            'data' => KelulusanTepatWaktu::all()
        ]);
    }
}
