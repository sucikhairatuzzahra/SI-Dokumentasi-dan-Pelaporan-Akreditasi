@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Rata-rata beban DTPR per semester, pada TS</h5>
                        <p class="m-b-0">Data Rata-rata beban DTPR</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Rata-rata beban DTPR</a>
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
 
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Rata-rata beban DTPR</h5>
                            @can('isAdmin')
                                <a href="{{ route('beban-dtpr.create') }}">
                                    <span>Tambah data <code>disini</code> </span>
                                </a>
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
                                        <a href="{{ route('beban-dtpr.download') }}">
                                            <button class="btn btn-success">Unduh LKPS</button></a>
                                    </div>
                                @endcan
                                <table class="table table-bordered" style="align-content: center">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col" rowspan="2">
                                                No
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Tahun
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Nama Dosen
                                            </th>
                                            <th scope="col" colspan="3" style="align-content: center">
                                                SKS Pengajaran Pada
                                            </th>
                                            <th scope="col" rowspan="2">
                                                SKS Penelitian
                                            </th>
                                            <th scope="col" rowspan="2">
                                                SKS Pengabdian Pada Masy
                                            </th>
                                            <th scope="col" colspan="2">
                                                SKS Manajemen
                                            </th>
                                            {{-- <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th> --}}
                                            @can('isAdmin')
                                                <th scope="col" rowspan="2">
                                                    Aksi
                                                </th>
                                            @endcan
                                        </tr>
                                        <tr>
                                            <th>
                                                PS Sendiri
                                            </th>
                                            <th>
                                                PS Lain, PT Sendiri
                                            </th>
                                            <th>
                                                PT Lain
                                            </th>
                                            <th>
                                                PT Sendiri
                                            </th>
                                            <th>
                                                PT Lain
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->tahunAkademik->tahun }}</td>
                                                <td>{{ $nama_dosen[$no] }}</td>
                                                <td>{{ $item->pgjrn_ps_sendiri }}</td>
                                                <td>{{ $item->pgjrn_ps_lain_pt_sendiri }}</td>
                                                <td>{{ $item->pgjrn_pt_lain }}</td>
                                                <td>{{ $item->sks_penelitian }}</td>
                                                <td>{{ $item->sks_pengabdian }}</td>
                                                <td>{{ $item->manajemen_pt_sendiri }}</td>
                                                <td>{{ $item->manajemen_pt_lain }}</td>
                                                {{-- <td>{{ $item->ptUnit->kode_pt_unit }}</td> --}}
                                                @can('isAdmin')
                                                    <td>
                                                        <form action="{{ route('beban-dtpr.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('beban-dtpr.edit', ['id' => $item->id]) }}"
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
