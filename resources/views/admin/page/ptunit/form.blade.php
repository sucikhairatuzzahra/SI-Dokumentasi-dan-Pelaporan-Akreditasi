@extends('admin.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tahun Akademik</h5>
                        <p class="m-b-0">Form Tambah Tahun Akademik</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Tahun Akademik</a>
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
                                    <h5>Form Tambah PT Unit</h5>

                                </div>
                                <div class="card-block">
                                    <form action="/simpan-ptunit" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kode_pt_unit">Kode PT Unit</label>
                                            <input type="text" class="form-control" id="kode_pt_unit"
                                                name="kode_pt_unit">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pt_unit">Nama PT Unit</label>
                                            <input type="text" class="form-control" id="nama_pt_unit"
                                                name="nama_pt_unit">
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
