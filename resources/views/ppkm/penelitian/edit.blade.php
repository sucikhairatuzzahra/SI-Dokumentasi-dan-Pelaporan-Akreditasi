@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Form Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</p>
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
                                    <h5>Form Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('ppkm-penelitian.update', $editData->id) }}" method="POST">
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

                                        {{-- <div class="form-group">
                                            <label for="jenis_penelitian_pengabdian">Jenis Penelitian Pengabdian</label>
                                            <select name="jenis_penelitian_pengabdian" class="form-control">
                                                <option value="penelitian">penelitian</option>
                                                <option value="pengabdian">pengabdian</option>
                                            </select>
                                        </div> --}}
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
