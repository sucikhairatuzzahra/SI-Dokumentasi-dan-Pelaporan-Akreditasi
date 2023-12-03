<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PTUnit;
use App\Models\PPKM;
use App\Models\JenisSumberPembiayaan;
use Illuminate\Support\Facades\Gate; 

class PPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (Gate::allows('isJurusan')) {
        //     // $ptUnit = PTUnit::all();
        //     $data = IPKLulusan::orderBy('id', 'desc')
        //         ->with('ptUnit')
        //         ->when($request->id_pt_unit, function ($query) use ($request) {
        //             $query->where('id_pt_unit', $request->id_pt_unit);
        //         })->paginate(20);
        //     return view('ppkm.index', compact('data', 'request'));
        // }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = PPKM::with('pembiayaan');
            $data = $data->paginate(20);
            return view('ppkm.index', compact('data'));
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
            'jenis_penelitian_pengabdian' => $request->jenis_penelitian_pengabdian,
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
        $mhsbaru = PPKM::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $mhsbaru->delete();

        return redirect(route('ppkm.index'))->with('success', 'Data PPKM berhasil dihapus');
    }
}
