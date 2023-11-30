<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Pegawai;
=======
use App\Models\Pegawai;
use Illuminate\Http\Request;
>>>>>>> origin/prefered_dev

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
<<<<<<< HEAD
        
        return view('admin.page.pegawai.index', compact('data'));
=======
        return view('admin.pegawai.index', compact('data'));
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
        return view(
            'admin.page.pegawai.form',
            [
                'url' => 'simpan-pegawai',
            ]
        );
=======
        return view('admin.pegawai.create');
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
        $input = Pegawai::insert([
            'pk_id_pegawai' => $request->pk_id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nip' => $request->nip,
            'aktif' => $request->aktif,
        ]);

        if ($input) {
<<<<<<< HEAD
            return redirect('pegawai')->with('pesan', 'Data berhasil disimpan');
=======
            return redirect('pegawai')->with('success', 'Data berhasil disimpan');
>>>>>>> origin/prefered_dev
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.pegawai.index';
            </script>";
        }
    }

    /**
<<<<<<< HEAD
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
=======
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Pegawai::find($id);
        return view('admin.pegawai.edit', $data);
>>>>>>> origin/prefered_dev
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  int  $pk_id_pegawai
=======
     * @param  \App\Models\Pegawai  $pegawai
>>>>>>> origin/prefered_dev
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
<<<<<<< HEAD
     * @param  int  $id
=======
     * @param  \App\Models\Pegawai  $pegawai
>>>>>>> origin/prefered_dev
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();

<<<<<<< HEAD
        return redirect()->route('pegawai')->with('success', 'Data Pegawai berhasil dihapus');
=======
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil dihapus');
>>>>>>> origin/prefered_dev
    }
}
