@extends('layouts.app')
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
                @can('isJurusan')
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-left">
                            <h5>Pilih Program Studi </h5>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('ppkm-dtpr.index') }}" method="get">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="">Program Studi</label>
                                    <select name="id_pt_unit" class="form-control">
                                        <option value="0">--Pilih Program Studi--</option>
                                        <option value="5" {{ old('id_pt_unit') === '5' ? 'selected' : '' }}>D3
                                            MI
                                        </option>
                                        <option value="6" {{ old('id_pt_unit') === '6' ? 'selected' : '' }}>D3
                                            TK
                                        </option>
                                        <option value="4" {{ old('id_pt_unit') === '4' ? 'selected' : '' }}>D4
                                            TRPL
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group" style="margin-top:25px;">
                                    <input type="submit" class="btn btn-primary" value="Filter">
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- tabel  --}}
                    <br>
                </div>
                @endcan
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h5>
                        @can('isAdmProdi')
                        <a href="{{ route('ppkm-dtpr.create') }}">
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
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $item)
                                    <tr align="center">
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item['dosen'] }}</td>
                                        <td>{{ $item['jumlah_publikasi'] }}</td>
                                        <td>{{ $item['jumlah_penelitian'] }}</td>
                                        <td>{{ $item['jumlah_hki'] }}</td>
                                        <td>{{ $item['jumlah_hki_diadopsi'] }}</td>
                                        <td>{{ $item['jumlah_hki_pengabdian'] }}</td>
                                        
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