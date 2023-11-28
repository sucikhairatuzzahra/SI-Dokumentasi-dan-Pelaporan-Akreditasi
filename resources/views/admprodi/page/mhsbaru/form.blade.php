@extends('admprodi.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Jumlah Calon Mahasiswa Baru</h5>
                        <p class="m-b-0">Form Jumlah Calon Mahasiswa Baru</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#!">Luaran dan Capaian Tridarma</a>
                        </li> --}}
                        <li class="breadcrumb-item"><a href="#!">Jumlah Calon Mahasiswa Baru</a>
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
                                    <h5>Form Jumlah Calon Mahasiswa Baru</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form action="/simpan-cmb" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="thn_akademik">Tahun Akademik</label>
                                            <select name="tahun_akademik" id="tahun_akademik" class="form-control">
                                                @foreach ($tahunAkademiks as $tahunAkademik)
                                                    <option value="{{ $tahunAkademik->id }}" {{-- {{ $data->thn_akademik == $tahunAkademik->id ? 'selected' : '' }} --}}>
                                                        {{ $tahunAkademik->tahun_akademik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="daya_tampung">Daya Tampung</label>
                                            <input type="text" class="form-control" id="daya_tampung"
                                                name="daya_tampung">
                                        </div>
                                        <div class="form-group">
                                            <label for="pendaftar">Pendaftar</label>
                                            <input type="text" class="form-control" id="pendaftar" name="pendaftar">
                                        </div>
                                        <div class="form-group">
                                            <label for="lulus_seleksi">Lulus Seleksi</label>
                                            <input type="text" class="form-control" id="lulus_seleksi"
                                                name="lulus_seleksi">
                                        </div>
                                        <div class="form-group">
                                            <label for="maba_reguler">Mahasiswa Baru Reguler</label>
                                            <input type="text" class="form-control" id="maba_reguler"
                                                name="maba_reguler">
                                        </div>

                                        <div class="form-group">
                                            <label for="maba_transfer">Mahasiswa Baru Transfer</label>
                                            <input type="text" class="form-control" id="maba_transfer"
                                                name="maba_transfer">
                                        </div>
                                        <div class="form-group">
                                            <label for="mhs_aktif_reguler">Mahasiswa Aktif Reguler</label>
                                            <input type="text" class="form-control" id="mhs_aktif_reguler"
                                                name="mhs_aktif_reguler">
                                        </div>
                                        <div class="form-group">
                                            <label for="mhs_aktif_transfer">Mahasiswa Aktif Transfer</label>
                                            <input type="text" class="form-control" id="mhs_aktif_transfer"
                                                name="mhs_aktif_transfer">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pt_unit">Unit Kerja</label>
                                            <!-- Tambahkan hidden field untuk pt_unit -->
                                            <input type="hidden" name="id_pt_unit"
                                                value="{{ Auth::user()->kode_pt_unit }}">

                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="pt_unit">PT Unit</label>
                                            <select name="kode_pt_unit" id="kode_pt_unit" class="form-control">
                                                @foreach ($ptUnits as $idPtUnit)
                                                    <option value="{{ $idPtUnit->id }}">
                                                        {{ $idPtUnit->kode_pt_unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> --}}
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
