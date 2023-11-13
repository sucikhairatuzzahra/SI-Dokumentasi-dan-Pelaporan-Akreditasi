@extends('admprodi.layout.app')
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
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('update-ppkm_dtpr', $editData->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="nama_dtpr">Nama DTPRs</label>
                                            <input type="text" class="form-control" id="nama_dtpr" name="nama_dtpr"
                                                value="{{ $editData->nama_dtpr }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="publikasi_infokom">Jumlah Publikasi bertema INFOKOM</label>
                                            <input type="text" class="form-control" id="publikasi_infokom"
                                                name="publikasi_infokom" value="{{ $editData->publikasi_infokom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="penelitian_infokom">Jumlah Penelitian bertema INFOKOM</label>
                                            <input type="text" class="form-control" id="penelitian_infokom"
                                                name="penelitian_infokom" value="{{ $editData->penelitian_infokom }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="penelitian_infokom_hki">Jumlah penelitian bertema INFOKOM yang
                                                mendapat HKI
                                                Pengabdian Pada Masy</label>
                                            <input type="text" class="form-control" id="penelitian_infokom_hki"
                                                name="penelitian_infokom_hki"
                                                value="{{ $editData->penelitian_infokom_hki }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="pkm_infokom_adobsi">Jumlah PkM bertema INFOKOM yang diadopsi
                                                masyarakat</label>
                                            <input type="text" class="form-control" id="pkm_infokom_adobsi"
                                                name="pkm_infokom_adobsi" value="{{ $editData->pkm_infokom_adobsi }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="pkm_infokom_hki">Jumlah PkM bertema INFOKOM yang mendapat
                                                HKI</label>
                                            <input type="text" class="form-control" id="pkm_infokom_hki"
                                                name="pkm_infokom_hki" value="{{ $editData->pkm_infokom_hki }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pt_unit">Id PT Unit</label>
                                            <select name="id_pt_unit" class="form-control">
                                                <option value="7">P3M</option>
                                                <option value="6">AKT</option>
                                                <option value="5">D3 MI</option>
                                                <option value="4">D4 TRPL</option>
                                                <option value="3">JUR.TI</option>
                                                <option value="2">SPM</option>
                                                <option value="1">PNP</option>
                                                <script>
                                                    document.getElementById('id_pt_unit').value = "{{ $editData->id_pt_unit }}";
                                                </script>
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
