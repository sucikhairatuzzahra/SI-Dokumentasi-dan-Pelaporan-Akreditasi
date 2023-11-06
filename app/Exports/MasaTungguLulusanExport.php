<?php

namespace App\Exports;

use App\Models\MasaTungguLulusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MasaTungguLulusanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('kaprodi.page.masa_tunggu_lulusan.table', [
            'data' => MasaTungguLulusan::all()
        ]);
    }
}
