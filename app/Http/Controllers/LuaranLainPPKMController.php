<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PTUnit;
use App\Models\PPKM;
use App\Models\LuaranLainPPKM;
use App\Models\JenisLuaranLain;
use Illuminate\Support\Facades\Gate;

class LuaranLainPPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LuaranLainPPKM::with('jenisLuaranLain','ppkm');
        $data = $data->paginate(20);
        return view('luaran_lain_ppkm.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisLuaranLains = JenisLuaranLain::all();
        $ppkm = PPKM::all();
        // $ptUnit = Auth::user()->ptUnit;
        return view('luaran_lain_ppkm.create', compact('jenisLuaranLains','ppkm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LuaranLainPPKM::insert([
            'id' => $request->id,
            'tahun' => $request->tahun,
            'id_ppkm' => $request->id_ppkm,
            'id_jenis_luaran_lain' => $request->jenis_luaran_lain,
            'judul_luaran_lain' => $request->judul_luaran_lain,
            'keterangan' => $request->keterangan,
            'jumlah_sitasi' => $request->jumlah_sitasi,
          
        ]);
        return redirect('luaran-lain-ppkm')->with('success', 'Data berhasil disimpan');
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
        $jenisLuaranLains = JenisLuaranLain::all();
        $ppkm = PPKM::all();
        $data['editData'] = LuaranLainPPKM::find($id);
        return view('luaran_lain_ppkm.edit', $data, compact('jenisLuaranLains','ppkm'));
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
        $luaranppkm = LuaranLainPPKM::find($id);
        $luaranppkm->update([
            'tahun' => $request->tahun,
            'id_ppkm' => $request->id_ppkm,
            'id_jenis_luaran_lain' => $request->jenis_luaran_lain,
            'judul_luaran_lain' => $request->judul_luaran_lain,
            'keterangan' => $request->keterangan,
            'jumlah_sitasi' => $request->jumlah_sitasi,
        ]);
        return redirect(route('luaran-lain-ppkm.index'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luaranppkm = LuaranLainPPKM::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $luaranppkm->delete();

        return redirect(route('luaran-lain-ppkm.index'))->with('success', 'Data PPKM berhasil dihapus');
    }
}
