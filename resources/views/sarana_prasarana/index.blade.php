@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Pendayagunaan Sarana dan Prasarana Utama</h5>
                        <p class="m-b-0">Data Pendayagunaan Sarana dan Prasarana Utama</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Pendayagunaan Sarana dan Prasarana Utama</a>
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
                            <h5>Pendayagunaan Sarana dan Prasarana Utama</h5>
                            @can('isAdmProdi')
                                <a href="{{ route('sarana.create') }}">
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
                                                Sarana/ Prasarana
                                            </th>
                                            <th scope="col">
                                                Daya Tampung
                                            </th>
                                            <th scope="col">
                                                Luas Ruang (m2)
                                            </th>
                                            <th scope="col">
                                                Jumlah Mhs Yang Dilayani
                                            </th>
                                            <th scope="col">
                                                Jam Layanan
                                            </th>
                                            <th scope="col">
                                                Perangkat Yang Dimiliki
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
                                                <td>{{ $item->sarana }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->luas_ruang }}</td>
                                                <td>{{ $item->jml_mhs }}</td>
                                                <td>{{ $item->jam_lyn }}</td>
                                                <td>{{ $item->perangkat }}</td>
<<<<<<< HEAD:resources/views/kaprodi/page/saranaprasarana/index.blade.php
                                                <td>{{ $item->kode_pt_unit }}</td>

=======
                                                <td>{{ $item->ptUnit->kode_pt_unit }}</td>
                                                @can('isAdmProdi')
                                                    <td>
                                                        <form action="{{ route('sarana.destroy', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('sarana.edit', ['id' => $item->id]) }}"
                                                                style="margin-right: 7px">
                                                                Edit
                                                            </a>
                                                            <button type="submit" class="btn btn-link">Hapus</button>
                                                        </form>
                                                    </td>
                                                @endcan
>>>>>>> origin/prefered_dev:resources/views/sarana_prasarana/index.blade.php
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
