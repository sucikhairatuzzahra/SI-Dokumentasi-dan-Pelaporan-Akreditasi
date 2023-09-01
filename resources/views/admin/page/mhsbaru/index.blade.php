@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('tambah-cmb') }}" class="btn btn-primary">
                                <h4 class="card-title">Jumlah Calon Mahasiswa Baru</h4>
                            </a>

                            <a></a>
                            <p class="card-description">
                                Create New <code>.table-striped</code>
                            </p>
                            </a>
                            <div class="table-responsive pt-3">
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
                                                Keterangan
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
                                        <?php $no = 0;
                                        // dd($data);
                                        ?>
                                        @foreach ($data as $item)
                                            <tr align="center">
                                                {{-- <td>{{ $no + 1 }}</td> --}}
                                                <td>{{ $item->thn_akademik }}</td>
                                                <td>{{ $item->daya_tampung }}</td>
                                                <td>{{ $item->pendaftar }}</td>
                                                <td>{{ $item->lulus_seleksi }}</td>
                                                <td>{{ $item->maba_reguler }}</td>
                                                <td>{{ $item->maba_transfer }}</td>
                                                <td>{{ $item->mhs_aktif_reguler }}</td>
                                                <td>{{ $item->mhs_aktif_transfer }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('edittraining', ['thn_akademik' => $item->tahun-akademik]) }}"
                                                class="btn btn-warning">Edit</a> --}}

                                                    <a href="{{ route('hapus-cmb', ['id' => $item->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('hapus-cmb', ['id' => $item->id]) }}"
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
