<?php

namespace App\Http\Controllers;

use App\Exports\BidangKerjaLulusanExport;
use App\Models\BidangKerjaLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;

class BidangKerjaLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //index  untuk jurusan
    public function index()
    {
        $data = BidangKerjaLulusan::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
        return view('jurusan.page.bidang_kerja_lulusan.index', compact('data','ptUnits'));
    }
    public function admprodiIndex()
    {
        $data = BidangKerjaLulusan::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
        // dd($data);
        return view('admprodi.page.bidang_kerja_lulusan.index', compact('data','ptUnits'));
    }

    public function kaprodiIndex()
    {
        $data = BidangKerjaLulusan::paginate('20');

        return view('kaprodi.page.bidang_kerja_lulusan.index', compact('data'));
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
            'admprodi.page.bidang_kerja_lulusan.form',
            [
                'url' => 'simpan-kerjalulusan',
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
        $input = BidangKerjaLulusan::insert([
            'id' => $request->id,
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
        if ($input) {
            return redirect('kerjalulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admin.page.bidang_kerja_lulusan.index';
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
        $data['editData'] = BidangKerjaLulusan::find($id);
        return view('admin.page.bidang_kerja_lulusan.form_edit', $data);
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
        $update = $kerjalulusan->update([
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
        if ($update) {
            return redirect('kerjalulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.bidang_kerja_lulusan.index';
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
        $kerjalulusan = BidangKerjaLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kerjalulusan->delete();
        return redirect()->route('kerjalulusan')->with('success', 'Data Bidang Kerja Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new BidangKerjaLulusanExport, 'Bidang Kerja Lulusan.xlsx');
    }
}
