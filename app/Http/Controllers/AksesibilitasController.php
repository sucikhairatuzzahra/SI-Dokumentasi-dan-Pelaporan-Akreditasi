<?php

namespace App\Http\Controllers;

use App\Exports\AksesibilitasExport;
use App\Models\Aksesibilitas;
use App\Models\PTUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class AksesibilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index($id_pt_unit='')
    {
        if($id_pt_unit){
            $data = Aksesibilitas::where('id_pt_unit', $id_pt_unit)->get();
        return view('jurusan.page.aksesibilitas.index', compact('data'));

        }else{
            $data = Aksesibilitas::all();
         return view('jurusan.page.aksesibilitas.index', compact('data'));
        }

        // $data = Aksesibilitas::all();
        
    }
    public function getDataByProdi($id_pt_unit)
    {
        $data = Aksesibilitas::where('id_pt_unit', $id_pt_unit)->get();
        // return response()->json($data);
        return view('jurusan.page.aksesibilitas.index', compact('data'));
    }

    public function admprodiIndex()
    {
        $data = Aksesibilitas::all();
        return view('admprodi.page.aksesibilitas.index', compact('data'));
    }
    public function kaprodiIndex()
    {
        $data = Aksesibilitas::all();
        return view('kaprodi.page.aksesibilitas.index', compact('data'));
=======
    public function index(Request $request)
    {
        if (Gate::allows('isJurusan')) {
            $ptUnit = PTUnit::all();
            $data = Aksesibilitas::orderBy('id', 'desc')
                ->with('ptUnit')
                ->when($request->id_pt_unit, function ($query) use ($request) {
                    $query->where('id_pt_unit', $request->id_pt_unit);
                })->paginate(20);
            return view('aksesibilitas.index', compact('data', 'request'));
        }

        if (Gate::allows('isAdmProdi')) {
            $data = Aksesibilitas::with('ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('aksesibilitas.index', compact('data'));
        }

        if (Gate::allows('isKaprodi')) {
            $data = Aksesibilitas::with('ptUnit', 'ptUnit')->where('id_pt_unit', Auth::user()->id_pt_unit);
            $data = $data->paginate(20);
            return view('aksesibilitas.index', compact('data'));
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
            'admprodi.page.aksesibilitas.form',
            [
                'url' => 'simpan-aksesibilitas',
              
            ]
        );
=======
        $ptUnit = Auth::user()->ptUnit;
        return view('aksesibilitas.create', compact('ptUnit'));
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
        $user = Auth::user();
        $input = Aksesibilitas::insert([
            'id' => $request->id,
            'jenis_data' => $request->jenis_data,
            'secara_manual' => $request->secara_manual,
            'tanpa_jrg' => $request->tanpa_jrg,
            'lan' => $request->lan,
            'wan' => $request->wan,
            'id_pt_unit' => $user->id_pt_unit,
            'kode_pt_unit' => $user->kode_pt_unit,

        ]);
        return redirect('aksesibilitas')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Aksesibilitas::find($id);
<<<<<<< HEAD

        return view('admprodi.page.aksesibilitas.form_edit', $data);
=======
        return view('aksesibilitas.edit', $data);
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
        $akses = Aksesibilitas::find($id);
        $akses->update([
            'jenis_data' => $request->jenis_data,
            'secara_manual' => $request->secara_manual,
            'tanpa_jrg' => $request->tanpa_jrg,
            'lan' => $request->lan,
            'wan' => $request->wan,
            'id_pt_unit' => $request->id_pt_unit,
            'kode_pt_unit' => $request->kode_pt_unit,
        ]);
<<<<<<< HEAD
        if ($update) {
            return redirect('aksesibilitas')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admprodi.page.aksesibilitas.index';
                </script>";
        }
=======
        return redirect('aksesibilitas')->with('success', 'Data berhasil disimpan');
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
        $akses = Aksesibilitas::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $akses->delete();
        return redirect()->route('aksesibilitas')->with('success', 'Data Aksesibilitas berhasil dihapus');
    }
    
    public function download()
    {
        return Excel::download(new AksesibilitasExport, 'Aksesibilitasi.xlsx');
    }
}
