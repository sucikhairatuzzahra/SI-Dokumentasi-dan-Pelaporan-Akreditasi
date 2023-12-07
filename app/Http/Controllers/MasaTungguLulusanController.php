<?php

namespace App\Http\Controllers;

use App\Exports\MasaTungguLulusanExport;
use App\Models\MasaTungguLulusan;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PTUnit;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MasaTungguLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = MasaTungguLulusan::orderBy('id', 'desc')
                ->with('ptUnit','tahunAkademik')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('masa_tunggu_lulusan.index', compact('data', 'request'));
            
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = MasaTungguLulusan::with('ptUnit','tahunAkademik')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('masa_tunggu_lulusan.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        $ptUnit = Auth::user()->ptUnit;
        return view('masa_tunggu_lulusan.create', compact('ptUnit','tahunAkademiks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MasaTungguLulusan::insert([
            'id' => $request->id,
            'id_thn_akademik' => $request->thn_akademik,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'waktu_tunggu' => $request->waktu_tunggu,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('masa-tunggu')->with('pesan', 'Data berhasil disimpan');
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
        $tahunAkademiks = TahunAkademik::all();
        $data['editData'] = MasaTungguLulusan::find($id);
        return view('masa_tunggu_lulusan.edit', $data, compact('tahunAkademiks'));

        // $data['editData'] = DB::table('masa_tunggu_lulusan')
        //     ->where('id', $id)
        //     ->first();
        // return view('masa_tunggu_lulusan.edit', $data);
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
            'id_thn_akademik' => $request->thn_akademik,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'lulusan_terlacak' => $request->lulusan_terlacak,
            'waktu_tunggu' => $request->waktu_tunggu,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        if ($update) {
            return redirect('masa-tunggu')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.masa_tunggu_lulusan.index';
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
        $masatunggu = MasaTungguLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $masatunggu->delete();
        return redirect()->route('masa-tunggu')->with('success', 'Data Masa Tunggu Lulusan Bekerja berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new MasaTungguLulusanExport, 'Masa Tunggu Lulusan.xlsx');
    }
}
