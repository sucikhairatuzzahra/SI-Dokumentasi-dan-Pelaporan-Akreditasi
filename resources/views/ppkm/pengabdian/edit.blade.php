@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Form Pengabdian Infokom</p>
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
                                    <h5>Form Pengabdian Infokom</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('ppkm-pengabdian.update', $editData->id) }}" method="POST">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun"
                                                value="{{ $editData->tahun }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="{{ $editData->judul }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenis_sumber_pembiayaan">Jenis Sumber Pembiayaan</label>
                                            <select name="jenis_sumber_pembiayaan" id="jenis_sumber_pembiayaan"
                                                class="form-control">
                                                @foreach ($pembiayaans as $pembiayaan)
                                                    <option value="{{ $pembiayaan->id }}"
                                                        {{ $editData->id_jenis_sumber_pembiayaan == $pembiayaan->id ? 'selected' : '' }}>
                                                        {{ $pembiayaan->jenis_sumber_pembiayaan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="sumber_pembiayaan">Sumber Pembiayaan</label>
                                            <input type="text" class="form-control" id="sumber_pembiayaan"
                                                name="sumber_pembiayaan" value="{{ $editData->sumber_pembiayaan }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="adobsi_masy">Adobsi Masyarakat</label>
                                            <select name="adobsi_masy" class="form-control">
                                                <option value="{{ $editData->adopsi_masy }}">{{ $editData->adopsi_masy }}
                                                </option>
                                                <option value="ya">ya</option>
                                                <option value="tidak">tidak</option>
                                            </select>
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
