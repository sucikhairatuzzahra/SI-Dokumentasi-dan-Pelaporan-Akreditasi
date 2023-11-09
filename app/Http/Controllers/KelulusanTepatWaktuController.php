<?php

namespace App\Http\Controllers;

use App\Exports\KelulusanTepatWaktuExport;
use App\Models\KelulusanTepatWaktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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
        $data = KelulusanTepatWaktu::paginate('20');

        // dd($data);
        return view('admin.page.kelulusan_tepat_waktu.index', compact('data'));
    }
    public function admprodiIndex()
    {
        // $data = KelulusanTepatWaktu::paginate('20');
        // Buat variabel untuk tahun sekarang
        $tahun_sekarang = date("Y");

        // Ambil data mahasiswa berdasarkan tahun masuk
        $data = KelulusanTepatWaktu::select([
                "tahun_masuk", "jml_mhs","tahun_lulus","jml_lulusan","wisuda_ke","masa_studi","jml_mhs_aktif","id_pt_unit",
                "year(now()) - year(tahun_masuk) AS selisih_tahun",
            ])
            ->where("tahun_masuk", '=', request("tahun_masuk"))
            ->get()
            ->map(function ($item) use ($tahun_sekarang) {
                return $item['selisih_tahun'] <= $tahun_sekarang ? 1 : 0;
            })
            ->toArray();

        // Hitung jumlah lulusan untuk setiap tahun
        $jumlah_lulusan_pertahun = array_reduce($data, function ($carry, $item) {
            $tahun = $item ? $item : $tahun_sekarang;

            if (isset($carry[$tahun])) {
                $carry[$tahun]++;
            } else {
                $carry[$tahun] = 1;
            }

            return $carry;
        }, []);

        // Kembalikan data ke view
        // return view("kelulusan.index", compact("data", "jumlah_lulusan_pertahun"));

   
        return view('admprodi.page.kelulusan_tepat_waktu.index', compact('data', 'jumlah_lulusan_pertahun'));
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
