<?php

namespace App\Http\Controllers;

use App\Exports\IPKLulusanExport;
use App\Models\TahunAkademik;
use App\Models\IPKLulusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IPKLulusanController extends Controller
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
            $data = IPKLulusan::orderBy('id_thn_akademik', 'asc')
                ->with('tahunAkademik','ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('ipk_lulusan.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi') xor Gate::allows('isKaprodi')) {
            $data = IPKLulusan::orderBy('id_thn_akademik', 'asc')->with('tahunAkademik','ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('ipk_lulusan.index', compact('data'));
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
        return view('ipk_lulusan.create', compact('ptUnit','tahunAkademiks'));
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
        $input = IPKLulusan::insert([
            'id' => $request->id,
            'id_thn_akademik' => $request->thn_akademik,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
            'id_pt_unit' => $user->id_pt_unit,
            // 'kode_pt_unit' => $user->kode_pt_unit,
        ]);
        if ($input) {
            return redirect('ipk-lulusan')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kebali data dengan benar');
            window.location = '/admprodi.page.ipk_lulusan.index';
            </script>";
        }
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
        $data['editData'] = IPKLulusan::find($id);
        return view('ipk_lulusan.edit', $data, compact('tahunAkademiks'));
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
        $ipk = IPKLulusan::find($id);
        $ipk->update([
            'id_thn_akademik' => $request->thn_akademik,
            'jumlah_lulusan' => $request->jumlah_lulusan,
            'ipk_min' => $request->ipk_min,
            'ipk_rata_rata' => $request->ipk_rata_rata,
            'ipk_max' => $request->ipk_max,
            'id_pt_unit' => $request->id_pt_unit,
        ]);
        return redirect('ipk-lulusan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipk = IPKLulusan::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $ipk->delete();
        return redirect('ipk-lulusan')->with('success', 'Data IPK Lulusan berhasil dihapus');
    }

    public function download()
    {
        return Excel::download(new IPKLulusanExport, 'IPK Lulusan.xlsx');
    }
}
