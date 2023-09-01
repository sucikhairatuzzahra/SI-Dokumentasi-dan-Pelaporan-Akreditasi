@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary">
                                <h4 class="card-title">Aksesibilitas Data Dalam Sistem informasi</h4>
                            </a>
                            <a href="{{ route('tambah-aksesibilitas') }}">
                                <p class="card-description">
                                    Create New <code>.table-striped</code>
                                </p>
                            </a>
                            </a>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col" rowspan="2">
                                                No
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Jenis Data
                                            </th>
                                            <th scope="col" colspan="4">
                                                Sistem Pengolahan data Ditangani
                                            </th>
                                            <th scope="col" rowspan="2">
                                                Keterangan
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
                                            <tr>
                                                {{-- <th scope="row">{{ $no++ }}</th> --}}
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->jenis_data }}</td>
                                                <td>{{ $item->secara_manual }}</td>
                                                <td>{{ $item->tanpa_jrg }}</td>
                                                <td>{{ $item->lan }}</td>
                                                <td>{{ $item->wan }}</td>
                                                <td>
                                                    <a href="{{ route('hapus-aksesibilitas', $item->id) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-aksesibilitas', ['id' => $item->id]) }}"
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
            </div>
        </div>
    </div>
@endsection
