<?php

namespace App\Http\Controllers;

use App\Exports\TenagaKependidikanExport;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isJurusan')) {
            $data = TenagaKependidikan::paginate('20');

            // dd($data);
            return view('admin.page.kependidikan.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi')) {
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
                    'pt_unit' => $value->ptUnit->kode_pt_unit,
                    'unit_kerja' => $value->unit_kerja,
                    'jenjang_pendidikan' => $value->get('jenjang_pendidikan'),
                    'jenjang_counts' => $tenaga_kependidikan2->where('jenis_tenaga_kependidikan', $value->jenis_tenaga_kependidikan)
                        ->where('jenjang_pendidikan', $value->jenjang_pendidikan)->groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'pt_unit')->each(function ($item, $keyjp) use (&$jenjangCounts) {
                            $jenjangCounts[$keyjp] = $item->count();
                        })
                ];
            }

            return view('kependidikan.index', compact('data', 'tenaga_kependidikan'));
        }

        if (Gate::allows('isKaprodi')) {
            $data = TenagaKependidikan::paginate('20');

            return view('kaprodi.page.kependidikan.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptUnit = Auth::user()->ptUnit;
        return view('kependidikan.create', compact('ptUnit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TenagaKependidikan::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'pt_unit' => $request->kode_pt_unit,
        ]);

        return redirect('kependidikan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = TenagaKependidikan::find($id);
        return view('admprodi.page.kependidikan.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kpddkn = TenagaKependidikan::find($id);
        $kpddkn->update([
            'nama' => $request->nama,
            'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'pt_unit' => $request->kode_pt_unit,

        ]);

        return redirect('kependidikan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kpddkn = TenagaKependidikan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kpddkn->delete();
        return redirect()->route('kependidikan')->with('success', 'Data Kualifikasi Tenaga Kependidikan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new TenagaKependidikanExport, 'Kualifikasi Tenaga Kependidikan.xlsx');
    }
}
