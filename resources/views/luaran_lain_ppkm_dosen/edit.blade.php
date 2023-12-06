@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Form Hak Kekayaan Intelektual Dosen</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Penelitian dan Kegiatan Pengabdian kepada Masyarakat
                                dari DTPR</a>
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
                                    <h5>Form Hak Kekayaan Intelektual Dosen</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('luaran-lain-ppkm-dosen.update', $editData->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="id_luaran_lain_ppkm">Judul HKI</label>
                                            <select name="id_luaran_lain_ppkm" class="form-control">
                                                @foreach ($luaranLainPpkm as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('id_luaran_lain_ppkm') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->judul_luaran_lain_ppkm }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('id_luaran_ppkm') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_dosen">Nama Dosen</label>
                                            <select name="id_dosen" class="form-control">
                                                @foreach ($dosens as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('id_dosen') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->pegawai->nama_pegawai }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('id_dosen') }}</p>
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
