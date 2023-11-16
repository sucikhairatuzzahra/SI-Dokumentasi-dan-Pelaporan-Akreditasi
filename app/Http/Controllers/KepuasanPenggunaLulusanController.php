<?php

namespace App\Http\Controllers;

use App\Exports\KepuasanPenggunaLulusanExport;
use App\Models\KepuasanPenggunaLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;

class KepuasanPenggunaLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KepuasanPenggunaLulusan::paginate('20');
        // dd($data);
        return view('admin.page.kepuasan_pengguna_lulusan.index', compact('data'));

        // $program = DB::table('tb_program')->get();
        // return view(
        //     'admin/page/program/index',
        //     [
        //         'program' => $program
        //     ]
        // );
    }
    public function admprodiIndex()
    {
        $data = KepuasanPenggunaLulusan::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
        // dd($data);
        return view('admprodi.page.kepuasan_pengguna_lulusan.index', compact('data','ptUnits'));
    }
    public function kaprodiIndex()
    {
        $data = KepuasanPenggunaLulusan::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();

        return view('kaprodi.page.kepuasan_pengguna_lulusan.index', compact('data','ptUnits'));
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
            'admprodi.page.kepuasan_pengguna_lulusan.form',
            [
                'url' => 'simpan-kepuasan_pengguna',
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
        $input = KepuasanPenggunaLulusan::insert([
            'id' => $request->id,
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        if ($input) {
            return redirect('kepuasan_pengguna')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.kepuasan_pengguna_lulusan.index';
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
        $data['editData'] = KepuasanPenggunaLulusan::find($id);
        return view('admin.page.kepuasan_pengguna_lulusan.form_edit', $data);
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
        $kepuasan = KepuasanPenggunaLulusan::find($id);
        $update = $kepuasan->update([
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        if ($update) {
            return redirect('kepuasan_pengguna')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.kepuasan_pengguna_lulusan.index';
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
        $kepuasan = KepuasanPenggunaLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kepuasan->delete();
        return redirect()->route('kepuasan_pengguna')->with('success', 'Data Kepuasan Pengguna Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new KepuasanPenggunaLulusanExport, 'Kepuasan Pengguna Lulusan.xlsx');
    }
}
