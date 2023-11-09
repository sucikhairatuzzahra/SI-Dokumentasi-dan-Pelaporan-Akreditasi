<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mhsbaru;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;


class CalonMhsBaruController extends Controller

{

    public function index()
    {
        $data = Mhsbaru::paginate('20');
        // dd($data);

        return view('admin.page.mhsbaru.index', compact('data'));
        
    }
    public function kaprodiIndex()
    {
        $data = Mhsbaru::paginate('20');

        return view('kaprodi.page.mhsbaru.index', compact('data'));
    }
    public function admprodiIndex()
    {
        $data = Mhsbaru::paginate('20');

        return view('admprodi.page.mhsbaru.index', compact('data'));
    }
    public function create()
    {
        return view(
            'admprodi.page.mhsbaru.form',
            [
                'url' => 'simpan-cmb',
            ]
        );
    }
    public function store(Request $request)
    {
        $input = Mhsbaru::insert([
            'id' => $request->id,
            'thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->id_pt_unit,
            'daya_tampung' => $request->daya_tampung,
            'pendaftar' => $request->pendaftar,
            'lulus_seleksi' => $request->lulus_seleksi,
            'maba_reguler' => $request->maba_reguler,
            'maba_transfer' => $request->maba_transfer,
            'mhs_aktif_reguler' => $request->mhs_aktif_reguler,
            'mhs_aktif_transfer' => $request->mhs_aktif_transfer
        ]);
        if ($input) {
            return redirect('mhs-baru')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.mhsbaru.index';
            </script>";
        }
    }
    public function edit($id)
    {
        $data['editData'] = Mhsbaru::find($id);
        return view('admprodi.page.mhsbaru.form_edit', $data);
    }
    public function update(Request $request, $id)
    {
        $mhs = Mhsbaru::find($id);
        $update = $mhs->update([
            'thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->id_pt_unit,
            'daya_tampung' => $request->daya_tampung,
            'pendaftar' => $request->pendaftar,
            'lulus_seleksi' => $request->lulus_seleksi,
            'maba_reguler' => $request->maba_reguler,
            'maba_transfer' => $request->maba_transfer,
            'mhs_aktif_reguler' => $request->mhs_aktif_reguler,
            'mhs_aktif_transfer' => $request->mhs_aktif_transfer,
        ]);
        if ($update) {
            return redirect('mhs-baru')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.mhsbaru.index';
                </script>";
        }
    }
    public function destroy($id)
    {
        $mhsbaru = Mhsbaru::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $mhsbaru->delete();

        return redirect()->route('mhs-baru')->with('success', 'Data Calon Mahasiswa Baru berhasil dihapus');
    }
    public function show($id)
    {
        $prodi = Mhsbaru::findOrFail($id);

        return view('jurusan.page.mhsbaru.index', compact('prodi'));
    }
    // public function download(){

    // }

    public function download()
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa Baru.xlsx');
    }
}
