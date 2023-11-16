<?php

namespace App\Http\Controllers;

use App\Exports\PPKMDTPRExport;
use App\Models\PPKMDariDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;

class PPKMDariDTPRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PPKMDariDTPR::paginate('20');
        // dd($data);
        return view('admin.page.ppkm_dtpr.index', compact('data'));
    }
    public function admprodiIndex()
    {
        $data = PPKMDariDTPR::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
        // dd($data);
        return view('admprodi.page.ppkm_dtpr.index', compact('data','ptUnits'));
    }
    public function kaprodiIndex()
    {
        $data = PPKMDariDTPR::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
        // dd($data);
        return view('kaprodi.page.ppkm_dtpr.index', compact('data','ptUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptUnits = PTUnit::all();
        return view(
            'admprodi.page.ppkm_dtpr.form',
            [
                'url' => 'simpan-kependidikan',
                'ptUnits' =>  $ptUnits,
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
        $input = PPKMDariDTPR::insert([
            'id' => $request->id,
            'nama_dtpr' => $request->nama_dtpr,
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
               'pt_unit' => $request->kode_pt_unit,

        ]);
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
        $data['editData'] = PPKMDariDTPR::find($id);
        return view('admprodi.page.ppkm_dtpr.form_edit', $data);
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
            'nama_dtpr' => $request->nama_dtpr,
            'publikasi_infokom' => $request->publikasi_infokom,
            'penelitian_infokom' => $request->penelitian_infokom,
            'penelitian_infokom_hki' => $request->penelitian_infokom_hki,
            'pkm_infokom_adobsi' => $request->pkm_infokom_adobsi,
            'pkm_infokom_hki' => $request->pkm_infokom_hki,
            'pt_unit' => $request->kode_pt_unit,
        ]);
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
}
