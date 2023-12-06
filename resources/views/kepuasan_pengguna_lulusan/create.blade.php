@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kepuasan Pengguna Lulusan</h5>
                        <p class="m-b-0">Form Kepuasan Pengguna Lulusan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kepuasan Pengguna Lulusan</a>
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
                                    <h5>Form Kepuasan Pengguna Lulusan</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('kepuasan-pengguna.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="jenis_kemampuan">Jenis Kemampuan</label>
                                            <input type="text" class="form-control" id="jenis_kemampuan"
                                                name="jenis_kemampuan">
                                        </div>
                                        <div class="form-group">
                                            <label for="sangat_baik">Sangat Baik</label>
                                            <input type="text" class="form-control" id="sangat_baik" name="sangat_baik">
                                        </div>
                                        <div class="form-group">
                                            <label for="baik">Baik</label>
                                            <input type="text" class="form-control" id="baik" name="baik">
                                        </div>
                                        <div class="form-group">
                                            <label for="cukup">Cukup</label>
                                            <input type="text" class="form-control" id="cukup" name="cukup">
                                        </div>
                                        <div class="form-group">
                                            <label for="kurang">Kurang</label>
                                            <input type="text" class="form-control" id="kurang" name="kurang">
                                        </div>
                                        <div class="form-group">
                                            <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut Oleh UPPS/PS</label>
                                            <input type="text" class="form-control" id="rencana_tindak_lanjut"
                                                name="rencana_tindak_lanjut">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pt_unit">Unit Kerja</label>
                                            <input type="hidden" class="form-control" name="id_pt_unit"
                                                value="{{ $ptUnit->id }}" required>
                                            <input type="text" class="form-control" value="{{ $ptUnit->kode_pt_unit }}"
                                                disabled>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                    <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
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
