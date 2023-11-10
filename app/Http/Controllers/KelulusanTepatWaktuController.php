<?php

namespace App\Http\Controllers;

use App\Exports\KelulusanTepatWaktuExport;
use App\Models\KelulusanTepatWaktu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        foreach ($data as $i => $data1) {
            // data akhir_ts = data mahasiswa yang lulus di tahun ini, dan tahun masuk di $data['tahun_masuk]
            $akhir_ts = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts'] = $akhir_ts;
            // data akhir_ts_1 = data mahasiswa yang lulus di 1 tahun yang lalu, dan tahun masuk di $data['tahun_masuk]
            $akhir_ts_1 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear()->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_1'] = $akhir_ts_1;
            // $akhir_ts_2
            $akhir_ts_2 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear(2)->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_2'] = $akhir_ts_2;
            // $akhir_ts_3
            $akhir_ts_3 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear(3)->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_3'] = $akhir_ts_3;
            // $akhir_ts_4
            $akhir_ts_4 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear(4)->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_4'] = $akhir_ts_4;
            // $akhir_ts_5
            $akhir_ts_5 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear(5)->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_5'] = $akhir_ts_5;
            // $akhir_ts_6
            $akhir_ts_6 = KelulusanTepatWaktu::where('id_pt_unit', $data1['id_pt_unit'])
            ->where('tahun_masuk', $data1['tahun_masuk'])
            ->where('tahun_lulus', Carbon::now()->subYear(6)->format('Y'))
            ->sum('jml_lulusan');
            $data[$i]['akhir_ts_6'] = $akhir_ts_6;
        }

        return view('admprodi.page.kelulusan_tepat_waktu.index', compact('data'));

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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
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
     * @param int $id
     *
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
     * @param int $id
     *
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
        return Excel::download(new KelulusanTepatWaktuExport(), 'Kelulusan Tepat Waktu.xlsx');
    }
}
