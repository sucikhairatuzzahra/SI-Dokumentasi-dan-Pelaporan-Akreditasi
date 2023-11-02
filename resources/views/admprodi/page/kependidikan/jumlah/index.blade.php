@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary">
                                <h4 class="card-title">Kualifikasi Tenaga Kependidikan</h4>
                            </a>

                            <a href="{{ route('kependidikan/{id}/tambah') }}">
                                <p class="card-description">
                                    Create New <code>.table-striped</code>
                                </p>
                            </a>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>

                                        <tr align="center">
                                            <th scope="col">
                                                S3
                                            </th>
                                            <th scope="col">
                                                S2
                                            </th>
                                            <th scope="col">
                                                S1
                                            </th>
                                            <th scope="col">
                                                D4
                                            </th>
                                            <th scope="col">
                                                D3
                                            </th>
                                            <th scope="col">
                                                D2
                                            </th>
                                            <th scope="col">
                                                D1
                                            </th>
                                            <th scope="col">
                                                SMA/SMK
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $no => $item)
                                            <tr align="center">
                                                {{-- <td>{{ $item->jenis_tng_kpddkn }}</td> --}}
                                                <td>{{ $item->s3 }}</td>
                                                <td>{{ $item->s2 }}</td>
                                                <td>{{ $item->s1 }}</td>
                                                <td>{{ $item->d4 }}</td>
                                                <td>{{ $item->d3 }}</td>
                                                <td>{{ $item->d2 }}</td>
                                                <td>{{ $item->d1 }}</td>
                                                <td>{{ $item->sma }}</td>
                                                <td>
                                                    <a href="{{ route('edit-kependidikan', ['id' => $item->id]) }}"
                                                        style="margin-right: 7px">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('hapus-kependidikan', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-kependidikan', ['id' => $item->id]) }}"
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
