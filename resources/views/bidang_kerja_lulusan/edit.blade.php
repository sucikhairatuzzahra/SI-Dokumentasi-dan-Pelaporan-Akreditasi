@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kesesuaian Bidang Kerja Lulusan</h5>
                        <p class="m-b-0">Form Kesesuaian Bidang Kerja Lulusan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kesesuaian Bidang Kerja Lulusan</a>
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
                                    <h5>Form Kesesuaian Bidang Kerja Lulusan</h5>
                                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('kerja-lulusan.update', $editData->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="tahun_lulus">Tahun Lulus</label>
                                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus"
                                                value="{{ $editData->tahun_lulus }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_lulusan">Jumlah Lulusan</label>
                                            <input type="text" class="form-control" id="jumlah_lulusan"
                                                name="jumlah_lulusan" value="{{ $editData->jumlah_lulusan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="lulusan_terlacak">Jumlah Lulusan Yang Terlacak</label>
                                            <input type="text" class="form-control" id="lulusan_terlacak"
                                                name="lulusan_terlacak" value="{{ $editData->lulusan_terlacak }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_infokom">Jumlah Kerja Bidang Infokom</label>
                                            <input type="text" class="form-control" id="bidang_infokom"
                                                name="bidang_infokom" value="{{ $editData->bidang_infokom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang_noninfokom">Jumlah Kerja Bidang Non Infokom</label>
                                            <input type="text" class="form-control" id="bidang_noninfokom"
                                                name="bidang_noninfokom" value="{{ $editData->bidang_noninfokom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="internasional">Internasional</label>
                                            <input type="text" class="form-control" id="internasional"
                                                name="internasional" value="{{ $editData->internasional }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nasional">Nasional</label>
                                            <input type="text" class="form-control" id="nasional" name="nasional"
                                                value="{{ $editData->nasional }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="wirausaha">Wirausaha</label>
                                            <input type="text" class="form-control" id="wirausaha" name="wirausaha"
                                                value="{{ $editData->wirausaha }}">
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
