@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dosen</h5>
                        <p class="m-b-0">Form Tambah Dosen</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

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
                                    <h5>Form Tambah Dosen</h5>

                                </div>
                                <div class="card-block">
                                    <form action="{{ route('dosen.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="nama_dosen">Nama Dosen</label>
                                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_induk_dosen">Nomor Induk Dosen</label>
                                            <input type="text" class="form-control" id="nomor_induk_dosen"
                                                name="nomor_induk_dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_nomor_induk_dosen">Jenis Nomor Induk Dosen</label>
                                            <input type="text" class="form-control" id="jenis_nomor_induk_dosen"
                                                name="jenis_nomor_induk_dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_magister"> Pendidikan Magister</label>
                                            <input type="text" class="form-control" id="pendidikan_magister"
                                                name="pendidikan_magister">
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_doktor">Pendidikan Doktor</label>
                                            <input type="text" class="form-control" id="pendidikan_doktor"
                                                name="pendidikan_doktor">
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_keahlian">Bidang Keahlian</label>
                                            <input type="text" class="form-control" id="bidang_keahlian"
                                                name="bidang_keahlian">
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_akademik"> Jabatan Akademik</label>
                                            <input type="text" class="form-control" id="jabatan_akademik"
                                                name="jabatan_akademik">
                                        </div>
                                        <div class="form-group">
                                            <label for="sertifikat_pendidik_profesional">Sertifikat Pendidik
                                                Profesional</label>
                                            <input type="text" class="form-control" id="sertifikat_pendidik_profesional"
                                                name="sertifikat_pendidik_profesional">
                                        </div>
                                        <div class="form-group">
                                            <label for="sertifikat_kompetensi_profesi_industri">Sertifikat Kompetensi
                                                Profesi Industri</label>
                                            <input type="text" class="form-control"
                                                id="sertifikat_kompetensi_profesi_industri"
                                                name="sertifikat_kompetensi_profesi_industri">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                                    </form>
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
