<?php

namespace App\Http\Controllers;

use App\Exports\IPKLulusanExport;
use App\Models\IPKLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IPKLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IPKLulusan::paginate('20');
        // dd($data);
        return view('admin.page.ipk_lulusan.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = IPKLulusan::paginate('20');

        return view('kaprodi.page.ipk_lulusan.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.ipk_lulusan.form',
            [
                'url' => 'simpan-ipklulusan',
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
        $input = IPKLulusan::insert([
            'id' => $request->id,
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        if ($input) {
            return redirect('ipklulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.ipk_lulusan.index';
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
        $data['editData'] = IPKLulusan::find($id);
        return view('admin.page.ipk_lulusan.form_edit', $data);
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
        $ipk = IPKLulusan::find($id);
        $update = $ipk->update([
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
            'id_pt_unit' => $request->id_pt_unit,

        ]);
        if ($update) {
            return redirect('ipklulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.kependidikan.index';
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
        $ipk = IPKLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ipk->delete();
        return redirect()->route('ipklulusan')->with('success', 'Data IPK Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new IPKLulusanExport, 'IPK Lulusan.xlsx');
    }
}
