<?php

use App\Http\Controllers\AksesibilitasController;
use App\Http\Controllers\CalonMhsBaru;
use App\Http\Controllers\PendanaanController;
use App\Http\Controllers\PenelitianPengabdian;
use App\Http\Controllers\SaranaPrasaranaController;
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
//route PPKM
Route::get('/', [PenelitianPengabdian::class, 'beranda'])->name('dashboard'); //home
Route::get('/ppkmadmin', [PenelitianPengabdian::class, 'ppkmadmin'])->name('ppkmadmin'); //index
Route::get('/tambah-ppkm', [PenelitianPengabdian::class, 'create'])->name('tambah-ppkm'); //create
Route::post('/simpan-ppkm', [PenelitianPengabdian::class, 'store'])->name('simpan-ppkm'); //store
Route::delete('/hapus-ppkm/{id}', [PenelitianPengabdian::class, 'destroy'])->name('hapus-ppkm'); //destroy

//route Calon Mahasiswa Baru
Route::get('/mhs-baru', [CalonMhsBaru::class, 'index'])->name('mhs-baru'); //index
Route::get('/tambah-cmb', [CalonMhsBaru::class, 'create'])->name('tambah-cmb'); //create
Route::post('/simpan-cmb', [CalonMhsBaru::class, 'store'])->name('simpan-cmb'); //store
Route::get('/edit-cmb/{id}', [CalonMhsBaru::class, 'edit'])->name('edit-cmb'); //edit
Route::put('/update-cmb/{id}', [CalonMhsBaru::class, 'update'])->name('update-cmb'); //update
Route::delete('/hapus-cmb/{id}', [CalonMhsBaru::class, 'destroy'])->name('hapus-cmb'); //destroy

//Aksesibilitas
Route::get('/aksesibilitas', [AksesibilitasController::class, 'index'])->name('aksesibilitas'); //index
Route::get('/tambah-aksesibilitas', [AksesibilitasController::class, 'create'])->name('tambah-aksesibilitas'); //create
Route::post('/simpan-aksesibilitas', [AksesibilitasController::class, 'store'])->name('simpan-aksesibilitas'); //store
Route::delete('/hapus-aksesibilitas/{id}', [AksesibilitasController::class, 'destroy'])->name('hapus-aksesibilitas'); //destroy

//Pendanaan
Route::get('/pendanaan', [PendanaanController::class, 'index'])->name('pendanaan'); //index
Route::get('/tambah-pendanaan', [PendanaanController::class, 'create'])->name('tambah-pendanaan'); //create
Route::post('/simpan-pendanaan', [PendanaanController::class, 'store'])->name('simpan-pendanaan'); //store
Route::delete('/hapus-pendanaan/{id}', [PendanaanController::class, 'destroy'])->name('hapus-pendanaan'); //destroy

//Sarana Prasarana
Route::get('/sarana', [SaranaPrasaranaController::class, 'index'])->name('sarana'); //index
Route::get('/tambah-sarana', [SaranaPrasaranaController::class, 'create'])->name('tambah-sarana'); //create
Route::post('/simpan-sarana', [SaranaPrasaranaController::class, 'store'])->name('simpan-sarana'); //store
Route::delete('/hapus-sarana/{id}', [SaranaPrasaranaController::class, 'destroy'])->name('hapus-sarana'); //destroy

// Route::get('/admin-program', [ProgramController::class, 'index'])->name('admin-program');
// Route::get('/tambah-program', [ProgramController::class, 'create'])->name('tambah-program');
// Route::post('/simpan-program', [ProgramController::class, 'store'])->name('simpan-program');
// Route::get('/edit-program/{program}', [ProgramController::class, 'edit'])->name('edit-program');
// Route::put('/update-program/{program}', [ProgramController::class, 'update'])->name('update-program');
// Route::delete('/hapus-program/{program}', [ProgramController::class, 'destroy'])->name('hapus-program');
