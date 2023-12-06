<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPKMPengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = PPKM::with('pembiayaan');
            $data = $data->paginate(20);
            return view('ppkm.pengabdian.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembiayaans = JenisSumberPembiayaan::all();
        // $ptUnit = Auth::user()->ptUnit;
        return view('ppkm.create', compact('pembiayaans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PPKM::insert([
            'id' => $request->id,
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'id_jenis_sumber_pembiayaan' => $request->jenis_sumber_pembiayaan,
            'sumber_pembiayaan' => $request->sumber_pembiayaan,
            'jenis_penelitian_pengabdian' => 'pengabdian',
        ]);
        return redirect('ppkm')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembiayaans = JenisSumberPembiayaan::all();
        $data['editData'] = PPKM::find($id);
        return view('ppkm.edit', $data, compact('pembiayaans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembiayaans = JenisSumberPembiayaan::all();
        $data['editData'] = PPKM::find($id);
        return view('ppkm.edit', $data, compact('pembiayaans'));
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
        $ppkm = PPKM::find($id);
        $ppkm->update([
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'id_jenis_sumber_pembiayaan' => $request->jenis_sumber_pembiayaan,
            'sumber_pembiayaan' => $request->sumber_pembiayaan,
            'jenis_penelitian_pengabdian' => 'pengabdian',
        ]);
        return redirect(route('ppkm.index'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppkm = PPKM::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ppkm->delete();

        return redirect(route('ppkm.index'))->with('success', 'Data PPKM berhasil dihapus');
    }
}
