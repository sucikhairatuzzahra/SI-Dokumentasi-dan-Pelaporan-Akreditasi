<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PPKM;
use App\Models\PTUnit;
use App\Models\LuaranLainPPKM;
use App\Models\Dosen;
use App\Models\LuaranLainPPKMDosen;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class LuaranLainPPKMDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LuaranLainPPKMDosen::with('luaranLainPpkm', 'dosens')->get();
        $nama_dosen = [];
        foreach ($data as $value) {
            $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
            $nama_dosen[] = $pegawai['nama_pegawai'];
        }
        Log::debug($nama_dosen);
        return view('luaran_lain_ppkm_dosen.index', compact('data', 'nama_dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::with('pegawai')->get();
        $luaranLainPpkm = LuaranLainPPKM::with('jenisLuaranLain', 'ppkm')->get();
        return view('luaran_lain_ppkm_dosen.create', compact('luaranLainPpkm', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LuaranLainPPKMDosen::create([
            'id' => $request->id,
            'id_dosen' => $request->id_dosen,
            'id_luaran_lain_ppkm' => $request->id_luaran_lain_ppkm,
        ]);
        return redirect('luaran-lain-ppkm-dosen')->with('success', 'Data berhasil disimpan');
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
        $luaranPpkmDosen = LuaranLainPPKMDosen::with('luaranLainPpkm', 'dosens')->find($id);
        $dosens = Dosen::with('pegawai')->get();
        $luaranLainPpkm = LuaranLainPPKM::all();
        return view('luaran_lain_ppkm_dosen.edit', compact('luaranPpkmDosen', 'dosens', 'luaranLainPpkm'));
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
        $ppkm = LuaranLainPPKMDosen::find($id);
        $update = $ppkm->update([
            'id_dosen' => $request->id_dosen,
            'id_luaran_lain_ppkm' => $request->id_luaran_lain_ppkm,

        ]);
        return redirect('luaran-lain-ppkm-dosen')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppkm = LuaranLainPPKMDosen::findOrFail($id);
        $ppkm->delete();
        return redirect('luaran-lain-ppkm-dosen')->with('success', 'Data HKI Dosen berhasil dihapus');
    }
}
