<?php

namespace App\Http\Controllers;

use App\Exports\TenagaKependidikanExport;
use App\Models\PTUnit;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $tenaga_kependidikan = TenagaKependidikan::groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'id_pt_unit')
                ->with('ptUnit')
                ->orderBy('jenis_tenaga_kependidikan')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->get();

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
            return view('kependidikan.index', compact('data', 'request', 'tenaga_kependidikan'));
        }
<<<<<<< HEAD
        return view('jurusan.page.kependidikan.index', compact('data','user','tenaga_kependidikan'));
    }
    public function admprodiIndex()
    {
        $tenaga_kependidikan = TenagaKependidikan::groupBy('jenjang_pendidikan','jenis_tenaga_kependidikan','id_pt_unit')
        ->orderBy('jenis_tenaga_kependidikan')->get();
        $tenaga_kependidikan2 = TenagaKependidikan::all();
        $user = Auth::user();
        $data = [];
        $possibleJenjangs = ['sma', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3'];
        foreach ($tenaga_kependidikan as $key => $value) {
            $jenjangCounts = array_fill_keys($possibleJenjangs, 0);
            $user = User::where('id',$value->id_pt_unit)->get();
            $data[$key] = [
                'user' => $user,
                'id' => $value->id,
                'jenis_tenaga_kependidikan' => $value->jenis_tenaga_kependidikan,
                'nama' => $value->nama,
                'id_pt_unit' => $value->id_pt_unit,
                'kode_pt_unit' => $value->kode_pt_unit,
                'jenjang_pendidikan' => $value->get('jenjang_pendidikan'),
                'jenjang_counts' => $tenaga_kependidikan2->where('jenis_tenaga_kependidikan',$value->jenis_tenaga_kependidikan)
                ->where('id_pt_unit', $value->id_pt_unit)
                ->where('jenjang_pendidikan', $value->jenjang_pendidikan)->groupBy('jenjang_pendidikan','jenis_tenaga_kependidikan','id_pt_unit')->each(function ($item, $keyjp) use (&$jenjangCounts) {
                 $jenjangCounts[$keyjp] = $item->count(); 
            })
            ];      
        }

        return view('admprodi.page.kependidikan.index', compact('data','user','tenaga_kependidikan'));
    }
    public function kaprodiIndex()
    {
        // // $tenaga_kependidikan = TenagaKependidikan::groupBy('jenjang_pendidikan','jenis_tenaga_kependidikan','pt_unit')
        // // ->orderBy('jenis_tenaga_kependidikan')->get();
        // // $tenaga_kependidikan2 = TenagaKependidikan::all();
        // // // dd($tenaga_kependidikan);
=======
>>>>>>> 4dface9ac6ed703672574384b923776abfacf6f8

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
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
