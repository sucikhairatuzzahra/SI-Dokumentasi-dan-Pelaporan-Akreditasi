@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary">
                                <h4 class="card-title"> Pendayagunaan Sarana dan Prasarana Utama</h4>
                            </a>
                            <a href="{{ route('tambah-sarana') }}">
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
                                                Sarana/Prasarana
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
                                                <td>{{ $item->sarana }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->luas_ruang }}</td>
                                                <td>{{ $item->jml_mhs }}</td>
                                                <td>{{ $item->jam_lyn }}</td>
                                                <td>{{ $item->perangkat }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('edittraining', ['thn_akademik' => $item->tahun-akademik]) }}"
                                            class="btn btn-warning">Edit</a> --}}

                                                    <a href="{{ route('hapus-sarana', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-sarana', ['id' => $item->id]) }}"
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
