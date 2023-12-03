<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pegawai;
use App\Models\KategoriDosen;
use App\Models\PTUnit;
use App\Models\LevelPendidikanTertinggi;
use App\Http\Controllers\Controller;
use App\Http\Requests\DosenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Dosen::with('pegawai', 'kategoriDosen', 'ptUnit', 'levelPddkn')->get();
        return view('admin.dosen.index', compact('data'));
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
        $ptUnit = Auth::user()->ptUnit;
        $idLevelPddkns = LevelPendidikanTertinggi::all();
        return view('admin.dosen.create', compact('idPegawais', 'idKatDosens', 'ptUnit', 'idLevelPddkns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenRequest $request)
    {
        Dosen::create([
            'nomor_induk_dosen' => $request->nomor_induk_dosen,
            'jenis_nomor_induk_dosen' => $request->jenis_nid,
            'id_level_pendidikan_tertinggi' => $request->level_pendidikan_tertinggi,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,
            'jabatan_akademik' => $request->jabatan_akademik,
            'id_pegawai' => $request->id_pegawai,
            'id_pt_unit' => $request->id_pt_unit,
            'id_kategori_dosen' => $request->kode_kategori_dosen,

            // 'sertifikat_pendidik_profesional' => $request->sertifikat_pendidik_profesional,
            // 'sertifikat_kompetensi_profesi_industri' => $request->sertifikat_kompetensi_profesi_industri,
        ]);

        return redirect(route('dosen.index'))->with('success', 'Data berhasil disimpan');
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
        $editData = Dosen::find($id);
        dd($editData);
        $idPegawais = Pegawai::all();
        $idKatDosens = KategoriDosen::all();
        $ptUnit = Auth::user()->ptUnit;
        $idLevelPddkns = LevelPendidikanTertinggi::all();
        return view('admin.dosen.edit', compact('editData', 'idPegawais', 'idKatDosens', 'ptUnit', 'idLevelPddkns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DosenRequest $request, $id)
    {
        Dosen::find($id)->update([
            'nomor_induk_dosen' => $request->nomor_induk_dosen,
            'jenis_nomor_induk_dosen' => $request->jenis_nid,
            'id_level_pendidikan_tertinggi' => $request->level_pendidikan_tertinggi,
            'pendidikan_magister' => $request->pendidikan_magister,
            'pendidikan_doktor' => $request->pendidikan_doktor,
            'bidang_keahlian' => $request->bidang_keahlian,
            'jabatan_akademik' => $request->jabatan_akademik,
            'id_pegawai' => $request->id_pegawai,
            'id_pt_unit' => $request->id_pt_unit,
            'id_kategori_dosen' => $request->kode_kategori_dosen,
        ]);
        return redirect(route('dosen.index'))->with('success', 'Data berhasil disimpan');
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
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}
