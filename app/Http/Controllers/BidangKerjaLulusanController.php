<?php

namespace App\Http\Controllers;

use App\Exports\BidangKerjaLulusanExport;
use App\Models\BidangKerjaLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BidangKerjaLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::allows('isJurusan')) {
            $data = BidangKerjaLulusan::paginate(20);
            return view('bidang_kerja_lulusan.index', compact('data'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = BidangKerjaLulusan::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('bidang_kerja_lulusan.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptUnit = Auth::user()->ptUnit;
        return view('bidang_kerja_lulusan.create', compact('ptUnit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BidangKerjaLulusan::create([
            'id' => $request->id,
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'bidang_infokom' => $request->bidang_infokom,
            'bidang_noninfokom' => $request->bidang_noninfokom,
            'internasional' => $request->internasional,
            'nasional' => $request->nasional,
            'wirausaha' => $request->wirausaha,
            'id_pt_unit' => $request->kode_pt_unit,
        ]);
        return redirect('kerja-lulusan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = BidangKerjaLulusan::find($id);
        return view('bidang_kerja_lulusan.edit', $data);
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
        $kerjalulusan = BidangKerjaLulusan::find($id);
        $kerjalulusan->update([
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'bidang_infokom' => $request->bidang_infokom,
            'bidang_noninfokom' => $request->bidang_noninfokom,
            'internasional' => $request->internasional,
            'nasional' => $request->nasional,
            'wirausaha' => $request->wirausaha,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        return redirect('kerjalulusan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerjalulusan = BidangKerjaLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kerjalulusan->delete();
        return redirect()->route('kerjalulusan')->with('success', 'Data Bidang Kerja Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new BidangKerjaLulusanExport, 'Bidang Kerja Lulusan.xlsx');
    }
}
