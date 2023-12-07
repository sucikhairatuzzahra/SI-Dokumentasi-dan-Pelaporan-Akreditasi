<?php

namespace App\Exports;

use App\Models\KelulusanTepatWaktu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KelulusanTepatWaktuExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = KelulusanTepatWaktu::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit)->get();
        
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
        // $data = KelulusanTepatWaktu::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
        return view('kelulusan_tw.table', compact('data'));
    }
}
