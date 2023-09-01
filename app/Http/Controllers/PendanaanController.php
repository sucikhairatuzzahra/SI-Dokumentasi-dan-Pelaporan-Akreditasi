<?php

namespace App\Http\Controllers;

use App\Models\Pendanaan;
use Illuminate\Http\Request;

class PendanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendanaan::paginate('20');
        // dd($data);
        return view('admin.page.pendanaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.pendanaan.form',
            [
                'url' => 'simpan-pendanaan',
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
        $input = Pendanaan::insert([
            'id' => $request->id,
            'sumber_dana' => $request->sumber_dana,
            'jumlah' => $request->jumlah,
            'bukti' => $request->bukti,
            'keterangan' => $request->keterangan,
        ]);

        if ($input) {
            return redirect('pendanaan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.pendanaan.index';
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
        $dana = Pendanaan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $dana->delete();

        return redirect()->route('pendanaan')->with('success', 'Data Pendanaan berhasil dihapus');
    }
}
