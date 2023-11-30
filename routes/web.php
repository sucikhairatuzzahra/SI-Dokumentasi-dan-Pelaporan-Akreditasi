<?php

use App\Http\Controllers\AksesibilitasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BebanDTRPController;
use App\Http\Controllers\BidangKerjaLulusanController;
use App\Http\Controllers\CalonMhsBaruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IPKLulusanController;
use App\Http\Controllers\KelulusanTepatWaktuController;
use App\Http\Controllers\KepuasanPenggunaLulusanController;
use App\Http\Controllers\MasaTunguLulusanController;
use App\Http\Controllers\PendanaanController;
use App\Http\Controllers\PenelitianPengabdian;
use App\Http\Controllers\PPKMDariDTPRController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\TenagaKependidikanController;
use App\Http\Controllers\JumlahTenagaKependidikanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LuaranController;
use App\Http\Controllers\LuaranLainController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PTUnitController;
use App\Http\Controllers\XHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth'])->group(function () {
// });
//route login
Route::get('/', [XHomeController::class, 'index'])->name('home.route');

// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Auth::routes();


Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('users', DashboardController::class)->except(['show'])->parameters(['users' => 'id']);
        Route::resource('dosen', DosenController::class)->parameters(['dosen' => 'id']);
        Route::resource('ptunit', PTUnitController::class)->except(['show', 'edit', 'update'])->parameters(['ptunit' => 'id']);
        Route::resource('ta', AdminController::class)->except(['show', 'edit', 'update'])->parameters(['ta' => 'id']);
        Route::resource('pegawai', PegawaiController::class)->except('show')->parameters(['pegawai' => 'id']);
        Route::resource('luaran', LuaranController::class)->except(['show', 'edit', 'update'])->parameters(['luaran' => 'id']);
        Route::resource('luaran-lain', LuaranLainController::class)->except(['show', 'edit', 'update'])->parameters(['luaran-lain' => 'id']);
    });
});

Route::resource('mahasiswa', CalonMhsBaruController::class)->parameters(['mahasiswa' => 'id']);
Route::get('mahasiswa/download', [CalonMhsBaruController::class, 'download'])->name('mahasiswa.download');

// Route::middleware(['auth', 'user-role:jurusan'])->group(function () {
//     Route::prefix('jurusan')->group(function () {
        
//     });
// });
