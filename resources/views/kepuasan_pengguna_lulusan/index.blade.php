@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kepuasan Pengguna Lulusan</h5>
                        <p class="m-b-0">Data Kepuasan Pengguna Lulusan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kepuasan Pengguna Lulusan</a>
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
                            <h5>Kepuasan Pengguna Lulusan</h5>
                            @can('isAdmProdi')
                                <a href="{{ route('kepuasan-pengguna.create') }}">
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
                            
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th scope="col" rowspan="2">
                                                No
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jenis Kemampuan
                                            </th>
                                            <th scope="col" colspan="4">
                                                Tingkat Kepuasan Pengguna (%)
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Rencana Tindak Lanjut Oleh UPPS/PS
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th>
                                            {{-- <th scope="col" rowspan="2">
                                                Aksi
                                            </th> --}}
                                        </tr>
                                        <tr align="center">
                                            <th>
                                                Sangat Baik
                                            </th>
                                            <th>
                                                Baik
                                            </th>
                                            <th>
                                                Cukup
                                            </th>
                                            <th>
                                                Kurang
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->jenis_kemampuan }}</td>
                                                <td>{{ $item->sangat_baik }}</td>
                                                <td>{{ $item->baik }}</td>
                                                <td>{{ $item->cukup }}</td>
                                                <td>{{ $item->kurang }}</td>
                                                <td>{{ $item->rencana_tindak_lanjut }}</td>
                                                <td>{{ $item->kode_pt_unit }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('edit-kepuasan_pengguna', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-kepuasan_pengguna', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-kepuasan_pengguna', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td> --}}
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
