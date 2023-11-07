<?php

namespace App\Http\Controllers;

use App\Exports\SaranaPrasaranaExport;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SaranaPrasarana::paginate('20');
        // dd($data);
        return view('admin.page.saranaprasarana.index', compact('data'));
    }
    public function admprodiIndex()
    {
        $data = SaranaPrasarana::paginate('20');

        return view('admprodi.page.saranaprasarana.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = SaranaPrasarana::paginate('20');

        return view('kaprodi.page.saranaprasarana.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admprodi.page.saranaprasarana.form',
            [
                'url' => 'simpan-sarana',
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
        $input = SaranaPrasarana::insert([
            'id' => $request->id,
            'sarana' => $request->sarana,
            'daya_tampung' => $request->daya_tampung,
            'luas_ruang' => $request->luas_ruang,
            'jml_mhs' => $request->jml_mhs,
            'jam_lyn' => $request->jam_lyn,
            'perangkat' => $request->perangkat,
            'id_pt_unit' => $request->id_pt_unit,

        ]);
        if ($input) {
            return redirect('sarana')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.saranaprasarana.index';
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
        $data['editData'] = SaranaPrasarana::find($id);
        return view('admprodi.page.saranaprasarana.form_edit', $data);
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
        $sarana = SaranaPrasarana::find($id);
        $update = $sarana->update([
            'sarana' => $request->sarana,
            'daya_tampung' => $request->daya_tampung,
            'luas_ruang' => $request->luas_ruang,
            'jml_mhs' => $request->jml_mhs,
            'jam_lyn' => $request->jam_lyn,
            'perangkat' => $request->perangkat,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        if ($update) {
            return redirect('sarana')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.saranaprasarana.index';
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
        $sarana = SaranaPrasarana::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $sarana->delete();
        return redirect()->route('sarana')->with('success', 'Data Sarana dan Prasarana berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new SaranaPrasaranaExport, 'Sarana Prasarana.xlsx');
    }
}
