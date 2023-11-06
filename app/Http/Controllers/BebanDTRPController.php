<?php

namespace App\Http\Controllers;

use App\Exports\BebanDTPRExport;
use App\Models\BebanDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BebanDTRPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BebanDTPR::paginate('20');
        // dd($data);
        return view('admin.page.beban_dtpr.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = BebanDTPR::paginate('20');

        return view('kaprodi.page.beban_dtpr.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.beban_dtpr.form',
            [
                'url' => 'simpan-bebandtpr',
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
        $input = BebanDTPR::insert([
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
        if ($input) {
            return redirect('bebandtpr')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.beban_dtpr.index';
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
        $data['editData'] = BebanDTPR::find($id);
        return view('admin.page.beban_dtpr.form_edit', $data);
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
        $update = $dtpr->update([
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
        if ($update) {
            return redirect('bebandtpr')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.bidang_kerja_lulusan.index';
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
        $bebandtpr = BebanDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $bebandtpr->delete();
        return redirect()->route('bebandtpr')->with('success', 'Data Rata-Rata Beban DTPR Per Semester berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new BebanDTPRExport, 'Beban DTPR.xlsx');
    }
}
