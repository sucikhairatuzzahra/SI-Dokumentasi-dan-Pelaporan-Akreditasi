@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kualifikasi Tenaga Kependidikan</h5>
                        <p class="m-b-0">Form Kualifikasi Tenaga Kependidikan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kualifikasi Tenaga Kependidikan</a>
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
                                    <h5>Form Kualifikasi Tenaga Kependidikan</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('kependidikan.update', $editData->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="jenis_tenaga_kependidikan">Jenis Tenaga Kependidikan</label>
                                            <input type="text" class="form-control" id="jenis_tenaga_kependidikan"
                                                name="jenis_tenaga_kependidikan"
                                                value="{{ $editData->jenis_tenaga_kependidikan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_kerja">Unit Kerja</label>
                                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                                                value="{{ $editData->unit_kerja }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="pt_unit">Unit Kerja</label>
                                            <input type="hidden" class="form-control" name="id_pt_unit"
                                                value="{{ $editData->ptUnit->id }}" required>
                                            <input type="text" class="form-control"
                                                value="{{ $editData->ptUnit->kode_pt_unit }}" disabled>
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
