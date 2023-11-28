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
                            {{-- <a href="{{ route('edit-kependidikan') }}">
                                <span>Tambah data <code>disini</code> </span>
                            </a> --}}

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
                                                Nama
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jenis Tenaga Kependidikan
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jenjang Pendidikan
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Aksi
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $item['nama'] }}</td>
                                                <td>{{ $item['jenis_tenaga_kependidikan'] }}</td>
                                                <td>{{ $item['jenjang_pendidikan'] }} </td>
                                                <td>{{ $item['kode_pt_unit'] }}</td>
                                                <td>

                                                    <a {{-- href="{{ route('kependidikanbyptunit', ['ptunitid' => $item['id_pt_unit']]) }}">Lihat</a> --}} <a
                                                        href="{{ route('edit-kependidikan', ['id' => $item['id']]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-kependidikan', ['id' => $item['id']]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id'] }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item['id'] }}"
                                                        action="{{ route('hapus-kependidikan', ['id' => $item['id']]) }}"
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
