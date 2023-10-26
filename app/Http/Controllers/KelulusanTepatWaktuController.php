<?php

namespace App\Http\Controllers;

use App\Models\KelulusanTepatWaktu;
use Illuminate\Http\Request;

class KelulusanTepatWaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KelulusanTepatWaktu::paginate('20');

        // dd($data);
        return view('admin.page.kelulusan_tepat_waktu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.kelulusan_tepat_waktu.form',
            [
                'url' => 'simpan-kelulusan_tepatwaktu',
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
        $input = KelulusanTepatWaktu::insert([
            'id' => $request->id,
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $request->id_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'tahun' => $request->tahun,
            'jml_lulusan' => $request->jml_lulusan,
            'masa_studi' => $request->masa_studi,
            'jml_mhs_aktif' => $request->jml_mhs_aktif,

        ]);
        if ($input) {
            return redirect('kelulusan_tepatwaktu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.kelulusan_tepat_waktu.index';
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
        $data['editData'] = KelulusanTepatWaktu::find($id);
        return view('admin.page.kelulusan_tepat_waktu.form_edit', $data);
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
        $kelulusan = KelulusanTepatWaktu::find($id);
        $update = $kelulusan->update([
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $request->id_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'jml_lulusan' => $request->jml_lulusan,
            'masa_studi' => $request->masa_studi,
            'jml_mhs_aktif' => $request->jml_mhs_aktif,
        ]);
        if ($update) {
            return redirect('kelulusan_tepatwaktu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.kelulusan_tepat_waktu.index';
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
        $kelulusan = KelulusanTepatWaktu::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kelulusan->delete();
        return redirect()->route('kelulusan_tepatwaktu')->with('success', 'Data Kelulusan Tepat Waktu Berhasil Dihapus');
    }
}
