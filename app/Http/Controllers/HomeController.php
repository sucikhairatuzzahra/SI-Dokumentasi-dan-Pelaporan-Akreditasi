<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug(Auth::user());
        if (Auth::check()) {
            $role = Auth::user()->role;
            if (Gate::allows('isAdmin', $role)) {
                return view('admin.index');
            } else {
                return view('dashboard.index');
            }
            abort(404);
        } else {
            return view('auth.login');
        }
    }
}
