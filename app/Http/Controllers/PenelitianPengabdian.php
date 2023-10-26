<?php

namespace App\Http\Controllers;

use App\Models\PPKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenelitianPengabdian extends Controller
{

    public function ppkmadmin()
    {
        $data['admin'] = DB::table('ppkm')->orderBy('pk_id_ppkm', 'asc')->get(); //untuk mengambil semua data ditabel user

        return view('ppkm.index', compact('data'));
    }
    // public function ppkmadmin()
    // {
    //     $ppkm = DB::table('ppkm')->get();
    //     return view(
    //         'layoutadmin.index',
    //         [
    //             'ppkm' => $ppkm
    //         ]
    //     );

    // }
    public function create()
    {
        return view(
            'ppkm.formppkm',
            [
                'url' => 'simpan-ppkm',
            ]
        );
    }

    public function store(Request $request)
    {

        $input = DB::table('ppkm')->insert(
            [
                'pk_id_ppkm' => $request->idppkm,
                'tahun' => $request->tahun,
                'judul' => $request->judul,
                'jenis_penelitian_pengabdian' => $request->jenis_penelitian_pengabdian,
                'id_jenis_sumber_pembiayaan' => $request->id_jenis_sumber_pembiayaan,
                'sumber_pembiayaan' => $request->sumber_pembiayaan,
                'kerjasama' => $request->kerjasama,
                'id_kriteria' => $request->id_kriteria

            ]
        );
        session(['pk_id_ppkm' => $request->idppkm]);
        if ($input == true) {
            return redirect('ppkmadmin')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/formppkm';
            </script>";
        }
    }
    public function edit()
    {
        //
    }
    public function update()
    {
        //
    }
    public function destroy($pk_id_ppkm)
    {
        $ppkm = PPKM::findOrFail($pk_id_ppkm); // Ganti dengan model dan nama tabel yang sesuai
        $ppkm->delete();

        return redirect()->route('ppkmadmin')->with('success', 'Data PPKM berhasil dihapus');
    }
}
