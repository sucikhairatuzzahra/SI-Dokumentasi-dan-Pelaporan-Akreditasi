@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Rata-rata Beban DTPR</h5>
                        <p class="m-b-0">Data Rata-rata Beban DTPR</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#!">Luaran dan Capaian Tridarma</a>
                        </li> --}}
                        <li class="breadcrumb-item"><a href="#!">Rata-rata Beban DTPR</a>
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
                                    <h5>Form Rata-rata Beban DTPR</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('beban-dtpr.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_dosen">Nama Dosen</label>
                                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="pgjrn_ps_sendiri">SKS Pengajaran Pada PS Sendiri</label>
                                            <input type="text" class="form-control" id="pgjrn_ps_sendiri"
                                                name="pgjrn_ps_sendiri">
                                        </div>
                                        <div class="form-group">
                                            <label for="pgjrn_ps_lain_pt_sendiri">SKS Pengajaran Pada PS Lain PT
                                                Sendiri</label>
                                            <input type="text" class="form-control" id="pgjrn_ps_lain_pt_sendiri"
                                                name="pgjrn_ps_lain_pt_sendiri">
                                        </div>
                                        <div class="form-group">
                                            <label for="pgjrn_pt_lain">SKS Pengajaran Pada PT Lain</label>
                                            <input type="text" class="form-control" id="pgjrn_pt_lain"
                                                name="pgjrn_pt_lain">
                                        </div>
                                        <div class="form-group">
                                            <label for="sks_penelitian">SKS Penelitian</label>
                                            <input type="text" class="form-control" id="sks_penelitian"
                                                name="sks_penelitian">
                                        </div>
                                        <div class="form-group">
                                            <label for="sks_pengabdian">SKS Pengabdian Pada Masyarakat</label>
                                            <input type="text" class="form-control" id="sks_pengabdian"
                                                name="sks_pengabdian">
                                        </div>
                                        <div class="form-group">
                                            <label for="manajemen_pt_sendiri">SKS Manajemen PT Sendiri</label>
                                            <input type="text" class="form-control" id="manajemen_pt_sendiri"
                                                name="manajemen_pt_sendiri">
                                        </div>
                                        <div class="form-group">
                                            <label for="manajemen_pt_lain">SKS Manajemen PT Lain</label>
                                            <input type="text" class="form-control" id="manajemen_pt_lain"
                                                name="manajemen_pt_lain">
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
