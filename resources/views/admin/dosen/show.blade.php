@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dosen</h5>
                        <p class="m-b-0">Form Dosen</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"> <i class="fa fa-home"></i> </a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#!">Luaran dan Capaian Tridarma</a>
                        </li> --}}
                        <li class="breadcrumb-item"><a href="#!">Dosen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Form Dosen</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label for="nama_dosen">Nama Dosen</label>
                                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen"
                                            value="{{ $editData->nama_dosen }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_induk_dosen">Nomor Induk Dosen</label>
                                        <input type="text" class="form-control" id="nomor_induk_dosen"
                                            name="nomor_induk_dosen" value="{{ $editData->nomor_induk_dosen }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_nomor_induk_dosen">Jenis Nomor Induk Dosen</label>
                                        <input type="text" class="form-control" id="jenis_nomor_induk_dosen"
                                            name="jenis_nomor_induk_dosen"
                                            value="{{ $editData->jenis_nomor_induk_dosen }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan_magister"> Pendidikan Magister</label>
                                        <input type="text" class="form-control" id="pendidikan_magister"
                                            name="pendidikan_magister" value="{{ $editData->pendidikan_magister }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan_doktor">Pendidikan Doktor</label>
                                        <input type="text" class="form-control" id="pendidikan_doktor"
                                            name="pendidikan_doktor" value="{{ $editData->pendidikan_doktor }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="bidang_keahlian">Bidang Keahlian</label>
                                        <input type="text" class="form-control" id="bidang_keahlian"
                                            name="bidang_keahlian" value="{{ $editData->bidang_keahlian }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_akademik"> Jabatan Akademik</label>
                                        <input type="text" class="form-control" id="jabatan_akademik"
                                            name="jabatan_akademik" value="{{ $editData->jabatan_akademik }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="sertifikat_pendidik_profesional">Sertifikat Pendidik
                                            Profesional</label>
                                        <input type="text" class="form-control" id="sertifikat_pendidik_profesional"
                                            name="sertifikat_pendidik_profesional"
                                            value="{{ $editData->sertifikat_pendidik_profesional }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="sertifikat_kompetensi_profesi_industri">Sertifikat Kompetensi
                                            Profesi Industri</label>
                                        <input type="text" class="form-control"
                                            id="sertifikat_kompetensi_profesi_industri"
                                            name="sertifikat_kompetensi_profesi_industri"
                                            value="{{ $editData->sertifikat_kompetensi_profesi_industri }}" disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic table card end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <!-- Main-body end -->

    <div id="styleSelector">

    </div>
    </div>
@endsection
