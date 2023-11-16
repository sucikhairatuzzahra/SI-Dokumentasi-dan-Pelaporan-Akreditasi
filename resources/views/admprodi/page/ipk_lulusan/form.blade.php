@extends('admprodi.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">IPK Lulusan</h5>
                        <p class="m-b-0">Form IPK Lulusan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"> <i class="fa fa-home"></i> </a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#!">Luaran dan Capaian Tridarma</a>
                        </li> --}}
                        <li class="breadcrumb-item"><a href="#!">IPK Lulusan</a>
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
                                    <h5>Form IPK Lulusan</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="/simpan-ipklulusan" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="tahun_lulus">Tahun Lulus</label>
                                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_lulusan">Jumlah Lulusan</label>
                                            <input type="text" class="form-control" id="jumlah_lulusan"
                                                name="jumlah_lulusan">
                                        </div>
                                        <div class="form-group">
                                            <label for="ipk_min">IPK Minimal</label>
                                            <input type="text" class="form-control" id="ipk_min" name="ipk_min">
                                        </div>
                                        <div class="form-group">
                                            <label for="ipk_rata_rata">IPK Rata-Rata</label>
                                            <input type="text" class="form-control" id="ipk_rata_rata"
                                                name="ipk_rata_rata">
                                        </div>
                                        <div class="form-group">
                                            <label for="ipk_max">IPK Maksimal</label>
                                            <input type="text" class="form-control" id="ipk_max" name="ipk_max">
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
