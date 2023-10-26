@extends('jurusan.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Data Kriteria LAM Infokom</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="#!">Provinsi</a> --}}
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Kriteria</h5>
                            <span>use class <code>table</code> inside table element</span>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">

                                {{-- <a href="{{ route('list.provinsi') }}" type="submit" class="btn btn-primary"
                                    style="margin-bottom:10px ">Tambah</a> --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">
                                                <b>Kriteria</b>
                                            </th>
                                            <th scope="col">
                                                <b>Nama Kriteria</b>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td>Kriteria 1</td>
                                            <td><a href="#">Visi, Misi, Tujuan dan Strategi</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 2</td>
                                            <td><a href="#">Tata Pamong, Tata Kelola, dan Kerjasama</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 3</td>
                                            <td><a href="{{ route('mhs-baru') }}">Mahasiswa</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 4</td>
                                            <td><a href="{{ route('bebandtpr') }}">Sumber Daya Manusia</a> </td>
                                            {{-- <td><a href="{{ route('bebandtpr') }}">Rata-rata beban
                                                    DTPR </a> </td>
                                        <tr>
                                            <td><a href="{{ route('kependidikan') }}">Kualifikasi
                                                    Tenaga Kependidikan</a></td>
                                        </tr> --}}
                                        </tr>
                                        <tr>
                                            <td>Kriteria 5</td>
                                            <td><a href="{{ route('pendanaan') }}">Keuangan, Sarana dan Prasarana</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 6</td>
                                            <td><a href="#">Pendidikan</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 7</td>
                                            <td><a href="#">Penelitian</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 8</td>
                                            <td><a href="#"> Pengabdian Kepada Masyarakat</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kriteria 9</td>
                                            <td><a href="{{ route('ipklulusan') }}">Luaran dan Capaian Tridarma</a></td>
                                        </tr>
                                    </tbody>

                                </table>
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
