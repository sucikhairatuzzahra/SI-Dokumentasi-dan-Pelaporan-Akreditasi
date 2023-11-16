<?php

namespace App\Http\Controllers;

use App\Exports\MasaTungguLulusanExport;
use App\Models\BidangKerjaLulusan;
use App\Models\MasaTungguLulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MasaTunguLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasaTungguLulusan::paginate(20);
        
        return view('admin.page.masa_tunggu_lulusan.index', compact('data'));
    }
    public function admprodiIndex()
    {
        $data = MasaTungguLulusan::with('idPtUnit')->get();
        $ptUnits = PTUnit::all();
     
        return view('admprodi.page.masa_tunggu_lulusan.index', compact('data','ptUnits'));
    }
    public function kaprodiIndex()
    {
        $data = MasaTungguLulusan::paginate(20);
        // foreach ($data as $key => $tahun) {
        //     $data[$key]['bidang'] = BidangKerjaLulusan::where('tahun_lulus', $tahun->tahun_lulus)->first();
        // }
        return view('kaprodi.page.masa_tunggu_lulusan.index', compact('data'));
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
            'admprodi.page.masa_tunggu_lulusan.form',
            [
                'url' => 'simpan-masatunggu',
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
        $input = MasaTungguLulusan::insert([
            'id' => $request->id,
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'waktu_tunggu' => $request->waktu_tunggu,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        if ($input) {
            return redirect('masatunggu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.masa_tunggu_lulusan.index';
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
        $data['editData'] = DB::table('masa_tunggu_lulusan')
            ->where('id', $id)
            ->first();
        return view('admprodi.page.masa_tunggu_lulusan.form_edit', $data);
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
        $masatunggu = MasaTungguLulusan::find($id);
        $update = $masatunggu->update([
            'tahun_lulus' => $request->tahun_lulus,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'waktu_tunggu' => $request->waktu_tunggu,
            'pt_unit' => $request->kode_pt_unit,
        ]);
        if ($update) {
            return redirect('masatunggu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.masa_tunggu_lulusan.index';
                </script>";
        }
        // $update = DB::table('masa_tunggu_lulusan')
        //     ->where('id', $id)
        //     ->update([
        //         'tahun_lulus' => $request->tahun_lulus,
        //         'waktu_tunggu' => $request->waktu_tunggu,
        //     ]);
        // if ($update) {
        //     return redirect('masatunggu')->with('pesan', 'Data berhasil disimpan');
        // } else {
        //     echo "<script>
        //         alert('Data gagal diinput, masukkan kebali data dengan benar');
        //         window.location = '/admin.page.masa_tunggu_lulusan.index';
        //         </script>";
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masatunggu = MasaTungguLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $masatunggu->delete();
        return redirect()->route('masatunggu')->with('success', 'Data Masa Tunggu Lulusan Bekerja berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new MasaTungguLulusanExport, 'Masa Tunggu Lulusan.xlsx');
    }
}
