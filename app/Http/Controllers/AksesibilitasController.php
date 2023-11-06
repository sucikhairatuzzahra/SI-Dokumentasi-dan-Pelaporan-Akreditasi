<?php

namespace App\Http\Controllers;

use App\Exports\AksesibilitasExport;
use App\Models\Aksesibilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AksesibilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aksesibilitas::paginate('20');
        // dd($data);
        return view('admin.page.aksesibilitas.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = Aksesibilitas::paginate('20');

        return view('kaprodi.page.aksesibilitas.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.page.aksesibilitas.form',
            [
                'url' => 'simpan-aksesibilitas',
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
        $input = Aksesibilitas::insert([
            'id' => $request->id,
            'jenis_data' => $request->jenis_data,
            'secara_manual' => $request->secara_manual,
            'tanpa_jrg' => $request->tanpa_jrg,
            'lan' => $request->lan,
            'wan' => $request->wan,
            'id_pt_unit' => $request->id_pt_unit,

        ]);
        if ($input) {
            return redirect('aksesibilitas')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.aksesibilitas.index';
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
        // $data['editData'] = DB::table('masa_tunggu_lulusan')
        //     ->where('id', $id)
        //     ->first();

        $data['editData'] = Aksesibilitas::find($id);

        return view('admin.page.aksesibilitas.form_edit', $data);
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
        $akses = Aksesibilitas::find($id);
        $update = $akses->update([
            'jenis_data' => $request->jenis_data,
            'secara_manual' => $request->secara_manual,
            'tanpa_jrg' => $request->tanpa_jrg,
            'lan' => $request->lan,
            'wan' => $request->wan,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        if ($update) {
            return redirect('aksesibilitas')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.aksesibilitas.index';
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
        $akses = Aksesibilitas::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $akses->delete();
        return redirect()->route('aksesibilitas')->with('success', 'Data Aksesibilitas berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new AksesibilitasExport, 'Aksesibilitasi.xlsx');
    }
}
