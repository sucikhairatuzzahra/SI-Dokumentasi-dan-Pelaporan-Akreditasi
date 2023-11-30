<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDariDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Models\PTUnit;
use App\Models\Luaran;
use App\Models\LuaranLain;
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> origin/prefered_dev

class PPKMDariDTPRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();

        $data = PPKMDariDTPR::selectRaw('nama_dtpr')
            ->selectRaw('COUNT(judul) as jumlah_publikasi_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" THEN 1 END) as jumlah_penelitian_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_penelitian_infokom_hki')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" THEN 1 END) as jumlah_pkm_diadopsi_masyarakat')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_pkm_hki')
            ->selectRaw('id_pt_unit')
            ->selectRaw('kode_pt_unit')
            ->groupBy('nama_dtpr', 'id_pt_unit')
            ->get();
        return view('jurusan.page.ppkm_dtpr.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();
=======
        if (Gate::allows('isJurusan')) {
            $data = PPKMDariDTPR::with('ptUnit');
            $data = $data->paginate('20');
            return view('ppkm_dtpr.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = PPKMDariDTPR::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('ppkm_dtpr.index', compact('data'));
        }
    }
>>>>>>> origin/prefered_dev

        $data = PPKMDariDTPR::selectRaw('nama_dtpr')
            ->selectRaw('COUNT(judul) as jumlah_publikasi_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" THEN 1 END) as jumlah_penelitian_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_penelitian_infokom_hki')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" THEN 1 END) as jumlah_pkm_diadopsi_masyarakat')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_pkm_hki')
            ->selectRaw('id_pt_unit')
            ->selectRaw('kode_pt_unit')
            ->groupBy('nama_dtpr', 'id_pt_unit')
            ->get();

        return view('kaprodi.page.ppkm_dtpr.index', compact('data'));
    }
    public function admprodiIndex()
    {
        // $data = PPKMDariDTPR::all();
        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();

        $data = PPKMDariDTPR::selectRaw('nama_dtpr')
            ->selectRaw('COUNT(judul) as jumlah_publikasi_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" THEN 1 END) as jumlah_penelitian_infokom')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "penelitian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_penelitian_infokom_hki')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" THEN 1 END) as jumlah_pkm_diadopsi_masyarakat')
            ->selectRaw('COUNT(CASE WHEN jenis_penelitian_pengabdian = "pengabdian" AND jenis_luaran_lain IN (1, 2) THEN 1 END) as jumlah_pkm_hki')
            ->selectRaw('id_pt_unit')
            ->selectRaw('kode_pt_unit')
            ->groupBy('nama_dtpr', 'id_pt_unit')
            ->get();

        // dd($data);
        return view('admprodi.page.ppkm_dtpr.index', compact('data'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();
        return view(
            'admprodi.page.ppkm_dtpr.form',
            [
                'url' => 'simpan-ppkm_dtpr',
                'luarans' =>  $luarans,
                'luaranlains' =>  $luaranlains,
            ]
        );
=======
        $ptUnit = Auth::user()->ptUnit;
        return view('ppkm_dtpr.create', compact('ptUnit'));
>>>>>>> origin/prefered_dev
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $user = Auth::user();
        $input = PPKMDariDTPR::insert([
            'id' => $request->id,
            'nama_dtpr' => $request->nama_dtpr,
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

        ]);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/bukti_dtpr', $filename);

            $input->bukti = $filename;
            $input->save();
        }

        if ($input) {
            return redirect('ppkm_dtpr')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.ppkm_dtpr.index';
            </script>";
        }
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
=======
        PPKMDariDTPR::insert([
            'id' => $request->id,
            'nama_dtpr' => $request->nama_dtpr,
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
            'pt_unit' => $request->kode_pt_unit,

        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
>>>>>>> origin/prefered_dev
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $luarans = Luaran::all();
        $luaranlains = LuaranLain::all();
        
        $data['editData'] = PPKMDariDTPR::find($id);
<<<<<<< HEAD
        return view('admprodi.page.ppkm_dtpr.form_edit', $data, compact('luarans','luaranlains'));
=======
        return view('ppkm_dtpr.edit', $data);
>>>>>>> origin/prefered_dev
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
        $user = Auth::user();
        $ppkm = PPKMDariDTPR::find($id);
        $ppkm->update([
            'nama_dtpr' => $request->nama_dtpr,
<<<<<<< HEAD
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

        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/bukti_dtpr', $filename);

            $update->bukti = $filename;
            $update->save();
        }

        if ($update) {
            return redirect('ppkm_dtpr')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.ppkm_dtpr.index';
                </script>";
        }
=======
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('ppkm-dtpr')->with('success', 'Data berhasil disimpan');
>>>>>>> origin/prefered_dev
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

    public function byPtUnit($ptunitid)
    {
        $where = [
            'id_pt_unit' => $ptunitid, // D4 TRPL
        ];
        $data = PPKMDariDTPR::where($where)->get();
        // dd($data);
        return view('admprodi.page.ppkm_dtpr.byidunit', compact('data'));
    }
}
