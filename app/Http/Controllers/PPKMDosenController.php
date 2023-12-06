<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDosen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

use App\Models\PPKM;
use App\Models\PTUnit;
use App\Models\JenisLuaran;
use App\Models\Dosen;
use App\Models\JenisLuaranLain;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class PPKMDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $data = PPKMDosen::with('ppkm', 'dosens')->get();
            $nama_dosen = [];
            foreach ($data as $value) {
                $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
                $nama_dosen[] = $pegawai['nama_pegawai'];
            }
            Log::debug($nama_dosen);
            return view('ppkm_dtpr.index', compact('data', 'nama_dosen'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $luarans = Luaran::all();
        // $luaranlains = LuaranLain::all();
        $dosens = Dosen::with('pegawai')->get();
        $ppkm = PPKM::all();
        // $ptUnit = Auth::user()->ptUnit;
        return view('ppkm_dtpr.create', compact('ppkm', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        PPKMDosen::insert([
            'id' => $request->id,
            'id_dosen' => $request->id_dosen,
            'id_ppkm' => $request->id_ppkm,
            'ketua' => $request->ketua,
  
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
        $data['editData'] = PPKMDosen::find($id);
        $dosens = Dosen::with('pegawai')->get();
        $ppkm = PPKM::all();
        // $ptUnit = Auth::user()->ptUnit;
   
        return view('ppkm_dtpr.edit', $data, compact('dosens','ppkm'));
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
        $ppkm = PPKMDosen::find($id);
        $update = $ppkm->update([
            'id_dosen' => $request->id_dosen,
            'id_ppkm' => $request->id_ppkm,
            'ketua' => $request->ketua,

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
        $ppkmdtpr = PPKMDosen::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ppkmdtpr->delete();
        return redirect()->route('ppkm-dtpr')->with('success', 'Data PPKM berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new PPKMDTPRExport, 'PPKM Dari DTPR.xlsx');
    }
}
