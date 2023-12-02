@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Pegawai</h5>
                        <p class="m-b-0">Form Tambah Pegawai</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Pegawai</a>
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
                                    <h5>Form Tambah Pegawai</h5>

                                </div>
                                <div class="card-block">
                                    <form action="{{ route('pegawai.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="nama_pegawai">Nama Pegawai</label>
                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                                value="{{ old('nama_pegawai') }}" required>
                                            <p class="text-danger">{{ $errors->first('nama_pegawai') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                            <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">Nomor Induk Pegawai</label>
                                            <input type="text" class="form-control" id="nip" name="nip"
                                                value="{{ old('nip') }}" required>
                                            <p class="text-danger">{{ $errors->first('nip') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Aktif</label>
                                            <select name="aktif" class="form-control" required>
                                                <option value="ya" {{ old('aktif') == 'ya' ? 'selected' : '' }}>Ya
                                                </option>
                                                <option value="tidak" {{ old('aktif') == 'ya' ? 'selected' : '' }}>Tidak
                                                </option>
                                            </select>
                                            <p class="text-danger">{{ $errors->first('aktif') }}</p>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                    <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
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
