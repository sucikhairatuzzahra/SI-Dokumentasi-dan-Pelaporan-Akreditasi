@extends('admprodi.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Aksesibilitas Data Dalam Sistem Informasi</h5>
                        <p class="m-b-0">Form Aksesibilitas Data Dalam Sistem Informasi</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Aksesibilitas Data Dalam Sistem Informasi</a>
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
                                    <h5>Form Aksesibilitas Data Dalam Sistem Informasi</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="/simpan-aksesibilitas" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="jenis_data">Jenis Data</label>
                                            <input type="text" class="form-control" id="jenis_data" name="jenis_data">
                                        </div>
                                        <div class="form-group">
                                            <label for="secara_manual">Secara Manual</label>
                                            <input type="text" class="form-control" id="secara_manual"
                                                name="secara_manual">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanpa_jrg">Dengan Komputer Tanpa Jaringan</label>
                                            <input type="text" class="form-control" id="tanpa_jrg" name="tanpa_jrg">
                                        </div>
                                        <div class="form-group">
                                            <label for="lan">Dengan Komputer Serta Dapat Diakses Melalui Jaringan Lokal
                                                (LAN)</label>
                                            <input type="text" class="form-control" id="lan" name="lan">
                                        </div>
                                        <div class="form-group">
                                            <label for="wan">Dengan Komputer Serta Dapat Diakses Melalui jaringan Luas
                                                (WAN)</label>
                                            <input type="text" class="form-control" id="wan" name="wan">
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_pt_unit">PT Unit</label>
                                            <select name="kode_pt_unit" id="kode_pt_unit" class="form-control">
                                                @foreach ($ptUnits as $idPtUnit)
                                                    <option value="{{ $idPtUnit->id }}">
                                                        {{ $idPtUnit->kode_pt_unit }}
                                                    </option>
                                                @endforeach
                                            </select>
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
