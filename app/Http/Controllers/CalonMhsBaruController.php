<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Jobs\MhsbaruJob;
use App\Models\Mhsbaru;
use App\Models\PTUnit;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;


class CalonMhsBaruController extends Controller

{

    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $data = Mhsbaru::orderBy('id', 'desc')
                ->with('tahunAkademik', 'ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('mahasiswa.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            // gunakan group by untuk membuat data berdasarkan tahun
            $data = Mhsbaru::groupBy('id_thn_akademik')->with('tahunAkademik', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('mahasiswa.index', compact('data'));
        }
    }

    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        $ptUnit = Auth::user()->ptUnit;
        return view('mahasiswa.create', compact('tahunAkademiks', 'ptUnit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'thn_akademik' => 'required',
            'daya_tampung' => 'required|numeric',
            'pendaftar' => 'required|numeric',
            'lulus_seleksi' => 'required|numeric',
            'maba_reguler' => 'required|numeric',
            'maba_transfer' => 'required|numeric',
            'mhs_aktif_reguler' => 'required|numeric',
            'mhs_aktif_transfer' => 'required|numeric'
        ]);

        Mhsbaru::create([
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

    public function massUploadForm()
    {
        return view('mahasiswa.bulk');
    }

    public function massUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-data-bayi.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);
            MhsbaruJob::dispatch($filename);
            return redirect()->back()->with(['success' => 'Import Data Balita Dijadwalkan!']);
        }
    }

    public function edit($id)
    {
        $tahunAkademiks = TahunAkademik::all();
        $data['editData'] = Mhsbaru::find($id);
        return view('mahasiswa.edit', $data, compact('tahunAkademiks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thn_akademik' => 'required',
            'daya_tampung' => 'required|numeric',
            'pendaftar' => 'required|numeric',
            'lulus_seleksi' => 'required|numeric',
            'maba_reguler' => 'required|numeric',
            'maba_transfer' => 'required|numeric',
            'mhs_aktif_reguler' => 'required|numeric',
            'mhs_aktif_transfer' => 'required|numeric'
        ]);

        $mhs = Mhsbaru::find($id);
        $mhs->update([
            'id_thn_akademik' => $request->thn_akademik,
            'id_pt_unit' => $request->id_pt_unit,
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

        return redirect('mahasiswa')->with('success', 'Data Calon Mahasiswa Baru berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa_Baru.xlsx');
    }
}
