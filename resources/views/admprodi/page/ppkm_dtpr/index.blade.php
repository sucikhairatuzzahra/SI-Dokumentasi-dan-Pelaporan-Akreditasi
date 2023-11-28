@extends('admprodi.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Data Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">PPKM DTPR</a>
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
                            <h5>Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                            <a href="{{ route('tambah-ppkm_dtpr') }}">
                                <span>Tambah data <code>disini</code> </span>
                            </a>

                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>

                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th scope="col">
                                                No
                                            </th>
                                            <th scope="col">
                                                Nama DTPRs
                                            </th>
                                            <th scope="col">
                                                Jumlah Publikasi bertema INFOKOM
                                            </th>
                                            <th scope="col">
                                                Jumlah Penelitian bertema INFOKOM
                                            </th>
                                            <th scope="col">
                                                Jumlah penelitian bertema INFOKOM yang mendapat HKI
                                            </th>
                                            <th scope="col">
                                                Jumlah PkM bertema INFOKOM yang diadopsi masyarakat
                                            </th>
                                            <th scope="col">
                                                Jumlah PkM bertema INFOKOM yang mendapat HKI
                                            </th>
                                            <th scope="col">
                                                Unit Kerja
                                            </th>
                                            <th scope="col">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->nama_dtpr }}</td>
                                                <td>{{ $item->jumlah_publikasi_infokom }}</td>
                                                <td>{{ $item->jumlah_penelitian_infokom }}</td>
                                                <td>{{ $item->jumlah_penelitian_infokom_hki }}</td>
                                                <td>{{ $item->jumlah_pkm_diadopsi_masyarakat }}</td>
                                                <td>{{ $item->jumlah_pkm_hki }}</td>
                                                <td>{{ $item->kode_pt_unit }}</td>
                                                <td>
                                                    <a href="{{ route('ppkmdtprbyptunit', ['ptunitid' => $item['id_pt_unit']]) }}"
                                                        style="margin-right: 7px">
                                                        Lihat
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
