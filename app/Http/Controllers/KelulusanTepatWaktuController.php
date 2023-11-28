<?php

namespace App\Http\Controllers;

use App\Exports\KelulusanTepatWaktuExport;
use App\Models\KelulusanTepatWaktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\PTUnit;

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

            // Jumlah mahasiswa yang lulus sampai dengan ts
            $data[$i]['jumlah_lulusan_sampai_ts'] = collect([$akhir_ts_6, $akhir_ts_5, $akhir_ts_4, $akhir_ts_3, $akhir_ts_2, $akhir_ts_1, $akhir_ts])->sum();

            // Jumlah mahasiswa yang masih aktif
            if ($data1['jml_mhs'] > 0) {
                $data[$i]['jml_mhs_aktif'] = collect([$data1['jml_mhs']])->sum() - $data[$i]['jumlah_lulusan_sampai_ts'];
            } else {
                $data[$i]['jml_mhs_aktif'] = 0;
            }
        }
        
        return view('jurusan.page.kelulusan_tepat_waktu.index', compact('data'));
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

            // Jumlah mahasiswa yang lulus sampai dengan ts
            $data[$i]['jumlah_lulusan_sampai_ts'] = collect([$akhir_ts_6, $akhir_ts_5, $akhir_ts_4, $akhir_ts_3, $akhir_ts_2, $akhir_ts_1, $akhir_ts])->sum();

            // Jumlah mahasiswa yang masih aktif
            if ($data1['jml_mhs'] > 0) {
                $data[$i]['jml_mhs_aktif'] = collect([$data1['jml_mhs']])->sum() - $data[$i]['jumlah_lulusan_sampai_ts'];
            } else {
                $data[$i]['jml_mhs_aktif'] = 0;
            }
        }
        return view('admprodi.page.kelulusan_tepat_waktu.index', compact('data'));

    }
    public function kaprodiIndex()
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

            // Jumlah mahasiswa yang lulus sampai dengan ts
            $data[$i]['jumlah_lulusan_sampai_ts'] = collect([$akhir_ts_6, $akhir_ts_5, $akhir_ts_4, $akhir_ts_3, $akhir_ts_2, $akhir_ts_1, $akhir_ts])->sum();

            // Jumlah mahasiswa yang masih aktif
            if ($data1['jml_mhs'] > 0) {
                $data[$i]['jml_mhs_aktif'] = collect([$data1['jml_mhs']])->sum() - $data[$i]['jumlah_lulusan_sampai_ts'];
            } else {
                $data[$i]['jml_mhs_aktif'] = 0;
            }
        }
      
        return view('kaprodi.page.kelulusan_tepat_waktu.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $ptUnits = PTUnit::all();
        return view(
            'admprodi.page.kelulusan_tepat_waktu.form',
            [
                'url' => 'simpan-kelulusan_tepatwaktu',
                // 'ptUnits' =>  $ptUnits,
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
        $user = Auth::user();
        $input = KelulusanTepatWaktu::insert([
            'id' => $request->id,
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'tahun_lulus' => $request->tahun_lulus,
            'jml_lulusan' => $request->jml_lulusan,
            'wisuda_ke' => $request->wisuda_ke,
            'masa_studi' => $request->masa_studi,
            // 'jml_mhs_aktif' => $request->jml_mhs_aktif,

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
        $user = Auth::user();
        $kelulusan = KelulusanTepatWaktu::find($id);
        $update = $kelulusan->update([
            'tahun_masuk' => $request->tahun_masuk,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
            'jml_mhs' => $request->jml_mhs,
            'tahun_lulus' => $request->tahun_lulus,
            'jml_lulusan' => $request->jml_lulusan,
            'wisuda_ke' => $request->wisuda_ke,
            'masa_studi' => $request->masa_studi,
            // 'jml_mhs_aktif' => $request->jml_mhs_aktif,
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
