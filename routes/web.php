<?php

use App\Http\Controllers\AksesibilitasController;
use App\Http\Controllers\BebanDTRPController;
use App\Http\Controllers\BidangKerjaLulusanController;
use App\Http\Controllers\CalonMhsBaruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IPKLulusanController;
use App\Http\Controllers\KelulusanTepatWaktuController;
use App\Http\Controllers\KepuasanPenggunaLulusanController;
use App\Http\Controllers\MasaTungguLulusanController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.route');

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

Route::resource('mahasiswa', CalonMhsBaruController::class)->except('show')->parameters(['mahasiswa' => 'id']);
Route::get('mahasiswa-download', [CalonMhsBaruController::class, 'export'])->name('mahasiswa.download');
Route::resource('beban-dtpr', BebanDTRPController::class)->parameters(['beban-dtpr' => 'id']);
Route::get('beban-dtpr-download', [BebanDTRPController::class, 'download'])->name('beban-dtpr.download');
Route::resource('kependidikan', TenagaKependidikanController::class)->parameters(['kependidikan' => 'id']);
Route::get('kependidikan-download', [TenagaKependidikanController::class, 'download'])->name('kependidikan.download');

Route::resource('pendanaan', PendanaanController::class)->except('show')->parameters(['pendanaan' => 'id']);
Route::get('pendanaan-download', [PendanaanController::class, 'download'])->name('pendanaan.download');

Route::resource('aksesibilitas', AksesibilitasController::class)->except('show')->parameters(['aksesibilitas' => 'id']);
Route::get('aksesibilitas-download', [AksesibilitasController::class, 'download'])->name('aksesibilitas.download');

Route::resource('sarana', SaranaPrasaranaController::class)->except('show')->parameters(['sarana' => 'id']);
Route::get('sarana-download', [SaranaPrasaranaController::class, 'download'])->name('sarana.download');

Route::resource('ipk-lulusan', IPKLulusanController::class)->except('show')->parameters(['ipk-lulusan' => 'id']);
Route::get('ipk-lulusan-download', [IPKLulusanController::class, 'download'])->name('ipk-lulusan.download');

Route::resource('lulus-tw', KelulusanTepatWaktuController::class)->except('show')->parameters(['lulus-tw' => 'id']);
Route::get('ipk-lulusan-download', [KelulusanTepatWaktuController::class, 'download'])->name('lulus-tw.download');

Route::resource('kepuasan-pengguna', KepuasanPenggunaLulusanController::class)->except('show')->parameters(['kepuasan-pengguna' => 'id']);
Route::get('kepuasan-pengguna-download', [KepuasanPenggunaLulusanController::class, 'download'])->name('kepuasan-pengguna.download');

Route::resource('masa-tunggu', MasaTungguLulusanController::class)->except('show')->parameters(['masa-tunggu' => 'id']);
Route::get('masa-tunggu-download', [MasaTungguLulusanController::class, 'download'])->name('masa-tunggu.download');

Route::resource('kerja-lulusan', BidangKerjaLulusanController::class)->except('show')->parameters(['kerja-lulusan' => 'id']);
Route::get('kerja-lulusan-download', [BidangKerjaLulusanController::class, 'download'])->name('kerja-lulusan.download');

Route::resource('ppkm-dtpr', PPKMDariDTPRController::class)->except('show')->parameters(['ppkm_dtpr' => 'id']);
Route::get('ppkm-dtpr-download', [PPKMDariDTPRController::class, 'download'])->name('ppkm-dtpr.download');
