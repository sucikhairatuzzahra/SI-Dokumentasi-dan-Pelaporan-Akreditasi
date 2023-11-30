<?php

namespace App\Http\Controllers;

use App\Exports\KepuasanPenggunaLulusanExport;
use App\Models\KepuasanPenggunaLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Models\PTUnit;
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> origin/prefered_dev

class KepuasanPenggunaLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $data = KepuasanPenggunaLulusan::all();
        return view('jurusan.page.kepuasan_pengguna_lulusan.index', compact('data'));
=======
        if (Gate::allows('isJurusan')) {
            $data = KepuasanPenggunaLulusan::paginate('20');
            return view('kepuasan_pengguna_lulusan.index', compact('data'));
        }
>>>>>>> origin/prefered_dev

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = KepuasanPenggunaLulusan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('kepuasan_pengguna_lulusan.index', compact('data'));
        }
    }
<<<<<<< HEAD
    public function admprodiIndex()
    {
        $data = KepuasanPenggunaLulusan::all();
        return view('admprodi.page.kepuasan_pengguna_lulusan.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = KepuasanPenggunaLulusan::all();

        return view('kaprodi.page.kepuasan_pengguna_lulusan.index', compact('data'));
    }
=======

>>>>>>> origin/prefered_dev
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptUnit = Auth::user()->ptUnit;
        return view('kepuasan_pengguna_lulusan.create', compact('ptUnit'));
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
        $input = KepuasanPenggunaLulusan::insert([
=======
        KepuasanPenggunaLulusan::insert([
>>>>>>> origin/prefered_dev
            'id' => $request->id,
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
<<<<<<< HEAD
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
=======
            'id_pt_unit' => $request->id_pt_unit,
>>>>>>> origin/prefered_dev
        ]);

        return redirect('kepuasan_pengguna')->with('success', 'Data berhasil disimpan');
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
<<<<<<< HEAD
        return view('admprodi.page.kepuasan_pengguna_lulusan.form_edit', $data);
=======
        return view('kepuasan_pengguna_lulusan.edit', $data);
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
        $kepuasan = KepuasanPenggunaLulusan::find($id);
        $update = $kepuasan->update([
            'jenis_kemampuan' => $request->jenis_kemampuan,
            'sangat_baik' => $request->sangat_baik,
            'baik' => $request->baik,
            'cukup' => $request->cukup,
            'kurang' => $request->kurang,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
        ]);
<<<<<<< HEAD
        if ($update) {
            return redirect('kepuasan_pengguna')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.kepuasan_pengguna_lulusan.index';
                </script>";
        }
=======
        return redirect('kepuasan_pengguna')->with('success', 'Data berhasil disimpan');
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
        $kepuasan = KepuasanPenggunaLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kepuasan->delete();
        return redirect()->route('kepuasan_pengguna')->with('success', 'Data Kepuasan Pengguna Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new KepuasanPenggunaLulusanExport, 'Kepuasan Pengguna Lulusan.xlsx');
    }
}
