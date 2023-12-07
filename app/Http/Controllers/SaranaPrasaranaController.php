<?php

namespace App\Http\Controllers;

use App\Exports\SaranaPrasaranaExport;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use App\Models\PTUnit;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = SaranaPrasarana::all();
        // $data = $data->paginate(20);
        return view('sarana_prasarana.index', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $ptUnit = Auth::user()->ptUnit;
        return view('sarana_prasarana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SaranaPrasarana::insert([
            'id' => $request->id,
            'sarana' => $request->sarana,
            'daya_tampung' => $request->daya_tampung,
            'luas_ruang' => $request->luas_ruang,
            'jml_mhs' => $request->jml_mhs,
            'jam_lyn' => $request->jam_lyn,
            'perangkat' => $request->perangkat,
            // 'id_pt_unit' => $request->id_pt_unit,

        ]);
        return redirect('sarana')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = SaranaPrasarana::find($id);
        return view('sarana_prasarana.edit', $data);
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
        $sarana = SaranaPrasarana::find($id);
        $sarana->update([
            'sarana' => $request->sarana,
            'daya_tampung' => $request->daya_tampung,
            'luas_ruang' => $request->luas_ruang,
            'jml_mhs' => $request->jml_mhs,
            'jam_lyn' => $request->jam_lyn,
            'perangkat' => $request->perangkat,
            // 'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('sarana')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sarana = SaranaPrasarana::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $sarana->delete();
        return redirect()->route('sarana')->with('success', 'Data Sarana dan Prasarana berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new SaranaPrasaranaExport, 'Sarana Prasarana.xlsx');
    }
}
