@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary">
                                <h4 class="card-title">Sumber Pendanaan Program Studi</h4>
                            </a>
                            <a href="{{ route('tambah-pendanaan') }}">
                                <p class="card-description">
                                    Create New <code>.table-striped</code>
                                </p>
                            </a>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">
                                                No
                                            </th>
                                            <th scope="col">
                                                Sumber Dana
                                            </th>
                                            <th scope="col">
                                                Jumlah (dalam juta Rupiah)
                                            </th>
                                            <th scope="col">
                                                Bukti
                                            </th>
                                            <th scope="col">
                                                Keterangan
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
                                                <td>{{ $item->sumber_dana }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>{{ $item->bukti }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('edittraining', ['thn_akademik' => $item->tahun-akademik]) }}"
                                            class="btn btn-warning">Edit</a> --}}

                                                    <a href="{{ route('hapus-pendanaan', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-pendanaan', ['id' => $item->id]) }}"
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
