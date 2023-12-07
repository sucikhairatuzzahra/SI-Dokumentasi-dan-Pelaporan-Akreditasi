<?php

namespace App\Exports;

use App\Models\BebanDTPR;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class BebanDTPRExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        // $data = BebanDTPR::with( 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        $data = BebanDTPR::with('dosens','tahunAkademik')->get();
        $nama_dosen = [];
        foreach ($data as $value) {
            $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
            $nama_dosen[] = $pegawai['nama_pegawai'];
        }
        Log::debug($nama_dosen);
        return view('beban_dtpr.table', compact('data', 'nama_dosen'));
    }
}
