<?php

namespace App\Http\Controllers;

use App\Models\JumlahTenagaKependidikan;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;

class JumlahTenagaKependidikanController extends Controller
{
    //
    public function create($id)
    {
        $kependidikan = TenagaKependidikan::find($id)->first();
        // dd($kependidikan);
        return view(
            'admin.page.kependidikan.jumlah.form',
            [
                'url' => 'kependidikan/' . $id . '/simpan',
            ]
        );
    }
    public function store(Request $request)
    {
        $input = JumlahTenagaKependidikan::insert([
            'id' => $request->id,
            'sma' => $request->sma,
            'd1' => $request->d1,
            'd2' => $request->d2,
            'd3' => $request->d3,
            'd4' => $request->d4,
            's1' => $request->s1,
            's1' => $request->s2,
            's1' => $request->s3,
        ]);
        if ($input) {
            return redirect('kependidikan/{id}/tambah')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.kependidikan.jumlah.index';
            </script>";
        }
    }
    public function edit($id)
    {
        // $data['editData'] = JumlahTenagaKependidikan::find($id);
        // return view('admin.page.keoendidikan.jumlah.form_edit', $data);
    }
    public function update(Request $request, $id)
    {
        // $jumlah = JumlahTenagaKependidikan::find($id);
        // $update = $jumlah->update([
        //     'sma' => $request->sma,
        //     'd1' => $request->d1,
        //     'd2' => $request->d2,
        //     'd3' => $request->d3,
        //     'd4' => $request->d4,
        //     's1' => $request->s1,
        //     's1' => $request->s2,
        //     's1' => $request->s3,
        // ]);
        // if ($update) {
        //     return redirect('kependidikan/{id}/tambah')->with('pesan', 'Data berhasil disimpan');
        // } else {
        //     echo "<script>
        //         alert('Data gagal diinput, masukkan kembali data dengan benar');
        //         window.location = '/admin.page.kependidikan.jumlah.index';
        //         </script>";
        // }
    }
}
