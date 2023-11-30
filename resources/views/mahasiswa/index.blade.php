@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Jumlah Calon Mahasiswa Baru</h5>
                        <p class="m-b-0">Data Jumlah Calon Mahasiswa Baru</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Jumlah Calon Mahasiswa Baru</a>
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
                    @can('isJurusan')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <h5>Pilih Program Studi </h5>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{ route('mahasiswa.index') }}" method="get">
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
                            <h5>Jumlah Calon Mahasiswa Baru</h5>
                            @can('isAdmProdi')
                                <a href="{{ route('mahasiswa.create') }}">
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
                                            <th scope="col" rowspan="2">
                                                Tahun Akademik
                                            </th>

                                            <th scope="col" rowspan="2">
                                                Daya Tampung
                                            </th>
                                            <th scope="col" colspan="2">
                                                Jumlah Calon Mahasiswa
                                            </th>
                                            <th scope="col" colspan="2">
                                                Jumlah Mahasiswa Baru
                                            </th>
                                            <th scope="col" colspan="2">
                                                Jumlah Mahasiswa Aktif
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
<<<<<<< HEAD:resources/views/admprodi/page/mhsbaru/index.blade.php
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Aksi
=======
>>>>>>> origin/prefered_dev:resources/views/mahasiswa/index.blade.php
                                            </th>
                                            @can('isAdmProdi')
                                                <th scope="col" rowspan="2">
                                                    Aksi
                                                </th>
                                            @endcan
                                        </tr>
                                        <tr align="center">
                                            <th>
                                                Pendaftar
                                            </th>
                                            <th>
                                                Lulus Seleksi
                                            </th>
                                            <th>
                                                Reguler
                                            </th>
                                            <th>
                                                Transfer
                                            </th>
                                            <th>
                                                Reguler
                                            </th>
                                            <th>
                                                Transfer
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                {{-- <td>{{ $no + 1 }}</td> --}}
                                                <td>{{ $item->tahunAkademik->tahun_akademik }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->pendaftar }}</td>
                                                <td>{{ $item->lulus_seleksi }}</td>
                                                <td>{{ $item->maba_reguler }}</td>
                                                <td>{{ $item->maba_transfer }}</td>
                                                <td>{{ $item->mhs_aktif_reguler }}</td>
                                                <td>{{ $item->mhs_aktif_transfer }}</td>
<<<<<<< HEAD:resources/views/admprodi/page/mhsbaru/index.blade.php
                                                {{-- <td>{{ $item->id_pt_unit }}</td> --}}
                                                <td>{{ $item->kode_pt_unit }}</td>

                                                <td>
                                                    <a href="{{ route('edit-cmb', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-cmb', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-cmb', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
=======
                                                <td>{{ $item->ptUnit->kode_pt_unit }}</td>
                                                @can('isAdmProdi')
                                                    <td>
                                                        <form action="{{ route('mahasiswa.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('mahasiswa.edit', ['id' => $item->id]) }}"
                                                                style="margin-right: 7px">
                                                                Edit
                                                            </a>
                                                            <button type="submit" class="btn btn-link">Hapus</button>
                                                        </form>
                                                    </td>
                                                @endcan
>>>>>>> origin/prefered_dev:resources/views/mahasiswa/index.blade.php
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $data->links() !!}
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
