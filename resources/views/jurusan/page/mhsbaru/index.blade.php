@extends('jurusan.layout.app')
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
                        {{-- <li class="breadcrumb-item"><a href="#!">Luaran dan Capaian Tridarma</a>
                        </li> --}}
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Jumlah Calon Mahasiswa Baru</h5>
                            {{-- <a href="{{ route('tambah-cmb') }}">
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
                                <div class="row">
                                    <a href="{{ route('mhs-download') }}">
                                        <button class="btn btn-success">Download</button></a>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th scope="col" rowspan="2">
                                                Tahun Akademik
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Id PT_Unit
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
                                                Keterangan
                                            </th>
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
                                                <td>{{ $item->thn_akademik }}</td>
                                                <td>{{ $item->id_pt_unit }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->pendaftar }}</td>
                                                <td>{{ $item->lulus_seleksi }}</td>
                                                <td>{{ $item->maba_reguler }}</td>
                                                <td>{{ $item->maba_transfer }}</td>
                                                <td>{{ $item->mhs_aktif_reguler }}</td>
                                                <td>{{ $item->mhs_aktif_transfer }}</td>
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
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

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
