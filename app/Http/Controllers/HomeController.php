<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jurusanHome()
    {
        // return view('home', ["msg" => "i am Jurusan role"]);
        return view('jurusan.page.dashboard.index');
    }
    public function kaprodiHome()
    {
        // return view('home', ["msg" => "i am Kaprodi role"]);
        return view('kaprodi.page.dashboard.index');
    }
    public function adminHome()
    {
        // return view('home', ["msg" => "i am Admin role"]);
        return view('admin.page.dashboard.index');
    }
}
