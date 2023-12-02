<?php

namespace App\Http\Controllers;

use App\Exports\SumberDanaExport;
use App\Models\Pendanaan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PendanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = Pendanaan::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('pendanaan.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = Pendanaan::with('idPtUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('pendanaan.index', compact('data'));
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
        return view('pendanaan.create', compact('ptUnit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pendanaan::create([
            'id' => $request->id,
            'sumber_dana' => $request->sumber_dana,
            'jumlah' => $request->jumlah,
            'bukti' => $request->bukti,
            'keterangan' => $request->keterangan,
            'id_pt_unit' => $request->id_pt_unit,

        ]);

        return redirect('pendanaan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Pendanaan::find($id);
        return view('pendanaan.edit', $data);
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
        $dana = Pendanaan::find($id);
        $update = $dana->update([
            'sumber_dana' => $request->sumber_dana,
            'jumlah' => $request->jumlah,
            'bukti' => $request->bukti,
            'keterangan' => $request->keterangan,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        return redirect('pendanaan')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dana = Pendanaan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $dana->delete();

        return redirect()->route('pendanaan')->with('success', 'Data Pendanaan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new SumberDanaExport, 'Sumber Dana Prodi.xlsx');
    }
}
