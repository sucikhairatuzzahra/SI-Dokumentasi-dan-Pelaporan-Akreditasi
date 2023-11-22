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
use App\Http\Controllers\PTUnitController;
use App\Http\Controllers\DosenController;
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
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Auth::routes();

//Route Jurusan
Route::middleware(['auth', 'user-role:jurusan'])->group(function () {
    Route::get('/home', [HomeController::class, 'jurusanHome'])->name('home');

    //route Calon Mahasiswa Baru
    Route::get('/jurusan-mahasiswa', [CalonMhsBaruController::class, 'index'])->name('jurusan-mahasiswa'); //index
        
    //Aksesibilitas
    Route::get('/jurusan-aksesibilitas', [AksesibilitasController::class, 'index'])->name('jurusan-aksesibilitas'); //index

    //Pendanaan
    Route::get('/jurusan-sumberdana', [PendanaanController::class, 'index'])->name('jurusan-sumberdana'); //index

    //Sarana Prasaranaki
    Route::get('/jurusan-saranaprasarana', [SaranaPrasaranaController::class, 'index'])->name('jurusan-saranaprasarana'); //index

    //Tenaga Kependidikan
    Route::get('/jurusan-kependidikan', [TenagaKependidikanController::class, 'index'])->name('jurusan-kependidikan'); //index

    //IPK Lulusan
    Route::get('/jurusan-ipklulusan', [IPKLulusanController::class, 'index'])->name('jurusan-ipklulusan'); //index

    //Masa Tunggu Lulusan Bekerja
    Route::get('/jurusan-masatunggu', [MasaTunguLulusanController::class, 'index'])->name('jurusan-masatunggu'); //index

    //Kesesuaian bidang kerja lulusan 
    Route::get('/jurusan-kerjalulusan', [BidangKerjaLulusanController::class, 'index'])->name('jurusan-kerjalulusan'); //index

    //Rata-Rata Beban DTPR Per Semester
    Route::get('/jurusan-bebandtpr', [BebanDTRPController::class, 'index'])->name('jurusan-bebandtpr'); //index

    //Kepuasan Pengguna Lulusan
    Route::get('/jurusan-kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'index'])->name('jurusan-kepuasan_pengguna'); //index

    //Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR
    Route::get('/jurusan-ppkm_dtpr', [PPKMDariDTPRController::class, 'index'])->name('jurusan-ppkm_dtpr'); //index

    //Kelulusan Tepat Waktu
    Route::get('/jurusan-kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'index'])->name('jurusan-kelulusan_tepatwaktu'); //index


   
});
// Kaprodi Route
Route::middleware(['auth', 'user-role:kaprodi'])->group(function () {
    //Home
    Route::get("/kaprodi-home", [HomeController::class, 'kaprodiHome'])->name('kaprodi-home');

    //route Calon Mahasiswa Baru
    Route::get('/kaprodi-mahasiswa', [CalonMhsBaruController::class, 'kaprodiIndex'])->name('kaprodi-mahasiswa'); //index
    Route::get('/mahasiswa-download', [CalonMhsBaruController::class, 'download'])->name('mahasiswa-download');

    //Aksesibilitas
    Route::get('/kaprodi-aksesibilitas', [AksesibilitasController::class, 'kaprodiIndex'])->name('kaprodi-aksesibilitas'); //index
    Route::get('/aksesibilitas-download', [AksesibilitasController::class, 'download'])->name('aksesibilitas-download');

    //Pendanaan
    Route::get('/kaprodi-sumberdana', [PendanaanController::class, 'kaprodiIndex'])->name('kaprodi-sumberdana'); //index
    Route::get('/sumberdana-download', [PendanaanController::class, 'download'])->name('sumberdana-download');

    //Sarana Prasaranaki
    Route::get('/kaprodi-saranaprasarana', [SaranaPrasaranaController::class, 'kaprodiIndex'])->name('kaprodi-saranaprasarana'); //index
    Route::get('/saranaprasarana-download', [SaranaPrasaranaController::class, 'download'])->name('saranaprasarana-download');

    //Tenaga Kependidikan
    Route::get('/kaprodi-kependidikan', [TenagaKependidikanController::class, 'kaprodiIndex'])->name('kaprodi-kependidikan'); //index
    Route::get('/kependidikan-download', [TenagaKependidikanController::class, 'download'])->name('kependidikan-download');

    //IPK Lulusan
    Route::get('/kaprodi-ipklulusan', [IPKLulusanController::class, 'kaprodiIndex'])->name('kaprodi-ipklulusan'); //index
    Route::get('/ipklulusan-download', [IPKLulusanController::class, 'download'])->name('ipklulusan-download');

    //Masa Tunggu Lulusan Bekerja
    Route::get('/kaprodi-masatunggu', [MasaTunguLulusanController::class, 'kaprodiIndex'])->name('kaprodi-masatunggu'); //index
    Route::get('/masatunggu-download', [MasaTunguLulusanController::class, 'download'])->name('masatunggu-download');

    //Kesesuaian bidang kerja lulusan 
    Route::get('/kaprodi-kerjalulusan', [BidangKerjaLulusanController::class, 'kaprodiIndex'])->name('kaprodi-kerjalulusan'); //index
    Route::get('/kerjalulusan-download', [BidangKerjaLulusanController::class, 'download'])->name('kerjalulusan-download');

    //Rata-Rata Beban DTPR Per Semester
    Route::get('/kaprodi-bebandtpr', [BebanDTRPController::class, 'kaprodiIndex'])->name('kaprodi-bebandtpr'); //index
    Route::get('/bebandtpr-download', [BebanDTRPController::class, 'download'])->name('bebandtpr-download');

    //Kepuasan Pengguna Lulusan
    Route::get('/kaprodi-kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'kaprodiIndex'])->name('kaprodi-kepuasan_pengguna'); //index
    Route::get('/kepuasan_pengguna-download', [KepuasanPenggunaLulusanController::class, 'download'])->name('kepuasan_pengguna-download');

    //Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR
    Route::get('/kaprodi-ppkm_dtpr', [PPKMDariDTPRController::class, 'kaprodiIndex'])->name('kaprodi-ppkm_dtpr'); //index
    Route::get('/ppkm_dtpr-download', [PPKMDariDTPRController::class, 'download'])->name('ppkm_dtpr-download');

    //Kelulusan Tepat Waktu
    Route::get('/kaprodi-kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'kaprodiIndex'])->name('kaprodi-kelulusan_tepatwaktu'); //index
    Route::get('/kelulusan_tepatwaktu-download', [KelulusanTepatWaktuController::class, 'download'])->name('kelulusan_tepatwaktu-download');
});

//Adm Prodi route
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    //home
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('dashboard');

    //user
    Route::get('/admin-users', [DashboardController::class,'index'])->name('admin-users');
    Route::get('/edit-users/{id}', [DashboardController::class, 'edit'])->name('edit-users');
    Route::put('/update-users/{id}', [DashboardController::class, 'update'])->name('update-users');
    Route::delete('/hapus-users/{id}', [DashboardController::class, 'destroy'])->name('hapus-users'); //destroy


    //tahun akademik
    Route::get('/tahun-akademik', [AdminController::class, 'index'])->name('tahun-akademik'); //index
    Route::get('/tambah-tahun_akademik', [AdminController::class, 'create'])->name('tambah-tahun_akademik'); //create
    Route::post('/simpan-tahun_akademik', [AdminController::class, 'store'])->name('simpan-tahun_akademik'); //store
    Route::delete('/hapus-tahun_akademik/{id}', [AdminController::class, 'destroy'])->name('hapus-tahun_akademik'); //destroy

    //PT Unit
    Route::get('/ptunit', [PTUnitController::class, 'index'])->name('ptunit'); //index
    Route::get('/tambah-ptunit', [PTUnitController::class, 'create'])->name('tambah-ptunit'); //create
    Route::post('/simpan-ptunit', [PTUnitController::class, 'store'])->name('simpan-ptunit'); //store
    Route::delete('/hapus-ptunit/{id}', [PTUnitController::class, 'destroy'])->name('hapus-ptunit'); //destroy

    //dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen'); //index
    Route::get('/tambah-dosen', [DosenController::class, 'create'])->name('tambah-dosen'); //create
    Route::post('/simpan-dosen', [DosenController::class, 'store'])->name('simpan-dosen'); //store
    Route::delete('/hapus-dosen/{id}', [DosenController::class, 'destroy'])->name('hapus-dosen'); //destroy


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
// Admin Route
Route::middleware(['auth', 'user-role:admprodi'])->group(function () {
   
    Route::get('/admprodi-home', [HomeController::class, 'admprodiHome'])->name('admprodi-home');
    //Dosen

    //Route PPKM
    Route::get('/ppkmadmin', [PenelitianPengabdian::class, 'ppkmadmin'])->name('ppkmadmin'); //index
    Route::get('/tambah-ppkm', [PenelitianPengabdian::class, 'create'])->name('tambah-ppkm'); //create
    Route::post('/simpan-ppkm', [PenelitianPengabdian::class, 'store'])->name('simpan-ppkm'); //store
    Route::delete('/hapus-ppkm/{id}', [PenelitianPengabdian::class, 'destroy'])->name('hapus-ppkm'); //destroy

    //route Calon Mahasiswa Baru
    Route::get('/mhs-baru', [CalonMhsBaruController::class, 'admprodiIndex'])->name('mhs-baru'); //index
    Route::get('/tambah-cmb', [CalonMhsBaruController::class, 'create'])->name('tambah-cmb'); //create
    Route::post('/simpan-cmb', [CalonMhsBaruController::class, 'store'])->name('simpan-cmb'); //store
    Route::get('/edit-cmb/{id}', [CalonMhsBaruController::class, 'edit'])->name('edit-cmb'); //edit
    Route::put('/update-cmb/{id}', [CalonMhsBaruController::class, 'update'])->name('update-cmb'); //update
    Route::delete('/hapus-cmb/{id}', [CalonMhsBaruController::class, 'destroy'])->name('hapus-cmb'); //destroy

    //Aksesibilitas
    Route::get('/aksesibilitas', [AksesibilitasController::class, 'admprodiIndex'])->name('aksesibilitas'); //index
    Route::get('/tambah-aksesibilitas', [AksesibilitasController::class, 'create'])->name('tambah-aksesibilitas'); //create
    Route::post('/simpan-aksesibilitas', [AksesibilitasController::class, 'store'])->name('simpan-aksesibilitas'); //store
    Route::get('/edit-aksesibilitas/{id}', [AksesibilitasController::class, 'edit'])->name('edit-aksesibilitas');
    Route::put('/update-aksesibilitas/{id}', [AksesibilitasController::class, 'update'])->name('update-aksesibilitas');
    Route::delete('/hapus-aksesibilitas/{id}', [AksesibilitasController::class, 'destroy'])->name('hapus-aksesibilitas'); //destroy

    //Pendanaan
    Route::get('/pendanaan', [PendanaanController::class, 'admprodiIndex'])->name('pendanaan'); //index
    Route::get('/tambah-pendanaan', [PendanaanController::class, 'create'])->name('tambah-pendanaan'); //create
    Route::post('/simpan-pendanaan', [PendanaanController::class, 'store'])->name('simpan-pendanaan'); //store
    Route::get('/edit-pendanaan/{id}', [PendanaanController::class, 'edit'])->name('edit-pendanaan');
    Route::put('/update-pendanaan/{id}', [PendanaanController::class, 'update'])->name('update-pendanaan');
    Route::delete('/hapus-pendanaan/{id}', [PendanaanController::class, 'destroy'])->name('hapus-pendanaan'); //destroy

    //Sarana Prasarana
    Route::get('/sarana', [SaranaPrasaranaController::class, 'admprodiIndex'])->name('sarana'); //index
    Route::get('/tambah-sarana', [SaranaPrasaranaController::class, 'create'])->name('tambah-sarana'); //create
    Route::post('/simpan-sarana', [SaranaPrasaranaController::class, 'store'])->name('simpan-sarana'); //store
    Route::get('/edit-sarana/{id}', [SaranaPrasaranaController::class, 'edit'])->name('edit-sarana');
    Route::put('/update-sarana/{id}', [SaranaPrasaranaController::class, 'update'])->name('update-sarana');
    Route::delete('/hapus-sarana/{id}', [SaranaPrasaranaController::class, 'destroy'])->name('hapus-sarana'); //destroy

    //Tenaga Kependidikan
    Route::get('/kependidikan', [TenagaKependidikanController::class, 'admprodiIndex'])->name('kependidikan'); //index
    Route::get('/tambah-kependidikan', [TenagaKependidikanController::class, 'create'])->name('tambah-kependidikan'); //create
    Route::post('/simpan-kependidikan', [TenagaKependidikanController::class, 'store'])->name('simpan-kependidikan'); //store
    Route::get('/edit-kependidikan/{id}', [TenagaKependidikanController::class, 'edit'])->name('edit-kependidikan');
    Route::put('/update-kependidikan/{id}', [TenagaKependidikanController::class, 'update'])->name('update-kependidikan');
    Route::delete('/hapus-kependidikan/{id}', [TenagaKependidikanController::class, 'destroy'])->name('hapus-kependidikan'); //destroy
    Route::get('/kependidikan/ptunit/{ptunitid}', [TenagaKependidikanController::class, 'byPtUnit'])->name('kependidikanbyptunit');


    Route::get('/kependidikan/{id}/tambah', [JumlahTenagaKependidikanController::class, 'create'])->name('tambahjmlkependidikan'); //create
    Route::post('/kependidikan/{id}/simpan', [JumlahTenagaKependidikanController::class, 'store'])->name('simpanjmlkependidikan'); //store
    Route::get('/kependidikan/{id}/edit', [JumlahTenagaKependidikanController::class, 'edit'])->name('editjmlkependidikan');
    Route::put('/kependidikan/{id}/update', [JumlahTenagaKependidikanController::class, 'update'])->name('updatejmlkependidikan');
    Route::delete('/kependidikan/{id}/hapus', [JumlahTenagaKependidikanController::class, 'destroy'])->name('hapusjmlkependidikan'); //destroy

    //IPK Lulusan
    Route::get('/ipklulusan', [IPKLulusanController::class, 'admprodiIndex'])->name('ipklulusan'); //index
    Route::get('/tambah-ipklulusan', [IPKLulusanController::class, 'create'])->name('tambah-ipklulusan'); //create
    Route::post('/simpan-ipklulusan', [IPKLulusanController::class, 'store'])->name('simpan-ipklulusan'); //store
    Route::get('/edit-ipklulusan/{id}', [IPKLulusanController::class, 'edit'])->name('edit-ipklulusan');
    Route::put('/update-ipklulusan/{id}', [IPKLulusanController::class, 'update'])->name('update-ipklulusan');
    Route::delete('/hapus-ipklulusan/{id}', [IPKLulusanController::class, 'destroy'])->name('hapus-ipklulusan'); //destroy

    //Masa Tunggu Lulusan Bekerja
    Route::get('/masatunggu', [MasaTunguLulusanController::class, 'admprodiIndex'])->name('masatunggu'); //index
    Route::get('/tambah-masatunggu', [MasaTunguLulusanController::class, 'create'])->name('tambah-masatunggu'); //create
    Route::post('/simpan-masatunggu', [MasaTunguLulusanController::class, 'store'])->name('simpan-masatunggu'); //store
    Route::get('/edit-masatunggu/{id}', [MasaTunguLulusanController::class, 'edit'])->name('edit-masatunggu');
    Route::put('/update-masatunggu/{id}', [MasaTunguLulusanController::class, 'update'])->name('update-masatunggu');
    Route::delete('/hapus-masatunggu/{id}', [MasaTunguLulusanController::class, 'destroy'])->name('hapus-masatunggu'); //destroy

    //Kesesuaian bidang kerja lulusan 
    Route::get('/kerjalulusan', [BidangKerjaLulusanController::class, 'admprodiIndex'])->name('kerjalulusan'); //index
    Route::get('/tambah-kerjalulusan', [BidangKerjaLulusanController::class, 'create'])->name('tambah-kerjalulusan'); //create
    Route::post('/simpan-kerjalulusan', [BidangKerjaLulusanController::class, 'store'])->name('simpan-kerjalulusan'); //store
    Route::get('/edit-kerjalulusan/{id}', [BidangKerjaLulusanController::class, 'edit'])->name('edit-kerjalulusan');
    Route::put('/update-kerjalulusan/{id}', [BidangKerjaLulusanController::class, 'update'])->name('update-kerjalulusan');
    Route::delete('/hapus-kerjalulusan/{id}', [BidangKerjaLulusanController::class, 'destroy'])->name('hapus-kerjalulusan'); //destroy

    //Rata-Rata Beban DTPR Per Semester
    Route::get('/bebandtpr', [BebanDTRPController::class, 'admprodiIndex'])->name('bebandtpr'); //index
    Route::get('/tambah-bebandtpr', [BebanDTRPController::class, 'create'])->name('tambah-bebandtpr'); //create
    Route::post('/simpan-bebandtpr', [BebanDTRPController::class, 'store'])->name('simpan-bebandtpr'); //store
    Route::get('/edit-bebandtpr/{id}', [BebanDTRPController::class, 'edit'])->name('edit-bebandtpr');
    Route::put('/update-bebandtpr/{id}', [BebanDTRPController::class, 'update'])->name('update-bebandtpr');
    Route::delete('/hapus-bebandtpr/{id}', [BebanDTRPController::class, 'destroy'])->name('hapus-bebandtpr'); //destroy

    //Kepuasan Pengguna Lulusan
    Route::get('/kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'admprodiIndex'])->name('kepuasan_pengguna'); //index
    Route::get('/tambah-kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'create'])->name('tambah-kepuasan_pengguna'); //create
    Route::post('/simpan-kepuasan_pengguna', [KepuasanPenggunaLulusanController::class, 'store'])->name('simpan-kepuasan_pengguna'); //store
    Route::get('/edit-kepuasan_pengguna/{id}', [KepuasanPenggunaLulusanController::class, 'edit'])->name('edit-kepuasan_pengguna');
    Route::put('/update-kepuasan_pengguna/{id}', [KepuasanPenggunaLulusanController::class, 'update'])->name('update-kepuasan_pengguna');
    Route::delete('/hapus-kepuasan_pengguna/{id}', [KepuasanPenggunaLulusanController::class, 'destroy'])->name('hapus-kepuasan_pengguna'); //destroy

    //Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR
    Route::get('/ppkm_dtpr', [PPKMDariDTPRController::class, 'admprodiIndex'])->name('ppkm_dtpr'); //index
    Route::get('/tambah-ppkm_dtpr', [PPKMDariDTPRController::class, 'create'])->name('tambah-ppkm_dtpr'); //create
    Route::post('/simpan-ppkm_dtpr', [PPKMDariDTPRController::class, 'store'])->name('simpan-ppkm_dtpr'); //store
    Route::get('/edit-ppkm_dtpr/{id}', [PPKMDariDTPRController::class, 'edit'])->name('edit-ppkm_dtpr');
    Route::put('/update-ppkm_dtpr/{id}', [PPKMDariDTPRController::class, 'update'])->name('update-ppkm_dtpr');
    Route::delete('/hapus-ppkm_dtpr/{id}', [PPKMDariDTPRController::class, 'destroy'])->name('hapus-ppkm_dtpr'); //destroy

    //Kelulusan Tepat Waktu
    Route::get('/kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'admprodiIndex'])->name('kelulusan_tepatwaktu'); //index
    Route::get('/tambah-kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'create'])->name('tambah-kelulusan_tepatwaktu'); //create
    Route::post('/simpan-kelulusan_tepatwaktu', [KelulusanTepatWaktuController::class, 'store'])->name('simpan-kelulusan_tepatwaktu'); //store
    Route::get('/edit-kelulusan_tepatwaktu/{id}', [KelulusanTepatWaktuController::class, 'edit'])->name('edit-kelulusan_tepatwaktu');
    Route::put('/update-kelulusan_tepatwaktu/{id}', [KelulusanTepatWaktuController::class, 'update'])->name('update-kelulusan_tepatwaktu');
    Route::delete('/hapus-kelulusan_tepatwaktu/{id}', [KelulusanTepatWaktuController::class, 'destroy'])->name('hapus-kelulusan_tepatwaktu'); //destroy

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
