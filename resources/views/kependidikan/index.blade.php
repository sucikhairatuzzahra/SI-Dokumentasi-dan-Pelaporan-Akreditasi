@extends('layouts.app')
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
                            @can('isAdmin')
                                <a href="{{ route('kependidikan.create') }}">
                                    <span>Tambah data <code>disini</code></span>
                                </a>

                                {{-- Alerting --}}
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                            @endcan

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
                                @can('isKaprodi')
                                    <div class="row">
                                        <a href="{{ route('kependidikan.download') }}">
                                            <button class="btn btn-success">Unduh LKPS</button></a>
                                    </div>
                                @endcan
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
                                            @can('isAdmin')
                                                <th scope="col" rowspan="2">
                                                    Aksi
                                                </th>
                                            @endcan
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

                                                <td>{{ $item['jenis_tenaga_kependidikan'] }}</td>
                                                <td>{{ $item['jenjang_counts']['s3'] ?? 0 ? count($item['jenjang_counts']['s3']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['s2'] ?? 0 ? count($item['jenjang_counts']['s2']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['s1'] ?? 0 ? count($item['jenjang_counts']['s1']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['d4'] ?? 0 ? count($item['jenjang_counts']['d4']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['d3'] ?? 0 ? count($item['jenjang_counts']['d3']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['d2'] ?? 0 ? count($item['jenjang_counts']['d2']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['d1'] ?? 0 ? count($item['jenjang_counts']['d1']) : 0 }}
                                                </td>
                                                <td>{{ $item['jenjang_counts']['sma'] ?? 0 ? count($item['jenjang_counts']['sma']) : 0 }}
                                                </td>
                                                <td>{{ $item['unit_kerja'] }}</td>
                                                {{-- <td>{{ $item['pt_unit'] }}</td> --}}

                                                @can('isAdmin')
                                                    <td>
                                                        <a href="{{ route('kependidikan.show', ['id' => $item['unit_kerja']]) }}"
                                                            style="margin-right: 7px">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                @endcan
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
