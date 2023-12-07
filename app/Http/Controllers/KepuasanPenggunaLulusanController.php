<?php

namespace App\Http\Controllers;

use App\Exports\KepuasanPenggunaLulusanExport;
use App\Models\KepuasanPenggunaLulusan;
use Illuminate\Http\Request;
use App\Models\PTUnit;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class KepuasanPenggunaLulusanController extends Controller
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
            $data = KepuasanPenggunaLulusan::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('kepuasan_pengguna_lulusan.index', compact('data', 'request'));
       
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = KepuasanPenggunaLulusan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('kepuasan_pengguna_lulusan.index', compact('data'));
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
        return view('kepuasan_pengguna_lulusan.create', compact('ptUnit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KepuasanPenggunaLulusan::insert([
            'id' => $request->id,
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'id_pt_unit' => $request->id_pt_unit,
        ]);

        return redirect(route('kepuasan-pengguna'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = KepuasanPenggunaLulusan::find($id);
        return view('kepuasan_pengguna_lulusan.edit', $data);
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
        $kepuasan = KepuasanPenggunaLulusan::find($id);
        $update = $kepuasan->update([
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        return redirect('kepuasan-pengguna')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepuasan = KepuasanPenggunaLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kepuasan->delete();
        return redirect()->route('kepuasan-pengguna')->with('success', 'Data Kepuasan Pengguna Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new KepuasanPenggunaLulusanExport, 'Kepuasan Pengguna Lulusan.xlsx');
    }
}
