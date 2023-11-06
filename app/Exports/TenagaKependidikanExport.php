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
        return view('kaprodi.page.kependidikan.table', [
            'data' => TenagaKependidikan::all()
        ]);
    }
}
