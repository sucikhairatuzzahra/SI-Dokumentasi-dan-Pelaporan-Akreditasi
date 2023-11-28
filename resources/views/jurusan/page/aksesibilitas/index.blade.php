@extends('jurusan.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Aksesibilitas Data Dalam Sistem Informasi</h5>
                        <p class="m-b-0">Data Aksesibilitas</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Aksesibilitas</a>
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
                            <div class="card-header-left">
                                <h5>Pilih Program Studi </h5>
                            </div>
                        </div>
                        <div class="card-block">
                            <select id="selectProdi">
                                <option value="0">--Pilih Program Studi--</option>
                                <option value="5">D3 MI</option>
                                <option value="6">D3 TK</option>
                                <option value="4">D4 TRPL</option>
                            </select>
                        </div>
                        {{-- tabel  --}}
                        <br>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Aksesibilitas Data Dalam Sistem Informasi</h5>

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
                                {{-- <div class="row">
                                    <a href="{{ route('aksesibilitas-download') }}">
                                        <button class="btn btn-success">Download</button></a>
                                </div> --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align-last: center">
                                            <th scope="col" rowspan="2">
                                                No
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jenis Data
                                            </th>
                                            <th scope="col" colspan="4">
                                                Sistem Pengolahan Data Ditangani
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th>

                                        </tr>
                                        <tr align="center">
                                            <th>
                                                Secara Manual
                                            </th>
                                            <th>
                                                Dengan Komputer Tanpa Jaringan
                                            </th>
                                            <th>
                                                Dengan Komputer Serta Dapat Diakses Melalui Jaringan Lokal (LAN)
                                            </th>
                                            <th>
                                                Dengan Komputer Serta Dapat Diakses Melalui jaringan Luas (WAN)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr class="aksesibilitas{{ $no }}">
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->jenis_data }}</td>
                                                <td>{{ $item->secara_manual }}</td>
                                                <td>{{ $item->tanpa_jrg }}</td>
                                                <td>{{ $item->lan }}</td>
                                                <td><a href="{{ $item->wan }}">{{ $item->wan }}</a></td>
                                                <td>{{ $item->kode_pt_unit }}</td>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Isi dropdown dengan opsi prodi
            // ...
            const idProdiID = window.location.pathname?.split('/')?.pop()
            if (Number(idProdiID) > 0) {
                $('#selectProdi option[value="' + Number(idProdiID) + '"]').attr('selected', 'selected');

            } else {
                $('#selectProdi option[value="' + 0 + '"]').attr('selected', 'selected');

            }
            // Tangani perubahan dropdown
            $('#selectProdi').change(function() {
                var prodiId = $(this).val();


                // Kirim permintaan AJAX
                $.ajax({
                    type: 'GET',
                    url: '/jurusan-aksesibilitas/' + prodiId,
                    success: function(data) {
                        // data?.forEach((d, idx) => {
                        //     $(`.tahun_akademik_${idx}`)?.text(d?.tahun_akademik)

                        // })
                        if (prodiId > 0) {
                            history.pushState(null, null, '/jurusan-aksesibilitas/' + prodiId);

                        } else {
                            history.pushState(null, null, '/jurusan-aksesibilitas/');

                        }
                        window.location.reload()
                        console.log(data)
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
