@extends('layouts.app')
@section('content')
{{-- page header  --}}
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sumber Pendanaan Program Studi pada TS</h5>
                    <p class="m-b-0">Data Sumber Pendanaan Program Studi pada TS</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">Sumber Pendanaan Program Studi pada TS</a>
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
                        <form action="{{ route('pendanaan.index') }}" method="get">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="">Program Studi</label>
                                    <select name="id_pt_unit" class="form-control">
                                        <option value="0">--Pilih Program Studi--</option>
                                        <option value="5" {{ $request->id_pt_unit === '5' ? 'selected' : '' }}>D3
                                            MI
                                        </option>
                                        <option value="6" {{ $request->id_pt_unit === '6' ? 'selected' : '' }}>D3
                                            TK
                                        </option>
                                        <option value="4" {{ $request->id_pt_unit === '4' ? 'selected' : '' }}>D4
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
                        <h5>Sumber Pendanaan Program Studi pada TS</h5>
                        @can('isAdmProdi')
                        <a href="{{ route('pendanaan.create') }}">
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
                                <a href="{{ route('pendanaan.download') }}">
                                    <button class="btn btn-success">Unduh LKPS</button></a>
                            </div>
                            @endcan
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align-last: center">
                                        <th scope="col">
                                            No
                                        </th>
                                        <th scope="col">
                                            Sumber Dana
                                        </th>
                                        <th scope="col">
                                            Jumlah (dalam juta Rupiah)
                                        </th>
                                        <th scope="col">
                                            Bukti
                                        </th>
                                        <th scope="col">
                                            Keterangan
                                        </th>
                                        <th scope="col">
                                            Unit Kerja
                                        </th>
                                        @can('isAdmProdi')
                                        <th scope="col" rowspan="2">
                                            Aksi
                                        </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    // dd($data);
                                    ?>
                                    @foreach ($data as $no => $item)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $item->sumber_dana }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td><a href="{{ asset('storage/pendanaan/' . $item->bukti)}}" class="btn btn-warning btn-sm">Lihat Bukti</a></td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->ptUnit->kode_pt_unit }}</td>
                                        @can('isAdmProdi')
                                        <td>
                                            <form action="{{ route('pendanaan.destroy', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('pendanaan.edit', ['id' => $item->id]) }}" style="margin-right: 7px">
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
                        {!! $data->links() !!}
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