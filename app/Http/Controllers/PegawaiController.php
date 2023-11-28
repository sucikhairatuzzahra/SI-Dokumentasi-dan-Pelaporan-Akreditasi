<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::all();
        
        return view('admin.page.pegawai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.pegawai.form',
            [
                'url' => 'simpan-pegawai',
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
        $input = Pegawai::insert([
            'pk_id_pegawai' => $request->pk_id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nip' => $request->nip,
            'aktif' => $request->aktif,
        ]);

        if ($input) {
            return redirect('pegawai')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.pegawai.index';
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
    public function edit($pk_id_pegawai)
    {
        $data['editData'] = Pegawai::find($pk_id_pegawai);
        return view('admin.page.pegawai.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pk_id_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $update = $pegawai->update([
            'kode_pegawai' => $request->kode_pegawai,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nip' => $request->nip,
            'aktif' => $request->aktif,

        ]);
    
        if ($update) {
            return redirect('pegawai')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.pegawai.index';
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
        $data = Pegawai::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return redirect()->route('pegawai')->with('success', 'Data Pegawai berhasil dihapus');
    }
}
