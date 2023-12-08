<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\PPKM;
use App\Models\PTUnit;
use App\Models\LuaranPPKM;
use App\Models\Dosen;
use App\Models\LuaranPPKMDosen;
use App\Models\JenisLuaranLain;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class LuaranPPKMDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = LuaranPPKMDosen::with('luaranPpkm', 'dosens')->get();
        $nama_dosen = [];
        foreach ($data as $value) {
            $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
            $nama_dosen[] = $pegawai['nama_pegawai'];
        }
        Log::debug($nama_dosen);
        return view('luaran_ppkm_dosen.index', compact('data', 'nama_dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::with('pegawai')->get();
        $luaranPpkm = LuaranPPKM::all();

        return view('luaran_ppkm_dosen.create', compact('luaranPpkm', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LuaranPPKMDosen::create([
            'id' => $request->id,
            'id_dosen' => $request->id_dosen,
            'id_luaran_ppkm' => $request->id_luaran_ppkm,
        ]);
        return redirect('luaran-ppkm-dosen')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = LuaranPPKMDosen::find($id);
        $dosens = Dosen::with('pegawai')->get();
        $luaranPpkm = LuaranPPKM::all();
        return view('luaran_ppkm_dosen.edit', $data, compact('dosens', 'luaranPpkm'));
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
        $ppkm = LuaranPPKMDosen::find($id);
        $update = $ppkm->update([
            'id_dosen' => $request->id_dosen,
            'id_luaran_ppkm' => $request->id_luaran_ppkm,

        ]);
        return redirect('luaran-ppkm-dosen')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppkm = LuaranPPKMDosen::findOrFail($id);
        $ppkm->delete();
        return redirect()->route('luaran-ppkm-dosen')->with('success', 'Data Publikasi Dosen berhasil dihapus');
    }
}
