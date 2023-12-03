@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Daftar Dosen</h5>
                        <p class="m-b-0">Data Dosen</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Daftar Dosen</a>
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
                            <h5>Daftar Dosen</h5>
                            <a href="{{ route('dosen.create') }}">
                                <span>Tambah data <code>disini</code> </span>
                            </a>
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
                                                Nama Dosen
                                            </th>
                                            <th scope="col">
                                                Nomor Induk Dosen
                                            </th>
                                            <th scope="col">
                                                Jenis Nomor Induk Dosen
                                            </th>
                                            <th scope="col">
                                                Pendidikan Tertinggi
                                            </th>
                                            <th scope="col">
                                                Pendidikan Magister
                                            </th>
                                            <th scope="col">
                                                Pendidikan Doktor
                                            </th>
                                            <th scope="col">
                                                Bidang Keahlian
                                            </th>
                                            <th scope="col">
                                                Jabatan Akademik
                                            </th>
                                            <th scope="col">
                                                NIP
                                            </th>
                                            <th scope="col">
                                                Unit Kerja
                                            </th>
                                            <th scope="col">
                                                Kategori Dosen
                                            </th>
                                            <th scope="col">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        // dd($data);
                                        ?>
                                        @foreach ($data as $no => $item)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->nama_pegawai }}</td>
                                                <td>{{ $item->nomor_induk_dosen }}</td>
                                                <td>{{ $item->jenis_nomor_induk_dosen }}</td>
                                                <td>{{ $item->levelPddkn->nama_level_pendidikan }}</td>
                                                <td>{{ $item->pendidikan_magister }}</td>
                                                <td>{{ $item->pendidikan_doktor }}</td>
                                                <td>{{ $item->bidang_keahlian }}</td>
                                                <td>{{ $item->jabatan_akademik }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->ptUnit->kode_pt_unit }}</td>
                                                <td>{{ $item->idKatDosen->kode_kategori_dosen }}</td>
                                                <td>
                                                    <form action="{{ route('dosen.destroy', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('dosen.edit', ['id' => $item->id]) }}"
                                                            style="margin-right: 7px">
                                                            Edit
                                                        </a>
                                                        <button type="submit" class="btn btn-link">Hapus</button>
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
