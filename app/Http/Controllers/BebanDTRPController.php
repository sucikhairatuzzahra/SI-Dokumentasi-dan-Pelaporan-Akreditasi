<?php

namespace App\Http\Controllers;

use App\Exports\BebanDTPRExport;
use App\Models\BebanDTPR;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PTUnit;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> origin/prefered_dev

class BebanDTRPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index($id_pt_unit='')
    {
        // $data = BebanDTPR::all();
        if($id_pt_unit){
            $data = BebanDTPR::where('id_pt_unit', $id_pt_unit)->get();
            return view('jurusan.page.beban_dtpr.index', compact('data'));

        }else{
            $data = BebanDTPR::all();
             return view('jurusan.page.beban_dtpr.index', compact('data'));
        }
     
    }

    public function getDataByProdi($id_pt_unit)
    {
        $data = BebanDTPR::where('id_pt_unit', $id_pt_unit)->get();
        // return response()->json($data);
        return view('jurusan.page.mhsbaru.index', compact('data'));
    }

    public function admprodiIndex()
    {
        $data = BebanDTPR::all();
        // dd($data);
        return view('admprodi.page.beban_dtpr.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = BebanDTPR::all();
        return view('kaprodi.page.beban_dtpr.index', compact('data'));
=======
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = BebanDTPR::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);

            return view('beban_dtpr.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi')) {
            $data = BebanDTPR::with('ptUnit');
            $data = $data->paginate(20);
            return view('beban_dtpr.index', compact('data'));
        }

        if (Gate::allows('isKaprodi')) {
            $data = BebanDTPR::with('ptUnit');
            $data = $data->paginate(20);
            return view('beban_dtpr.index', compact('data'));
        }
>>>>>>> origin/prefered_dev
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
      
        return view(
            'admprodi.page.beban_dtpr.form',
            [
                'url' => 'simpan-bebandtpr',
             
            ]
        );
=======
        $ptUnit = Auth::user()->ptUnit;
        return view('beban_dtpr.create', compact('ptUnit'));
>>>>>>> origin/prefered_dev
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $user = Auth::user();
        $input = BebanDTPR::insert([
=======
        BebanDTPR::create([
>>>>>>> origin/prefered_dev
            'id' => $request->id,
            'nama_dosen' => $request->nama_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
        ]);
        return redirect('beban-dtpr')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = BebanDTPR::find($id);
<<<<<<< HEAD
        return view('admprodi.page.beban_dtpr.form_edit', $data);
=======
        return view('beban_dtpr.edit', $data);
>>>>>>> origin/prefered_dev
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
        $dtpr = BebanDTPR::find($id);
        $dtpr->update([
            'nama_dosen' => $request->nama_dosen,
            'pgjrn_ps_sendiri' => $request->pgjrn_ps_sendiri,
            'pgjrn_ps_lain_pt_sendiri' => $request->pgjrn_ps_lain_pt_sendiri,
            'pgjrn_pt_lain' => $request->pgjrn_pt_lain,
            'sks_penelitian' => $request->sks_penelitian,
            'sks_pengabdian' => $request->sks_pengabdian,
            'manajemen_pt_sendiri' => $request->manajemen_pt_sendiri,
            'manajemen_pt_lain' => $request->manajemen_pt_lain,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,
        ]);
<<<<<<< HEAD
        if ($update) {
            return redirect('bebandtpr')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.bidang_kerja_lulusan.index';
                </script>";
        }
=======

        return redirect('bebandtpr')->with('success', 'Data berhasil disimpan');
>>>>>>> origin/prefered_dev
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bebandtpr = BebanDTPR::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $bebandtpr->delete();
        return redirect()->route('bebandtpr')->with('success', 'Data Rata-Rata Beban DTPR Per Semester berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new BebanDTPRExport, 'Beban DTPR.xlsx');
    }
}
