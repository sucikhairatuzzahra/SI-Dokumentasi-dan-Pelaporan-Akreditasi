<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TahunAkademik::paginate('20');
        
        return view('admin.page.tahun_akademik.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admprodi.page.tahun_akademik.form',
            [
                'url' => 'simpan-tahun-akademik',
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
        $input = TahunAkademik::insert([
            'id' => $request->id,
            'tahun_akademik' => $request->tahun_akademik,
        ]);

        if ($input) {
            return redirect('tahun-akademik')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.tahun_akademik.index';
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
        $dana = TahunAkademik::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $dana->delete();

        return redirect()->route('tahun-akademik')->with('success', 'Data tahun akademik berhasil dihapus');
    }
}
