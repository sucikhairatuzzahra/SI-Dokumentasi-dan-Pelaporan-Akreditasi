@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Form Publikasi PPKM Infokom</p>
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
                                    <h5>Form Publikasi PPKM Infokom</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('luaran-lain-ppkm.update', $editData->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun"
                                                value="{{ $editData->tahun }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_ppkm">Judul PPKM</label>
                                            <select name="id_ppkm" class="form-control">
                                                @foreach ($ppkm as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('id_ppkm') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->judul }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenis_luaran_lain">Jenis Hak Kekayaan Intelektuan</label>
                                            <select name="jenis_luaran_lain" id="jenis_luaran_lain" class="form-control">
                                                @foreach ($jenisLuaranLains as $jenisLuaranLain)
                                                    <option value="{{ $jenisLuaranLain->id }}"
                                                        {{ $editData->id_jenis_luaran_lain == $jenisLuaranLain->id ? 'selected' : '' }}>
                                                        {{ $jenisLuaranLain->jenis_luaran_lain }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="judul_luaran_lain">Judul Hak Kekayaan Intelektuan</label>
                                            <input type="text" class="form-control" id="judul_luaran_lain"
                                                name="judul_luaran_lain" value="{{ $editData->judul_luaran_lain }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                                value="{{ $editData->keterangan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_sitasi">Jumlah Sitasi</label>
                                            <input type="text" class="form-control" id="jumlah_sitasi"
                                                name="jumlah_sitasi" value="{{ $editData->jumlah_sitasi }}">
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
