@extends('layouts.app')
@section('content')
    {{-- page header  --}}
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Mahasiswa</h5>
                        <p class="m-b-0">Data Mahasiswa</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Mahasiswa</a>
                        </li>

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
                            <form action="{{ route('mahasiswa.index') }}" method="get">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="">Program Studi</label>
                                        <select id="id_pt_unit" class="form-control">
                                            <option value="0">--Pilih Program Studi--</option>
                                            <option value="5" {{ $request->id === '5' ? 'selected' : '' }}>D3 MI
                                            </option>
                                            <option value="6" {{ $request->id === '6' ? 'selected' : '' }}>D3 TK
                                            </option>
                                            <option value="4" {{ $request->id === '4' ? 'selected' : '' }}>D4 TRPL
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Jumlah Calon Mahasiswa</h5>

                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
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
                                            <tr align="center" class="mhsbaru_{{ $no }}">
                                                <td class="tahun_akademik_{{ $no }}">
                                                    {{ $item->tahunAkademik->tahun_akademik }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->pendaftar }}</td>
                                                <td>{{ $item->lulus_seleksi }}</td>
                                                <td>{{ $item->maba_reguler }}</td>
                                                <td>{{ $item->maba_transfer }}</td>
                                                <td>{{ $item->mhs_aktif_reguler }}</td>
                                                <td>{{ $item->mhs_aktif_transfer }}</td>
                                                <td>{{ $item->ptUnit->kode_pt_unit }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
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
                    url: '/jurusan-mahasiswa/' + prodiId,
                    success: function(data) {
                        // data?.forEach((d, idx) => {
                        //     $(`.tahun_akademik_${idx}`)?.text(d?.tahun_akademik)

                        // })
                        if (prodiId > 0) {
                            history.pushState(null, null, '/jurusan-mahasiswa/' + prodiId);

                        } else {
                            history.pushState(null, null, '/jurusan-mahasiswa/');

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
