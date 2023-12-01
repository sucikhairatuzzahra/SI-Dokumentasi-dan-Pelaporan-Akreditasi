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

class PPKMDariDTPRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $input = PPKMDariDTPR::insert([
            'id' => $request->id,
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
        return view('admprodi.page.ppkm_dtpr.form_edit', $data, compact('luarans','luaranlains'));
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
        return redirect()->route('ppkm_dtpr')->with('success', 'Data PPKM berhasil dihapus');
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
