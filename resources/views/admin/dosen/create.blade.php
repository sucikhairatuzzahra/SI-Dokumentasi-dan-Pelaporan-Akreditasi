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
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <form action="{{ route('dosen.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="id_pegawai">Nama Dosen</label>
                                            <select name="id_pegawai" class="form-control" required>
                                                @foreach ($idPegawais as $pegawai)
                                                    <option value="{{ $pegawai->id }}"
                                                        {{ old('id_pegawai') == $pegawai->id ? 'selected' : '' }}>
                                                        {{ $pegawai->nama_pegawai }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_induk_dosen">Nomor Induk Dosen</label>
                                            <input type="text" class="form-control" name="nomor_induk_dosen"
                                                value="{{ old('nomor_induk_dosen') }}" required>
                                            <p class="text-danger">{{ $errors->first('nomor_induk_dosen') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_nid">Jenis Nomor Induk Dosen</label>
                                            <select name="jenis_nid" class="form-control">
                                                <option value="NIDN" {{ old('jenis_nid') == 'NIDN' ? 'selected' : '' }}>
                                                    NIDN
                                                </option>
                                                <option value="NIDK" {{ old('jenis_nid') == 'NIDN' ? 'selected' : '' }}>
                                                    NIDK
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="level_pendidikan_tertinggi">Pendidikan Tertinggi</label>
                                            <select name="level_pendidikan_tertinggi" class="form-control">
                                                @foreach ($idLevelPddkns as $levelPddkn)
                                                    <option value="{{ $levelPddkn->id }}"
                                                        {{ old('id_level_pendidikan_tertinggi') == $levelPddkn->id ? 'selected' : '' }}>
                                                        {{ $levelPddkn->nama_level_pendidikan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_magister"> Pendidikan Magister</label>
                                            <input type="text" class="form-control" name="pendidikan_magister"
                                                value="{{ old('pendidikan_magister') }}" required>
                                            <p class="text-danger">{{ $errors->first('pendidikan_magister') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_doktor">Pendidikan Doktor</label>
                                            <input type="text" class="form-control" name="pendidikan_doktor"
                                                value="{{ old('pendidikan_doktor') }}" required>
                                            <p class="text-danger">{{ $errors->first('pendidikan_doktor') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_keahlian">Bidang Keahlian</label>
                                            <input type="text" class="form-control" name="bidang_keahlian"
                                                value="{{ old('bidang_keahlian') }}" required>
                                            <p class="text-danger">{{ $errors->first('bidang_keahlian') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_akademik"> Jabatan Akademik</label>
                                            <input type="text" class="form-control" name="jabatan_akademik"
                                                value="{{ old('jabatan_akademik') }}" required>
                                            <p class="text-danger">{{ $errors->first('jabatan_akademik') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori_dosen">Kategori Dosen</label>
                                            <select name="kode_kategori_dosen" class="form-control">
                                                @foreach ($idKatDosens as $idKatDosen)
                                                    <option value="{{ $idKatDosen->id }}"
                                                        {{ old('kode_kategori_dosen') == $idKatDosen->id ? 'selected' : '' }}>
                                                        {{ $idKatDosen->kode_kategori_dosen }}
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
                                        <a href="{{ route('dosen.index') }}" class="btn btn-light">Cancel</a>
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
