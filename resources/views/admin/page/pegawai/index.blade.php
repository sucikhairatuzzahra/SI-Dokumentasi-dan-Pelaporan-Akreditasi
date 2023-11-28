@extends('admin.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Daftar Pegawai</h5>
                        <p class="m-b-0">Data Pegawai</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Daftar Pegawai</a>
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
                            <h5>Daftar Pegawai</h5>
                            <a href="{{ route('tambah-pegawai') }}">
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
                                                Nama Pegawai
                                            </th>
                                            <th scope="col">
                                                Tanggal lahir
                                            </th>
                                            <th scope="col">
                                                NIP
                                            </th>
                                            <th scope="col">
                                                Aktif
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
                                                <td>{{ $item->tanggal_lahir }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->aktif }}</td>

                                                <td>
                                                    <a href="{{ route('edit-pegawai', ['pk_id_pegawai' => $item->pk_id_pegawai]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-pegawai', $item->pk_id_pegawai) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->pk_id_pegawai }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->pk_id_pegawai }}"
                                                        action="{{ route('hapus-pegawai', ['pk_id_pegawai' => $item->pk_id_pegawai]) }}"
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
