<?php

namespace App\Http\Controllers;

use App\Exports\KelulusanTepatWaktuExport;
use App\Models\KelulusanTepatWaktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class KelulusanTepatWaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KelulusanTepatWaktu::all();

        // dd($data);
        return view('admin.page.kelulusan_tepat_waktu.index', compact('data'));
    }
    public function admprodiIndex(Request $request)
    {
        $data = KelulusanTepatWaktu::all();

        $akhir_ts = KelulusanTepatWaktu::where('tahun_lulus', Carbon::now()->format('Y'))
        ->sum('jml_lulusan');
        return view('admprodi.page.kelulusan_tepat_waktu.index', compact('data','akhir_ts'));


    
        // $tahun_masuk = $request->get('tahun_masuk');
        // $id_pt_unit = $request->get('id_pt_unit');

        // // Buat array untuk menyimpan data lulusan
        // $data_lulusan = [];

        // // Ambil data lulusan dari tabel mahasiswa
        // $data = KelulusanTepatWaktu::where('tahun_masuk', $tahun_masuk)
        //     ->where('id_pt_unit', $id_pt_unit)
        //     ->get();

        // // Hitung jumlah lulusan sampai dengan akhir TS
        // foreach ($data as $item) {
        //     // Jika id PT Unit belum ada di array, maka tambahkan datanya
        //     if (!isset($data_lulusan[$item->id_pt_unit])) {
        //         $data_lulusan[$item->id_pt_unit] = [
        //             'tahun_masuk' => $item->tahun_masuk,
        //             'tahun_lulus' => $item->tahun_lulus,
        //             'jumlah_lulusan' => 0,
        //             'jumlah_lulusan_sampai_akhir_ts' => 0,
        //         ];
        //     }

        //     // Tambahkan jumlah lulusan pada tahun masuk yang sama
        //     $data_lulusan[$item->id_pt_unit]['jumlah_lulusan'] += $item->jumlah_lulusan;

        //     // Hitung jumlah lulusan sampai dengan akhir TS
        //     for ($i = 0; $i <= 6; $i++) {
        //         $data_lulusan[$item->id_pt_unit]['jumlah_lulusan_sampai_akhir_ts'] += $item->akhir_ts - $i;
        //     }
        // }

        // return view('admprodi.page.kelulusan_tepat_waktu.index', [
        //     'data' => $data_lulusan,
        // ]);
        
    }
    public function kaprodiIndex()
    {
        $data = KelulusanTepatWaktu::paginate('20');

        return view('kaprodi.page.kelulusan_tepat_waktu.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admprodi.page.kelulusan_tepat_waktu.form',
            [
                'url' => 'simpan-kelulusan_tepatwaktu',
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
        $input = KelulusanTepatWaktu::insert([
            'id' => $request->id,
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $request->id_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'tahun_lulus' => $request->tahun_lulus,
            'jml_lulusan' => $request->jml_lulusan,
            'wisuda_ke' => $request->wisuda_ke,
            'masa_studi' => $request->masa_studi,
            'jml_mhs_aktif' => $request->jml_mhs_aktif,

        ]);
        if ($input) {
            return redirect('kelulusan_tepatwaktu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.kelulusan_tepat_waktu.index';
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
        $data['editData'] = KelulusanTepatWaktu::find($id);
        return view('admprodi.page.kelulusan_tepat_waktu.form_edit', $data);
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
        $kelulusan = KelulusanTepatWaktu::find($id);
        $update = $kelulusan->update([
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $request->id_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'tahun_lulus' => $request->tahun_lulus,
            'jml_lulusan' => $request->jml_lulusan,
            'wisuda_ke' => $request->wisuda_ke,
            'masa_studi' => $request->masa_studi,
            'jml_mhs_aktif' => $request->jml_mhs_aktif,
        ]);
        if ($update) {
            return redirect('kelulusan_tepatwaktu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.kelulusan_tepat_waktu.index';
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
        $kelulusan = KelulusanTepatWaktu::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $kelulusan->delete();
        return redirect()->route('kelulusan_tepatwaktu')->with('success', 'Data Kelulusan Tepat Waktu Berhasil Dihapus');
    }

    public function download()
    {
        return Excel::download(new KelulusanTepatWaktuExport, 'Kelulusan Tepat Waktu.xlsx');
    }
}
