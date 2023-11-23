@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('tambah-ppkm') }}" class="btn btn-primary">
                                <h4 class="card-title">Penelitian dan Pengabdian</h4>
                            </a>

                            <a></a>
                            <p class="card-description">
                                Create New <code>.table-striped</code>
                            </p>
                            </a>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Nama Dosen
                                            </th>
                                            <th scope="col">
                                                Tahun
                                            </th>
                                            <th scope="col">
                                                Judul
                                            </th>
                                            <th scope="col">
                                                Jenis PPKM
                                            </th>
                                            <th scope="col">
                                                Jenis Sumber Pembiayaan
                                            </th>
                                            <th scope="col">
                                                Sumber Pembiayaan
                                            </th>
                                            <th scope="col">
                                                kerjasama
                                            </th>
                                            <th scope="col">
                                                Kriteria
                                            </th>
                                            <th scope="col">
                                                Keterangan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        // dd($data);
                                        ?>
                                        @foreach ($data['admin'] as $item)
                                            <tr>
                                                {{-- <th scope="row">{{ $no++ }}</th> --}}
                                                <td>{{ $item->pk_id_ppkm }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->jenis_penelitian_pengabdian }}</td>
                                                <td>{{ $item->id_jenis_sumber_pembiayaan }}</td>
                                                <td>{{ $item->sumber_pembiayaan }}</td>
                                                <td>{{ $item->kerjasama }}</td>
                                                <td>{{ $item->id_kriteria }}</td>

                                                <td>
                                                    {{-- <a href="{{ route('edittraining', ['nim' => $item->nim]) }}"
                                                    class="btn btn-warning">Edit</a> --}}
                                                    {{-- <button
                                                    onclick="{{ route('hapus-ppkm', ['id' => $item->pk_id_ppkm]) }}"
                                                    class="btn btn-danger">Hapus</button> --}}

                                                    <a href="{{ route('hapus-ppkm', ['id' => $item->pk_id_ppkm]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->pk_id_ppkm }}').submit();">
                                                        Hapus
                                                    </a>
                                                    <form id="delete-form-{{ $item->pk_id_ppkm }}"
                                                        action="{{ route('hapus-ppkm', ['id' => $item->pk_id_ppkm]) }}"
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
    {{-- <script>
    // untuk hapus data
    function ModalHapus(url) {
        $('#ModalHapus').modal('show')
        $('#formDelete').attr('action', url);
    }
</script> --}}
    </div>
@endsection
