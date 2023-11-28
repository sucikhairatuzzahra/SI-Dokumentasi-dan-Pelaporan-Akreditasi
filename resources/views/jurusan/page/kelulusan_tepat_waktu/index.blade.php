@extends('jurusan.layout.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kelulusan Tepat Waktu</h5>
                        <p class="m-b-0">Data Kelulusan Tepat Waktu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>

                        <li class="breadcrumb-item"><a href="#!">Kelulusan Tepat Waktu</a>
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
                            <h5>Kelulusan Tepat Waktu</h5>

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
                                        <tr align="center">
                                            <th scope="col" rowspan="2">
                                                Tahun Masuk
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Mahasiswa Diterima
                                            </th>
                                            <th scope="col" colspan="7">
                                                Jumlah Mahasiswa Yang Lulus Pada
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Lulusan s.d Akhir TS
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Rata-rata Masa Studi
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jumlah Mhs, Yang Masih Aktif
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Unit Kerja
                                            </th>

                                        </tr>
                                        <tr align="center">
                                            <th>
                                                Akhir TS-6
                                            </th>
                                            <th>
                                                Akhir TS-5
                                            </th>
                                            <th>
                                                Akhir TS-4
                                            </th>
                                            <th>
                                                Akhir TS-3
                                            </th>
                                            <th>
                                                Akhir TS-2
                                            </th>
                                            <th>
                                                Akhir TS-1
                                            </th>
                                            <th>
                                                Akhir TS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                <td>{{ $item->tahun_masuk }}</td>
                                                <td>{{ $item->jml_mhs }}</td>
                                                {{-- <td>{{ $item->tahun_lulus }}</td> --}}
                                                <td>{{ $item->akhir_ts_6 }}</td>
                                                <td>{{ $item->akhir_ts_5 }}</td>
                                                <td>{{ $item->akhir_ts_4 }}</td>
                                                <td>{{ $item->akhir_ts_3 }}</td>
                                                <td>{{ $item->akhir_ts_2 }}</td>
                                                <td>{{ $item->akhir_ts_1 }}</td>
                                                <td>{{ $item->akhir_ts }}</td>
                                                <td>{{ $item->jumlah_lulusan_sampai_ts }}</td>
                                                <td>{{ $item->masa_studi }}</td>
                                                <td>{{ $item->jml_mhs_aktif }}</td>
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
                    url: '/jurusan-kelulusan_tepatwaktu/' + prodiId,
                    success: function(data) {
                        // data?.forEach((d, idx) => {
                        //     $(`.tahun_akademik_${idx}`)?.text(d?.tahun_akademik)

                        // })
                        if (prodiId > 0) {
                            history.pushState(null, null, '/jurusan-kelulusan_tepatwaktu/' +
                                prodiId);

                        } else {
                            history.pushState(null, null, '/jurusan-kelulusan_tepatwaktu/');

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
