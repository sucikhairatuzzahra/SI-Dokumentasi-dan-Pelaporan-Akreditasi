<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDariDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PPKMDariDTPRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isJurusan')) {
            $data = PPKMDariDTPR::with('ptUnit');
            $data = $data->paginate('20');
            return view('ppkm_dtpr.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = PPKMDariDTPR::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('ppkm_dtpr.index', compact('data'));
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
        return view('ppkm_dtpr.create', compact('ptUnit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PPKMDariDTPR::insert([
            'id' => $request->id,
            'nama_dtpr' => $request->nama_dtpr,
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
            'pt_unit' => $request->kode_pt_unit,

        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = PPKMDariDTPR::find($id);
        return view('ppkm_dtpr.edit', $data);
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
        $ppkm = PPKMDariDTPR::find($id);
        $ppkm->update([
            'nama_dtpr' => $request->nama_dtpr,
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppkm = PPKMDariDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ppkm->delete();
        return redirect()->route('ppkm-dtpr')->with('success', 'Data PPKM berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new PPKMDTPRExport, 'PPKM Dari DTPR.xlsx');
    }
}
