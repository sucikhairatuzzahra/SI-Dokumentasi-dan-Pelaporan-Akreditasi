<?php

namespace App\Http\Controllers;

use App\Exports\TenagaKependidikanExport;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TenagaKependidikan::paginate('20');

        // dd($data);
        return view('admin.page.kependidikan.index', compact('data'));
    }
    public function admprodiIndex()
    {
        // $data = TenagaKependidikan::all();
        $tenaga_kependidikan = TenagaKependidikan::all();

        $data = [];
        foreach ($tenaga_kependidikan->groupBy('jenis_tng_kpddkn', 'jenjang_pendidikan') as $key => $value) {
            $data[$key] = [
                'jenis_tng_kpddkn' => $key[0],
                'nama' => $value->first()->nama,
                'unit_kerja' => $value->first()->unit_kerja,
                'sma_smk' => $value->pluck('jenjang_pendidikan')->contains('SMA/SMK') ? $value->count() : 0,
                'd1' => $value->pluck('jenjang_pendidikan')->contains('D1') ? $value->count() : 0,
                'd2' => $value->pluck('jenjang_pendidikan')->contains('D2') ? $value->count() : 0,
                'd3' => $value->pluck('jenjang_pendidikan')->contains('D3') ? $value->count() : 0,
                's1' => $value->pluck('jenjang_pendidikan')->contains('S1') ? $value->count() : 0,
                's2' => $value->pluck('jenjang_pendidikan')->contains('S2') ? $value->count() : 0,
                's3' => $value->pluck('jenjang_pendidikan')->contains('S3') ? $value->count() : 0,
            ];
        }
        
        return view('admprodi.page.kependidikan.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = TenagaKependidikan::paginate('20');

        return view('kaprodi.page.kependidikan.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admprodi.page.kependidikan.form',
            [
                'url' => 'simpan-kependidikan',
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
        $input = TenagaKependidikan::insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'jenis_tng_kpddkn' => $request->jenis_tng_kpddkn,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
        ]);
        if ($input) {
            return redirect('kependidikan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.kependidikan.index';
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
        $data['editData'] = TenagaKependidikan::find($id);
        return view('admprodi.page.kependidikan.form_edit', $data);
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
        $kpddkn = TenagaKependidikan::find($id);
        $update = $kpddkn->update([
            'nama' => $request->nama,
            'jenis_tng_kpddkn' => $request->jenis_tng_kpddkn,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,

        ]);
        if ($update) {
            return redirect('kependidikan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.kependidikan.index';
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
        $kpddkn = TenagaKependidikan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kpddkn->delete();
        return redirect()->route('sarana')->with('success', 'Data Kualifikasi Tenaga Kependidikan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new TenagaKependidikanExport, 'Kualifikasi Tenaga Kependidikan.xlsx');
    }
}
