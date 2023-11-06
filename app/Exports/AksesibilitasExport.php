<?php

namespace App\Exports;

use App\Models\Aksesibilitas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AksesibilitasExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('kaprodi.page.aksesibilitas.table', [
            'data' => Aksesibilitas::all()
        ]);
    }
}
