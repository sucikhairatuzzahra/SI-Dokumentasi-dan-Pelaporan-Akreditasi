<?php

namespace App\Exports;

use App\Models\Pendanaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SumberDanaExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('kaprodi.page.pendanaan.table', [
            'data' => Pendanaan::all()
        ]);
    }
}
