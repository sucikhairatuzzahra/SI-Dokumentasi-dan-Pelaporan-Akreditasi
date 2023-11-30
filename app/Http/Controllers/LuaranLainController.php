<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\LuaranLain;
=======
use App\Models\LuaranLain;
use Illuminate\Http\Request;
>>>>>>> origin/prefered_dev

class LuaranLainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LuaranLain::all();
<<<<<<< HEAD
        return view('admin.page.luaran_lain.index', compact('data'));
=======
        return view('admin.luaran_lain.index', compact('data'));
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
            'admin.page.luaran_lain.form',
            [
                'url' => 'simpan-luaranlain',
            ]
        );
=======
        return view('admin.luaran_lain.create');
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
        $input = LuaranLain::insert([
            'id' => $request->id,
            'jenis_luaran_lain' => $request->jenis_luaran_lain,
        ]);

        if ($input) {
            return redirect('luaranlain')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.luaran_lain.index';
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
=======
>>>>>>> origin/prefered_dev
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LuaranLain::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $data->delete();

        return redirect()->route('luaranlain')->with('success', 'Luaran Lain berhasil dihapus');
    }
}
