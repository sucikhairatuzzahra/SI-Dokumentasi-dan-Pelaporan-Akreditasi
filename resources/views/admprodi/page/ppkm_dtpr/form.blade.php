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
                                    <form action="/simpan-ppkm_dtpr" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_dtpr">Nama DTPRs</label>
                                            <input type="text" class="form-control" id="nama_dtpr" name="nama_dtpr">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_penelitian_pengabdian">Jenis Penelitian Pengabdian</label>
                                            <select name="jenis_penelitian_pengabdian" class="form-control">
                                                <option value="penelitian">penelitian</option>
                                                <option value="pengabdian">pengabdian</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="ketua">Ketua</label>
                                            <select name="ketua" class="form-control">
                                                <option value="ya">ya</option>
                                                <option value="tidak">tidak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_luaran">Jenis Luaran</label>
                                            <select name="jenis_luaran" id="jenis_luaran" class="form-control">
                                                @foreach ($luarans as $luaran)
                                                    <option value="{{ $luaran->id }}">
                                                        {{ $luaran->jenis_luaran }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_luaran_lain">Jenis Luaran Lain</label>
                                            <select name="jenis_luaran_lain" id="jenis_luaran_lain" class="form-control">
                                                @foreach ($luaranlains as $luaranLain)
                                                    <option value="{{ $luaranLain->id }}">
                                                        {{ $luaranLain->jenis_luaran_lain }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun">
                                        </div>
                                        <div class="form-group">
                                            <label for="dana">Dana</label>
                                            <input type="text" class="form-control" id="dana" name="dana">
                                        </div>
                                        <div class="form-group">
                                            <label for="bukti">Bukti</label>
                                            <input type="file" name="bukti" id="bukti" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pt_unit">Unit Kerja</label>
                                            <input type="hidden" name="id_pt_unit"
                                                value="{{ Auth::user()->kode_pt_unit }}">
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
