<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::all();
        
        return view('admin.page.dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.dosen.form',
            [
                'url' => 'simpan-dosen',
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
        $input = Dosen::insert([
            'id' => $request->id,
            'nama_dosen' => $request->nama_dosen,
            'nomor_induk_dosen' => $request->nomor_induk_dosen,
            'jenis_nomor_induk_dosen' => $request->jenis_nomor_induk_dosen,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,  
            'jabatan_akademik' => $request->jabatan_akademik,
            'sertifikat_pendidik_profesional' => $request->sertifikat_pendidik_profesional,
            'sertifikat_kompetensi_profesi_industri' => $request->sertifikat_kompetensi_profesi_industri,
        ]);

        if ($input) {
            return redirect('dosen')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.dosen.index';
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dosen::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return redirect()->route('dosen')->with('success', 'Dosen berhasil dihapus');
    }
}
