<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Pegawai;
use App\Models\KategoriDosen;
use App\Models\PTUnit;
use App\Models\LevelPendidikanTertinggi;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Dosen::all();
<<<<<<< HEAD
        
        return view('admin.page.dosen.index', compact('data'));
=======
        return view('admin.dosen.index', compact('data'));
>>>>>>> origin/prefered_dev
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $idPegawais = Pegawai::all();
        $idKatDosens = KategoriDosen::all();
        $idPtUnits = PTUnit::all();
        $idLevelPddkns = LevelPendidikanTertinggi::all();
        return view(
            'admin.page.dosen.form',
            [
                'url' => 'simpan-dosen',
                'idPegawais' => $idPegawais,
                'idKatDosens' => $idKatDosens,
                'idPtUnits' => $idPtUnits,
                'idLevelPddkns' => $idLevelPddkns,
            ]
        );
=======
        return view('admin.dosen.create');
>>>>>>> origin/prefered_dev
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
<<<<<<< HEAD
            'id_level_pendidikan_tertinggi' => $request->nama_level_pendidikan,
=======
>>>>>>> origin/prefered_dev
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,  
            'jabatan_akademik' => $request->jabatan_akademik,
<<<<<<< HEAD
            'id_pegawai' => $request->nip,
            'id_pt_unit' => $request->kode_pt_unit,
            'id_kategori_dosen' => $request->kode_kategori_dosen,
=======
            'sertifikat_pendidik_profesional' => $request->sertifikat_pendidik_profesional,
            'sertifikat_kompetensi_profesi_industri' => $request->sertifikat_kompetensi_profesi_industri,
>>>>>>> origin/prefered_dev
        ]);

        if ($input) {
            return redirect('dosen')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.dosen.index';
            </script>";
<<<<<<< HEAD
        }
=======
        } 
>>>>>>> origin/prefered_dev
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['editData'] = Dosen::find($id);
        return view('admin.dosen.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Dosen::find($id);
<<<<<<< HEAD
        return view('admin.page.dosen.form_edit', $data);
=======
        return view('admin.dosen.edit', $data);
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
        $dosen = Dosen::find($id);
        $update = $dosen->update([
            'nama_dosen' => $request->nama_dosen,
            'nomor_induk_dosen' => $request->nomor_induk_dosen,
            'jenis_nomor_induk_dosen' => $request->jenis_nomor_induk_dosen,
            'id_level_pendidikan_tertinggi' => $request->id_level_pendidikan_tertinggi,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,  
            'jabatan_akademik' => $request->jabatan_akademik,
            'id_pegawai' => $request->id_pegawai,
            'id_pt_unit' => $request->id_pt_unit,
            'id_kategori_dosen' => $request->id_kategori_dosen,
        ]);
        if ($update) {
            return redirect('dosen')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.dosen.index';
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
        $data = Dosen::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();
<<<<<<< HEAD

        return redirect()->route('dosen')->with('success', 'Dosen berhasil dihapus');
=======
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
>>>>>>> origin/prefered_dev
    }
}
