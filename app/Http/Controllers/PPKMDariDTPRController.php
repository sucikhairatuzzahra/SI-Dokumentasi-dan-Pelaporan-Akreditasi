<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDariDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

use App\Models\PPKM;
use App\Models\PTUnit;
use App\Models\Luaran;
use App\Models\Dosen;
use App\Models\LuaranLain;

use Illuminate\Support\Facades\Gate;


class PPKMDariDTPRController extends Controller
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
            $data = PPKMDariDTPR::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);

            return view('ppkm_dtpr.index', compact('data', 'request'));

            // $data = PPKMDariDTPR::with('ptUnit');
            // $data = $data->paginate('20');
            // return view('ppkm_dtpr.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = PPKMDariDTPR::with('ptUnit','ppkm','dosens')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
            $data = $data->all();

            return view('ppkm_dtpr.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $luarans = Luaran::all();
        // $luaranlains = LuaranLain::all();
        $dosens = Dosen::all();
        $ppkm = PPKM::all();
        $ptUnit = Auth::user()->ptUnit;
        return view('ppkm_dtpr.create', compact('ptUnit','ppkm','dosens'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        PPKMDariDTPR::insert([
            'id' => $request->id,
            'id_dosen' => $request->id_dosen,
            'id_ppkm' => $request->id_ppkm,
            'ketua' => $request->ketua,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = PPKMDariDTPR::find($id);
        return view('ppkm_dtpr.edit', $data);
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
        $ppkm = PPKMDariDTPR::find($id);
        $update = $ppkm->update([
            'id_dosen' => $request->id_dosen,
            'id_ppkm' => $request->id_ppkm,
            'ketua' => $request->ketua,
            'id_pt_unit' => $request->id_pt_unit,
          
        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppkmdtpr = PPKMDariDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ppkmdtpr->delete();
        return redirect()->route('ppkm-dtpr')->with('success', 'Data PPKM berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new PPKMDTPRExport, 'PPKM Dari DTPR.xlsx');
    }
}
