@extends('admprodi.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kualifikasi Tenaga Kependidikan</h5>
                        <p class="m-b-0">Data Kualifikasi Tenaga Kependidikan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Sumber Daya Manusia</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Kualifikasi Tenaga Kependidikan</h5>
                            <a href="{{ route('tambah-kependidikan') }}">
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
                                            <th scope="col" rowspan="2">
                                                Jenis Tenaga Kependidikan
                                            </th>
                                            <th scope="col" colspan="8">
                                                Jumlah Tenaga Kependidikan
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Keterangan
                                            </th>
                                        </tr>
                                        <tr align="center">
                                            <th>
                                                S3
                                            </th>
                                            <th>
                                                S2
                                            </th>
                                            <th>
                                                S1
                                            </th>
                                            <th>
                                                D4
                                            </th>
                                            <th>
                                                D3
                                            </th>
                                            <th>
                                                D2
                                            </th>
                                            <th>
                                                D1
                                            </th>
                                            <th>
                                                SMA/SMK
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $item->jenis_tng_kpddkn }}</td>
                                                <td>{{ $item->s3 }}</td>
                                                <td>{{ $item->s2 }}</td>
                                                <td>{{ $item->s1 }}</td>
                                                <td>{{ $item->d4 }}</td>
                                                <td>{{ $item->d3 }}</td>
                                                <td>{{ $item->d2 }}</td>
                                                <td>{{ $item->d1 }}</td>
                                                <td>{{ $item->sma }}</td>
                                                <td>{{ $item->id_pt_unit }}</td>
                                                <td>{{ $item->unit_kerja }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('edit-kependidikan', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Tambah Data
                                                    </a> --}}
                                                    <a href="{{ route('edit-kependidikan', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-kependidikan', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-kependidikan', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

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
