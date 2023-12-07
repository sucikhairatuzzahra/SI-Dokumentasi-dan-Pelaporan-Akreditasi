<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PTUnit;
use App\Models\PPKM;
use App\Models\LuaranPPKM;
use App\Models\JenisLuaran;
use Illuminate\Support\Facades\Gate;

class LuaranPPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LuaranPPKM::with('jenisLuaran', 'ppkm');
        $data = $data->paginate(20);
        return view('luaran_ppkm.index', compact('data'));
        
        // if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
        //     $data = LuaranPPKM::with('jenisLuaran', 'ppkm');
        //     $data = $data->paginate(20);
        //     return view('luaran_ppkm.index', compact('data'));
        // }
        // return redirect()->route('home.route')->with('message', 'Anda tidak diizinkan menggunakan fitur ini!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisLuarans = JenisLuaran::all();
        $ppkm = PPKM::all();
        // $ptUnit = Auth::user()->ptUnit;
        return view('luaran_ppkm.create', compact('jenisLuarans', 'ppkm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LuaranPPKM::insert([
            'id' => $request->id,
            'tahun' => $request->tahun,
            'id_ppkm' => $request->id_ppkm,
            'id_jenis_luaran' => $request->jenis_luaran,
            'judul_luaran_ppkm' => $request->judul_luaran_ppkm,
            'jumlah_sitasi' => $request->jumlah_sitasi,

        ]);
        return redirect('luaran-ppkm')->with('success', 'Data berhasil disimpan');
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
        $jenisLuarans = JenisLuaran::all();
        $ppkm = PPKM::all();
        $data['editData'] = LuaranPPKM::find($id);
        return view('luaran_ppkm.edit', $data, compact('jenisLuarans', 'ppkm'));
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
        $luaranppkm = LuaranPPKM::find($id);
        $luaranppkm->update([
            'tahun' => $request->tahun,
            'id_ppkm' => $request->id_ppkm,
            'id_jenis_luaran' => $request->jenis_luaran,
            'judul_luaran_ppkm' => $request->judul_luaran_ppkm,
            'jumlah_sitasi' => $request->jumlah_sitasi,
        ]);
        return redirect(route('luaran-ppkm.index'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luaranppkm = LuaranPPKM::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $luaranppkm->delete();

        return redirect(route('luaran-ppkm.index'))->with('success', 'Data PPKM berhasil dihapus');
    }
}
