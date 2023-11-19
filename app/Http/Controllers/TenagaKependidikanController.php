<?php

namespace App\Http\Controllers;

use App\Exports\TenagaKependidikanExport;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\PTUnit;

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
       
        $tenaga_kependidikan = TenagaKependidikan::with('idPtUnit')->get();

        // dd($tenaga_kependidikan2);

        $ptUnits = PTUnit::all();
        $data = [];
        $possibleJenjangs = ['sma', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3'];
        foreach ($tenaga_kependidikan->groupBy('jenis_tenaga_kependidikan','pt_unit','jenjang_pendidikan') as $key => $value) {
            dd($value);
            $jenjangCounts = array_fill_keys($possibleJenjangs, 0);
            $idPtUnit = PTUnit::where('id',$value->first()->pt_unit)->get();
            $data[$key] = [
                'idPtunit' => $idPtUnit,
                'id' => $value->first()->id,
                // 'jenis_tenaga_kependidikan' => $value->first()->jenis_tenaga_kependidikan,
                'jenis_tenaga_kependidikan' => $value->first()->jenis_tenaga_kependidikan,
                'nama' => $value->first()->nama,
                'pt_unit' => $value->first()->pt_unit,
                'unit_kerja' => $value->first()->unit_kerja,
                'jenjang_pendidikan' => $value->get('jenjang_pendidikan'),
                'jenjang_counts' => $value->groupBy('jenjang_pendidikan')->each(function ($item, $key) use (&$jenjangCounts) {
                 $jenjangCounts[$key] = $item->count();
                 
            })
            ];
        }


        // dd($data);
        return view('admprodi.page.kependidikan.index', compact('data','ptUnits','tenaga_kependidikan'));
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
        $ptUnits = PTUnit::all();
        return view(
            'admprodi.page.kependidikan.form',
            [
                'url' => 'simpan-kependidikan',
                'ptUnits' =>  $ptUnits,
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
            'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'pt_unit' => $request->kode_pt_unit,
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
            'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'pt_unit' => $request->kode_pt_unit,

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
        return redirect()->route('kependidikan')->with('success', 'Data Kualifikasi Tenaga Kependidikan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new TenagaKependidikanExport, 'Kualifikasi Tenaga Kependidikan.xlsx');
    }

    public function byPtUnit($ptunitid)
    {
        $where = [
            'pt_unit' => $ptunitid, // D4 TRPL
        ];
        $data = TenagaKependidikan::where($where)->get();
        dd($data);
        // return view
    }
}


