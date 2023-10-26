<?php

namespace App\Http\Controllers;

use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TenagaKependidikan::paginate('20');

        // dd($data);
        return view('admin.page.kependidikan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.kependidikan.form',
            [
                'url' => 'simpan-kependidikan',
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
        $input = TenagaKependidikan::insert([
            'id' => $request->id,
            'jenis_tng_kpddkn' => $request->jenis_tng_kpddkn,
            // 'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
        ]);
        if ($input) {
            return redirect('kependidikan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.kependidikan.index';
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
        $data['editData'] = TenagaKependidikan::find($id);
        return view('admin.page.kependidikan.form_edit', $data);
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
        $kpddkn = TenagaKependidikan::find($id);
        $update = $kpddkn->update([
            'jenis_tng_kpddkn' => $request->jenis_tng_kpddkn,
            // 'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,

        ]);
        if ($update) {
            return redirect('kependidikan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.kependidikan.index';
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
        $kpddkn = TenagaKependidikan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kpddkn->delete();
        return redirect()->route('sarana')->with('success', 'Data Kualifikasi Tenaga Kependidikan berhasil dihapus');
    }
}
