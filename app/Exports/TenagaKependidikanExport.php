<?php

namespace App\Exports;

use App\Models\TenagaKependidikan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;

class TenagaKependidikanExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $tenaga_kependidikan = TenagaKependidikan::groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'id_pt_unit')->with('ptUnit')
        ->orderBy('jenis_tenaga_kependidikan')->get();
        $tenaga_kependidikan2 = TenagaKependidikan::all();

        $data = [];
        $possibleJenjangs = ['sma', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3'];
        foreach ($tenaga_kependidikan as $key => $value) {
            $jenjangCounts = array_fill_keys($possibleJenjangs, 0);
            $data[$key] = [
                'jenis_tenaga_kependidikan' => $value->jenis_tenaga_kependidikan,
                'nama' => $value->nama,
                'id_pt_unit' => $value->ptUnit->id,
                'pt_unit' => $value->ptUnit->kode_pt_unit,
                'unit_kerja' => $value->unit_kerja,
                'jenjang_pendidikan' => $value->get('jenjang_pendidikan'),
                'jenjang_counts' => $tenaga_kependidikan2->where('jenis_tenaga_kependidikan', $value->jenis_tenaga_kependidikan)
                    ->where('jenjang_pendidikan', $value->jenjang_pendidikan)->groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'pt_unit')->each(function ($item, $keyjp) use (&$jenjangCounts) {
                        $jenjangCounts[$keyjp] = $item->count();
                    })
            ];
        }

        return view('kependidikan.table', compact('data', 'tenaga_kependidikan'));
        
        // $data = TenagaKependidikan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        // return view('kependidikan.table', compact('data'));
    }
}
