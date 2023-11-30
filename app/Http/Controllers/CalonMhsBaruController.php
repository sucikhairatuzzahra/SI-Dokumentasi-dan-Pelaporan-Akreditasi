<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Exports\MhsBaruExport;
use App\Models\Mhsbaru;
use App\Models\PTUnit;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class CalonMhsBaruController extends Controller

{

    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = Mhsbaru::orderBy('id', 'desc')
                ->with('tahunAkademik', 'ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('jurusan.mahasiswa.index', compact('data', 'ptUnit', 'request'));
        }

        if (Gate::allows('isAdmProdi')) {
            $data = Mhsbaru::with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('admprodi.mahasiswa.index', compact('data'));
        }

        if (Gate::allows('isKaprodi')) {
            $data = Mhsbaru::with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('kaprodi.mahasiswa.index', compact('data'));
        }
    }

    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        $userPtUnit = Auth::user()->ptUnit;
        Log::debug($userPtUnit);
        return view(
            'admprodi.mahasiswa.create',
            [
                'tahunAkademiks' => $tahunAkademiks,
                'userPtUnit' =>  $userPtUnit,
            ]
        );
    }
    public function store(Request $request)
    {
        Mhsbaru::insert([
            'id' => $request->id,
            'id_thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->id_pt_unit,
            'daya_tampung' => $request->daya_tampung,
            'pendaftar' => $request->pendaftar,
            'lulus_seleksi' => $request->lulus_seleksi,
            'maba_reguler' => $request->maba_reguler,
            'maba_transfer' => $request->maba_transfer,
            'mhs_aktif_reguler' => $request->mhs_aktif_reguler,
            'mhs_aktif_transfer' => $request->mhs_aktif_transfer
        ]);
        return redirect(route('mahasiswa.index'))->with('success', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $tahunAkademiks = TahunAkademik::all();
        $data['editData'] = Mhsbaru::find($id);
        return view('admprodi.mahasiswa.edit', $data, compact('tahunAkademiks'));
    }
    public function update(Request $request, $id)
    {
        $mhs = Mhsbaru::find($id);
        $mhs->update([
            'id_thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->kode_pt_unit,
            'daya_tampung' => $request->daya_tampung,
            'pendaftar' => $request->pendaftar,
            'lulus_seleksi' => $request->lulus_seleksi,
            'maba_reguler' => $request->maba_reguler,
            'maba_transfer' => $request->maba_transfer,
            'mhs_aktif_reguler' => $request->mhs_aktif_reguler,
            'mhs_aktif_transfer' => $request->mhs_aktif_transfer,
        ]);
        return redirect(route('mahasiswa.index'))->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $mhsbaru = Mhsbaru::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $mhsbaru->delete();

        return redirect(route('mahasiswa.index'))->with('success', 'Data Calon Mahasiswa Baru berhasil dihapus');
    }

    public function show($id)
    {
        $prodi = Mhsbaru::findOrFail($id);

        return view('jurusan.mahasiswa.index', compact('prodi'));
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa_Baru.xlsx');
    }
}
