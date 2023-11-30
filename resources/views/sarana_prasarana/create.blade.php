@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Pendayagunaan Sarana dan Prasarana Utama</h5>
                        <p class="m-b-0">Form Pendayagunaan Sarana dan Prasarana Utama</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Pendayagunaan Sarana dan Prasarana Utama</a>
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
                                    <h5>Form Pendayagunaan Sarana dan Prasarana Utama</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('sarana.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="sarana">Sarana/Prasarana</label>
                                            <input type="text" class="form-control" id="sarana" name="sarana">
                                        </div>
                                        <div class="form-group">
                                            <label for="daya_tampung">Daya Tampung</label>
                                            <input type="text" class="form-control" id="daya_tampung"
                                                name="daya_tampung">
                                        </div>
                                        <div class="form-group">
                                            <label for="luas_ruang">Luas Ruang (m2)</label>
                                            <input type="text" class="form-control" id="luas_ruang" name="luas_ruang">
                                        </div>
                                        <div class="form-group">
                                            <label for="jml_mhs">Jumlah Mahasiswa yang Dilayani</label>
                                            <input type="text" class="form-control" id="jml_mhs" name="jml_mhs">
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_lyn">Jam Layanan</label>
                                            <input type="text" class="form-control" id="jam_lyn" name="jam_lyn">
                                        </div>
                                        <div class="form-group">
                                            <label for="perangkat">Perangkat Yang Dimiliki</label>
                                            <textarea class="form-control" id="perangkat" name="perangkat" rows="4"></textarea>
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
