@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kesesuaian Bidang Kerja Lulusan</h5>
                        <p class="m-b-0">Data Bidang Kerja Lulusan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kesesuaian Bidang Kerja Lulusan</a>
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
                            <h5>Kesesuaian Bidang Kerja Lulusan</h5>
                            @can('isAdmProdi')
                                <a href="{{ route('kerja-lulusan.create') }}">
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
                                                Tahun Lulus
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Lulusan
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Lulusan Yang Terlacak
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Kerja Bidang Infokom
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Kerja Bidang Non Infokom
                                            </th>
                                            <th scope="col" colspan="3">
                                                Lingkup Tempat Kerja
                                            </th>
                                            <th scope="col" rowspan="2">
                                                PT Unit
                                            </th>
<<<<<<< HEAD:resources/views/admprodi/page/bidang_kerja_lulusan/index.blade.php
                                            <th scope="col" rowspan="2">
                                                Aksi
                                            </th>
=======
                                            @can('isAdmProdi')
                                                <th scope="col" rowspan="2">
                                                    Aksi
                                                </th>
                                            @endcan
>>>>>>> origin/prefered_dev:resources/views/bidang_kerja_lulusan/index.blade.php
                                        </tr>
                                        <tr align="center">
                                            <th>
                                                Internasional
                                            </th>
                                            <th>
                                                Nasional
                                            </th>
                                            <th>
                                                Wirausaha
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                {{-- <td>{{ $no + 1 }}</td> --}}
                                                <td>{{ $item->tahun_lulus }}</td>
                                                <td>{{ $item->jumlah_lulusan }}</td>
                                                <td>{{ $item->lulusan_terlacak }}</td>
                                                <td>{{ $item->bidang_infokom }}</td>
                                                <td>{{ $item->bidang_noninfokom }}</td>
                                                <td>{{ $item->internasional }}</td>
                                                <td>{{ $item->nasional }}</td>
                                                <td>{{ $item->wirausaha }}</td>
                                                <td>{{ $item->kode_pt_unit }}</td>
<<<<<<< HEAD:resources/views/admprodi/page/bidang_kerja_lulusan/index.blade.php
                                                <td>
                                                    <a href="{{ route('edit-kerjalulusan', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-kerjalulusan', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-kerjalulusan', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
=======
                                                @can('isAdmProdi')
                                                    <td>
                                                        <form
                                                            action="{{ route('kerja-lulusan.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('kerja-lulusan.edit', ['id' => $item->id]) }}"
                                                                style="margin-right: 7px">
                                                                Edit
                                                            </a>
                                                            <button type="submit" class="btn btn-link">Hapus</button>
                                                        </form>
                                                    </td>
                                                @endcan
>>>>>>> origin/prefered_dev:resources/views/bidang_kerja_lulusan/index.blade.php
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
