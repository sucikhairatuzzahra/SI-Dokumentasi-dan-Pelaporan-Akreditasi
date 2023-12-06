<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAkademik;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TahunAkademik::all();

        return view('admin.tahun_akademik.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahun_akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = TahunAkademik::insert([
            'id' => $request->id,
            'tahun_akademik' => $request->tahun_akademik,
            'tahun' => $request->tahun,
        ]);

        if ($input) {
            return redirect('admin/ta')->with('success', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.tahun_akademik.index';
            </script>";
        }
    }
    public function edit($id)
    {
        $data['editData'] = TahunAkademik::find($id);
        return view('admin.tahun_akademik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ta = TahunAkademik::find($id);
        $update = $ta->update([
            'tahun_akademik' => $request->tahun_akademik,
            'tahun' => $request->tahun,

        ]);
    
        if ($update) {
            return redirect('admin/ta')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.tahun_akademik.index';
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
        $dana = TahunAkademik::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $dana->delete();

        return redirect()->route('tahun-akademik.index')->with('success', 'Data tahun akademik berhasil dihapus');
    }
}
