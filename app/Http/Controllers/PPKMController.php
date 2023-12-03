<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PTUnit;
use App\Models\JenisSumberPembiayaan;
use Illuminate\Support\Facades\Gate; 

class PPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembiayaan = JenisSumberPembiayaan::all();
        // $ptUnit = Auth::user()->ptUnit;
        return view('ppkm_dtpr.create', compact('dosens'));
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
            'id_jenis_sumber_pembiayaan' => $user->id_jenis_sumber_pembiayaan,
            'sumber_pembiayaan' => $request->sumber_pembiayaan,
            'jenis_penelitian_pengabdian' => $request->jenis_penelitian_pengabdian,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
