<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDariDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

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
            $data = PPKMDariDTPR::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
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

        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();
        $dosens = Dosen::all();
        return view(
            'admprodi.page.ppkm_dtpr.form',
            [
                'url' => 'simpan-ppkm_dtpr',
                'luarans' =>  $luarans,
                'luaranlains' =>  $luaranlains,
                'dosens' => $dosens,
            ]
        );

        $ptUnit = Auth::user()->ptUnit;
        return view('ppkm_dtpr.create', compact('ptUnit'));

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
// <<<<<<< HEAD
            'nama_dtpr' => $request->nama_dosen,
            'jenis_penelitian_pengabdian' => $request->jenis_penelitian_pengabdian,
            'judul' => $request->judul,
            'ketua' => $request->ketua,
            'jenis_luaran' => $request->jenis_luaran,
            'jenis_luaran_lain' => $request->jenis_luaran_lain,
            'tahun' => $request->tahun,
            'dana' => $request->dana,
            'bukti' => $request->bukti,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
// =======
            // 'nama_dtpr' => $request->nama_dtpr,
            // 'publikasi_infokom' => $request->publikasi_infokom,
            // 'penelitian_infokom' => $request->penelitian_infokom,
            // 'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            // 'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            // 'pkm_infokom_hki' => $request->pkm_infokom_hki,
            // 'pt_unit' => $request->kode_pt_unit,


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
// <<<<<<< HEAD
        $update = $ppkm->update([
            'nama_dtpr' => $request->nama_dosen,
            'jenis_penelitian_pengabdian' => $request->jenis_penelitian_pengabdian,
            'judul' => $request->judul,
            'ketua' => $request->ketua,
            'jenis_luaran' => $request->jenis_luaran,
            'jenis_luaran_lain' => $request->jenis_luaran_lain,
            'tahun' => $request->tahun,
            'dana' => $request->dana,
            'bukti' => $request->bukti,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,

// =======
//         $ppkm->update([
//             'nama_dtpr' => $request->nama_dtpr,
//             'publikasi_infokom' => $request->publikasi_infokom,
//             'penelitian_infokom' => $request->penelitian_infokom,
//             'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
//             'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
//             'pkm_infokom_hki' => $request->pkm_infokom_hki,
//             'id_pt_unit' => $request->id_pt_unit,
// >>>>>>> 4dface9ac6ed703672574384b923776abfacf6f8
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
        $ppkm = PPKMDariDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ppkm->delete();
        return redirect()->route('ppkm-dtpr')->with('success', 'Data PPKM berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new PPKMDTPRExport, 'PPKM Dari DTPR.xlsx');
    }
}
