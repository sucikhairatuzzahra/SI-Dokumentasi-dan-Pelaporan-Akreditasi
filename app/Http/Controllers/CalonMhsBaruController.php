<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mhsbaru;
use App\Models\PTUnit;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> origin/prefered_dev
use Maatwebsite\Excel\Facades\Excel;


class CalonMhsBaruController extends Controller

{

<<<<<<< HEAD
    public function index($id_pt_unit='')
    {
        $tahunAkademiks = TahunAkademik::all();
        if($id_pt_unit){
            $data = MhsBaru::where('id_pt_unit', $id_pt_unit)->get();
            return view('jurusan.page.mhsbaru.index', compact('data','tahunAkademiks'));

        }else{
            $data = Mhsbaru::with('tahunAkademik')->get();
    
            return view('jurusan.page.mhsbaru.index', compact('data','tahunAkademiks'));

        }
        
    }
    public function getDataByProdi($id_pt_unit)
    {
        $data = MhsBaru::where('id_pt_unit', $id_pt_unit)->get();
        $tahunAkademiks = TahunAkademik::all();

        // return response()->json($data);
        return view('jurusan.page.mhsbaru.index', compact('data','tahunAkademiks'));
    }
    
    public function kaprodiIndex()
    {
        $data = Mhsbaru::with('tahunAkademik')->get();
        $tahunAkademiks = TahunAkademik::all();

        return view('kaprodi.page.mhsbaru.index', compact('data','tahunAkademiks'));
    }

    public function admprodiIndex()
    {
        $data = Mhsbaru::with('tahunAkademik')->get();
        $tahunAkademiks = TahunAkademik::all();
        return view('admprodi.page.mhsbaru.index', compact('data', 'tahunAkademiks'));
    }
    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        return view(
            'admprodi.page.mhsbaru.form',
            [
                'url' => 'simpan-cmb',
                'tahunAkademiks' => $tahunAkademiks,
             
            ]
        );
    } 
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $input = Mhsbaru::insert([
            'id' => $request->id,
            'thn_akademik' => $request->tahun_akademik,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
            // 'id_pt_unit' => Auth::user()->id_pt_unit,
=======
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = Mhsbaru::orderBy('id', 'desc')
                ->with('tahunAkademik', 'ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('mahasiswa.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = Mhsbaru::with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('mahasiswa.index', compact('data'));
        }
    }

    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        $userPtUnit = Auth::user()->ptUnit;
        return view('mahasiswa.create', compact('tahunAkademiks', 'ptUnit'));
    }
    public function store(Request $request)
    {
        Mhsbaru::insert([
            'id' => $request->id,
            'id_thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->id_pt_unit,
>>>>>>> origin/prefered_dev
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
        return view('mahasiswa.edit', $data, compact('tahunAkademiks'));
    }
    public function update(Request $request, $id)
    {
        $mhs = Mhsbaru::find($id);
<<<<<<< HEAD
        $update = $mhs->update([
            'thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => Auth::user()->id_pt_unit,
            'kode_pt_unit' => Auth::user()->kode_pt_unit,
=======
        $mhs->update([
            'id_thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->kode_pt_unit,
>>>>>>> origin/prefered_dev
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

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa_Baru.xlsx');
    }
}
