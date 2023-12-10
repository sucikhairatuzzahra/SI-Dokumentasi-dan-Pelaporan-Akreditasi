<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PTUnit;

class PTUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PTUnit::all();

        return view('admin.ptunit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ptunit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = PTUnit::insert([
            'id' => $request->id,
            'kode_pt_unit' => $request->kode_pt_unit,
            'nama_pt_unit' => $request->nama_pt_unit,
        ]);

        if ($input) {
            return redirect('ptunit')->with('success', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.ptunit.index';
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
        $data = PTUnit::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return redirect('ptunit')->with('success', 'Data PT Unit berhasil dihapus');
    }
}
