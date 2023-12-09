@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        <p class="m-b-0">Data Pengabdian Infokom</p>
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Pengabdian Infokom</h5>
                            @can('isAdmin')
                                <a href="{{ route('ppkm-pengabdian.create') }}">
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th scope="col">
                                                No
                                            </th>
                                            <th scope="col">
                                                Tahun
                                            </th>
                                            <th scope="col">
                                                Judul
                                            </th>
                                            <th scope="col">
                                                Jenis Sumber Pembiayaan
                                            </th>
                                            <th scope="col">
                                                Sumber Pembiayaan
                                            </th>
                                            <th scope="col">
                                                Adopsi Masy
                                            </th>
                                            {{-- <th scope="col">
                                                Jenis Penelitian dan Pengabdian
                                            </th> --}}

                                            @can('isAdmin')
                                                <th scope="col" rowspan="2">
                                                    Aksi
                                                </th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->pembiayaan->jenis_sumber_pembiayaan }}</td>
                                                <td>{{ $item->sumber_pembiayaan }}</td>
                                                <td>{{ $item->adopsi_masy }}</td>
                                                {{-- <td>{{ $item->jenis_penelitian_pengabdian }}</td> --}}

                                                @can('isAdmin')
                                                    <td>
                                                        <form
                                                            action="{{ route('ppkm-pengabdian.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('ppkm-pengabdian.edit', ['id' => $item->id]) }}"
                                                                style="margin-right: 7px">
                                                                Edit
                                                            </a>
                                                            <button type="submit" class="btn btn-link">Hapus</button>
                                                        </form>
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
