<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class XHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::debug(Auth::user());
        if (Auth::check()) {
            $role = Auth::user()->role;
            if (Gate::allows('isAdmin', $role)) {
                return view('admin.index');
            }
            if (Gate::allows('isJurusan', $role)) {
                return view('jurusan.index');
            }
            if (Gate::allows('isKaprodi', $role)) {
                return view('kaprodi.page.dashboard.index');
            }
            if (Gate::allows('isAdmProdi', $role)) {
                return view('admprodi.page.dashboard.index');
            }
            abort(404);
        } else {
            return view('auth.login');
        }
    }
}
