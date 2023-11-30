<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $role = Auth::user()->role;
        if (Gate::allows('isAdmin', $role)) {
            return view('admin.users.index', compact('data'));
        } else {
            return view('dashboard.index');
        }
    }

    public function indexAdmin()
    {
        return view('admin.page.dashboard.index');
    }

    public function admprodiIndex()
    {
        return view('admprodi.page.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJurusan()
    {
        return view('jurusan.page.dashboard.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indexKaprodi()
    {
        return view('kaprodi.page.dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = User::find($id);
        return view('admin.users.form_edit', $data);
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
        $user = User::find($id);
        $update = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        if ($update) {
            return redirect('admin-users')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
                alert('Data gagal diinput, masukkan kembali data dengan benar');
                window.location = '/admin.page.users.index';
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
        $user = User::findOrFail($id); // Ganti dengan model dan nama tabel yang sesuai
        $user->delete();
        return redirect()->route('admin-users')->with('success', 'Data User berhasil dihapus');
    }
    function aksi_logout(Request $request)
    {
        $request->session()->forget('nama');
        $request->session()->forget('username');
        $request->session()->forget('password');
        $request->session()->forget('id');

        return redirect()->route('login')->with("pesan", "Anda Sudah Logout");
    }
}
