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
                                            <select name="nama_dosen" id="nama_dosen" class="form-control">
                                                @foreach ($idPegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}">
                                                        {{ $pegawai->nama_pegawai }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control" id="nama_dosen" name="nama_dosen"> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_induk_dosen">Nomor Induk Dosen</label>
                                            <input type="text" class="form-control" id="nomor_induk_dosen"
                                                name="nomor_induk_dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_nomor_induk_dosen">Jenis Nomor Induk Dosen</label>
                                            <select name="jenis_nomor_induk_dosen" class="form-control">
                                                <option value="NIDN">NIDN</option>
                                                <option value="NIDK">NIDK</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_level_pendidikan_tertinggi">Pendidikan Tertinggi</label>
                                            <select name="id_level_pendidikan_tertinggi" id="id_level_pendidikan_tertinggi"
                                                class="form-control">
                                                @foreach ($idLevelPddkns as $levelPddkn)
                                                    <option value="{{ $levelPddkn->id }}">
                                                        {{ $levelPddkn->nama_level_pendidikan }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <label for="kategori_dosen">Kategori Dosen</label>
                                            <select name="kode_kategori_dosen" id="kode_kategori_dosen"
                                                class="form-control">
                                                @foreach ($idKatDosens as $idKatDosen)
                                                    <option value="{{ $idKatDosen->id }}">
                                                        {{ $idKatDosen->kode_kategori_dosen }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pegawai">NIP</label>
                                            <select name="nip" id="nip" class="form-control">
                                                @foreach ($idPegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}">
                                                        {{ $pegawai->nip }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pt_unit">Unit Kerja</label>
                                            <input type="hidden" class="form-control" name="id_pt_unit"
                                                value="{{ $ptUnit->id }}" required>
                                            <input type="text" class="form-control" value="{{ $ptUnit->kode_pt_unit }}"
                                                disabled>
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
