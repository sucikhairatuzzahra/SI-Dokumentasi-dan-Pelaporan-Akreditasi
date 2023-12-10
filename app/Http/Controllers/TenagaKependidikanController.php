<?php

namespace App\Http\Controllers;

use App\Exports\TenagaKependidikanExport;
use App\Models\PTUnit;
use App\Models\TenagaKependidikan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tenaga_kependidikan = TenagaKependidikan::groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'unit_kerja')->orderBy('jenis_tenaga_kependidikan')->get();
        $tenaga_kependidikan2 = TenagaKependidikan::all();

        $data = [];
        $possibleJenjangs = ['sma', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3'];
        foreach ($tenaga_kependidikan as $key => $value) {
            $jenjangCounts = array_fill_keys($possibleJenjangs, 0);
            $data[$key] = [
                'jenis_tenaga_kependidikan' => $value->jenis_tenaga_kependidikan,
                'nama' => $value->nama,
                'unit_kerja' => $value->unit_kerja,
                'jenjang_pendidikan' => $value->get('jenjang_pendidikan'),
                'jenjang_counts' => $tenaga_kependidikan2->where('jenis_tenaga_kependidikan', $value->jenis_tenaga_kependidikan)->where('jenjang_pendidikan', $value->jenjang_pendidikan)
                ->groupBy('jenjang_pendidikan', 'jenis_tenaga_kependidikan', 'unit_kerja')->each(function ($item, $keyjp) use (&$jenjangCounts) 
                {
                 $jenjangCounts[$keyjp] = $item->count();
                })
            ];
        }

        return view('kependidikan.index', compact('data', 'tenaga_kependidikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('kependidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'jenis_tenaga_kependidikan' => 'required|string',
            'jenjang_pendidikan' => 'required|string',
            'unit_kerja' => 'required|string',
            'bukti' => 'required|mimes:pdf,png,jpeg',
        ]);
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '-' . Str::slug($request->keterangan) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kependidikan', $filename);


            TenagaKependidikan::create([
                'nama' => $request->nama,
                'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'unit_kerja' => $request->unit_kerja,
                'bukti' => $filename,
            ]);

            return redirect('kependidikan')->with('success', 'Data berhasil disimpan');
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
        // $data = TenagaKependidikan::where('id_pt_unit', $id)->with('ptUnit')->get();
        $data = TenagaKependidikan::where('unit_kerja', $id)->get();
        return view('kependidikan.show', compact('data'));
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
        return view('kependidikan.edit', $data);
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
        $kpddkn->update([
            'nama' => $request->nama,
            'jenis_tenaga_kependidikan' => $request->jenis_tenaga_kependidikan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'bukti' => $request->bukti,
        ]);

        return redirect('kependidikan')->with('success', 'Data berhasil disimpan');
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
            'unit_kerja' => $ptunitid, // D4 TRPL
        ];
        $data = TenagaKependidikan::where($where)->get();
        // dd($data);
        return view('kependidikan.show', compact('data'));
    }
}
