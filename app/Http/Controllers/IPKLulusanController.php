<?php

namespace App\Http\Controllers;

use App\Exports\IPKLulusanExport;
use App\Models\IPKLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;

class IPKLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IPKLulusan::all();
        // dd($data);
<<<<<<< HEAD
        return view('jurusan.page.ipk_lulusan.index', compact('data'));
=======
        return view('ipk_lulusan.index', compact('data'));
>>>>>>> origin/prefered_dev
    }
    public function admprodiIndex()
    {
        $data = IPKLulusan::all();
<<<<<<< HEAD
    
        // dd($data);
        return view('admprodi.page.ipk_lulusan.index', compact('data'));
=======

        // dd($data);
        return view('ipk_lulusan.index', compact('data'));
>>>>>>> origin/prefered_dev
    }

    public function kaprodiIndex()
    {
        $data = IPKLulusan::all();

<<<<<<< HEAD
        return view('kaprodi.page.ipk_lulusan.index', compact('data'));
=======
        return view('ipk_lulusan.index', compact('data'));
>>>>>>> origin/prefered_dev
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
<<<<<<< HEAD
    { 
        return view(
            'admprodi.page.ipk_lulusan.form',
            [
                'url' => 'simpan-ipklulusan',
            ]
        );
=======
    {
        $ptUnit = Auth::user()->ptUnit;
        return view('ipk_lulusan.create', compact('ptUnit'));
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
        $user = Auth::user();
        $input = IPKLulusan::insert([
            'id' => $request->id,
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
        ]);
        if ($input) {
            return redirect('ipklulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.ipk_lulusan.index';
            </script>";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = IPKLulusan::find($id);
<<<<<<< HEAD
        return view('admprodi.page.ipk_lulusan.form_edit', $data);
=======
        return view('ipk_lulusan.edit', $data);
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
        $user = Auth::user();
        $ipk = IPKLulusan::find($id);
        $ipk->update([
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
<<<<<<< HEAD
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,

        ]);
        if ($update) {
            return redirect('ipklulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.kependidikan.index';
                </script>";
        }
=======
            'id_pt_unit' => $request->kode_pt_unit,
        ]);
        return redirect('ipklulusan')->with('success', 'Data berhasil disimpan');
>>>>>>> origin/prefered_dev
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipk = IPKLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ipk->delete();
        return redirect()->route('ipklulusan')->with('success', 'Data IPK Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new IPKLulusanExport, 'IPK Lulusan.xlsx');
    }
}
