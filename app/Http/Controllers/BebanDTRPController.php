<?php

namespace App\Http\Controllers;

use App\Exports\BebanDTPRExport;
use App\Models\BebanDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Dosen;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BebanDTRPController extends Controller
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
            $data = BebanDTPR::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);

            return view('beban_dtpr.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi')) {
            $data = BebanDTPR::with('ptUnit');
            $data = $data->paginate(20);
            return view('beban_dtpr.index', compact('data'));
        }

        if (Gate::allows('isKaprodi')) {
            $data = BebanDTPR::with('ptUnit');
            $data = $data->paginate(20);
            return view('beban_dtpr.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
// <<<<<<< HEAD
        // $dosens = Dosen::all();
//         return view(
//             'admprodi.page.beban_dtpr.form',
//             [
//                 'url' => 'simpan-bebandtpr',
//                 'dosens' => $dosens,
//             ]
//         );
// // =======
        $ptUnit = Auth::user()->ptUnit;
        $dosens = Dosen::all();
        return view('beban_dtpr.create', compact('ptUnit','dosens'));
// >>>>>>> 4dface9ac6ed703672574384b923776abfacf6f8
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BebanDTPR::create([
            'id' => $request->id,
            'nama_dosen' => $request->nama_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('beban-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = BebanDTPR::find($id);
        return view('beban_dtpr.edit', $data);
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
        // $user = Auth::user();

        $dtpr = BebanDTPR::find($id);
        $dtpr->update([
            'nama_dosen' => $request->nama_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            'pt_unit' => $request->kode_pt_unit,
        ]);

        return redirect('bebandtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bebandtpr = BebanDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $bebandtpr->delete();
        return redirect()->route('bebandtpr')->with('success', 'Data Rata-Rata Beban DTPR Per Semester berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new BebanDTPRExport, 'Beban DTPR.xlsx');
    }
}
