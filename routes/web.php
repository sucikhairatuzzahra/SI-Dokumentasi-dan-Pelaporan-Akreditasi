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
    Route::resource('users', DashboardController::class)->except(['show'])->parameters(['users' => 'id']);
    Route::resource('dosen', DosenController::class)->parameters(['dosen' => 'id']); 
    Route::resource('ptunit', PTUnitController::class)->except(['show', 'edit', 'update'])->parameters(['ptunit' => 'id']);
    Route::resource('ta', AdminController::class)->except(['show', 'edit', 'update'])->parameters(['ta' => 'id']);
    
    //route Calon Mahasiswa Baru
    Route::get('/admin-mahasiswa', [CalonMhsBaruController::class, 'index'])->name('admin-mahasiswa'); //index

    //Aksesibilitas
    Route::get('/admin-aksesibilitas', [AksesibilitasController::class, 'index'])->name('admin-aksesibilitas'); //index

    //Pendanaan
    Route::get('/admin-sumberdana', [PendanaanController::class, 'index'])->name('admin-sumberdana'); //index

    //Sarana Prasaranaki
    Route::get('/admin-saranaprasarana', [SaranaPrasaranaController::class, 'index'])->name('admin-saranaprasarana'); //index

    //Tenaga Kependidikan
    Route::get('/admin-kependidikan', [TenagaKependidikanController::class, 'index'])->name('admin-kependidikan'); //index

    //IPK Lulusan
    Route::get('/admin-ipklulusan', [IPKLulusanController::class, 'index'])->name('admin-ipklulusan'); //index

    //Masa Tunggu Lulusan Bekerja
    Route::get('/admin-masatunggu', [MasaTunguLulusanController::class, 'index'])->name('admin-masatunggu'); //index

    //Kesesuaian bidang kerja lulusan 
    Route::get('/admin-kerjalulusan', [BidangKerjaLulusanController::class, 'index'])->name('admin-kerjalulusan'); //index

    //Rata-Rata Beban DTPR Per Semester
    Route::get('/admin-bebandtpr', [BebanDTRPController::class, 'index'])->name('admin-bebandtpr'); //index

    //Kepuasan Pengguna Lulusan
    Route::get('/admin-kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'index'])->name('admin-kepuasan_pengguna'); //index

    //Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR
    Route::get('/admin-ppkm_dtpr', [PPKMDariDTPRController::class, 'index'])->name('admin-ppkm_dtpr'); //index

    //Kelulusan Tepat Waktu
    Route::get('/admin-kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'index'])->name('admin-kelulusan_tepatwaktu'); //index
});
