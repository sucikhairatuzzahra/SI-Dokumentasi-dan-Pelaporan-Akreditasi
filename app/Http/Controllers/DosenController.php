<?php

namespace App\Http\Controllers;

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
            'id_level_pendidikan_tertinggi' => $request->nama_level_pendidikan,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,  
            'jabatan_akademik' => $request->jabatan_akademik,
            'id_pegawai' => $request->nip,
            'id_pt_unit' => $request->kode_pt_unit,
            'id_kategori_dosen' => $request->kode_kategori_dosen,
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
        $data['editData'] = Dosen::find($id);
        $idPegawais = Pegawai::all();
        $idKatDosens = KategoriDosen::all();
        $idPtUnits = PTUnit::all();
        $idLevelPddkns = LevelPendidikanTertinggi::all();
     
        return view('admin.page.dosen.form_edit', $data, compact('idPegawais','idKatDosens','idPtUnits','idLevelPddkns'));
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
            'id_level_pendidikan_tertinggi' => $request->nama_level_pendidikan,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,  
            'jabatan_akademik' => $request->jabatan_akademik,
            'id_pegawai' => $request->nip,
            'id_pt_unit' => $request->kode_pt_unit,
            'id_kategori_dosen' => $request->kode_kategori_dosen,
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

        return redirect()->route('dosen')->with('success', 'Dosen berhasil dihapus');
    }
}
