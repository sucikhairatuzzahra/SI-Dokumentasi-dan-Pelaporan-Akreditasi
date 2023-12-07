<?php

namespace App\Http\Controllers;

use App\Exports\BebanDTPRExport;
use App\Models\BebanDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Dosen;
use App\Models\Pegawai;
use App\Models\TahunAkademik;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;


class BebanDTRPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (Gate::allows('isJurusan')) {
        //     $ptUnit = PTUnit::all();
        //     $data = BebanDTPR::orderBy('id', 'desc')
        //         ->with('dosens','tahunAkademik')
        //         ->when($request->id_pt_unit, function ($query) use ($request) {
        //             $query->where('id_pt_unit', $request->id_pt_unit);
        //         })->paginate(20);
        //      $nama_dosen = [];
        //     foreach ($data as $value) {
        //         $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
        //         $nama_dosen[] = $pegawai['nama_pegawai'];
        //     }
        //     Log::debug($nama_dosen);
        //     return view('beban_dtpr.index', compact('data', 'nama_dosen','request'));
       
        // }

       
            $data = BebanDTPR::with('dosens','tahunAkademik')->get();
            $nama_dosen = [];
            foreach ($data as $value) {
                $pegawai = Pegawai::where('id', $value->dosens->id_pegawai)->first();
                $nama_dosen[] = $pegawai['nama_pegawai'];
            }
            Log::debug($nama_dosen);
            return view('beban_dtpr.index', compact('data', 'nama_dosen'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $tahunAkademiks = TahunAkademik::all();
        // $ptUnit = Auth::user()->ptUnit;
        $dosens = Dosen::with('pegawai')->get();
        return view('beban_dtpr.create', compact('dosens','tahunAkademiks'));

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
            'id_thn_akademik' => $request->thn_akademik,
            'id_dosen' => $request->id_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            // 'id_pt_unit' => $request->id_pt_unit,
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
        // $ptUnit = Auth::user()->ptUnit;
        $tahunAkademiks = TahunAkademik::all();
        $dosens = Dosen::with('pegawai')->get();
        return view('beban_dtpr.edit', $data, compact('dosens','tahunAkademiks'));
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

        $dtpr = BebanDTPR::find($id);
        $dtpr->update([
            'id_thn_akademik' => $request->thn_akademik,
            'id_dosen' => $request->id_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            // 'id_pt_unit' => $request->id_pt_unit,
        ]);

        return redirect('beban-dtpr')->with('success', 'Data berhasil disimpan');
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
        return redirect()->route('beban-dtpr')->with('success', 'Data Rata-Rata Beban DTPR Per Semester berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new BebanDTPRExport, 'Beban DTPR.xlsx');
    }
}
