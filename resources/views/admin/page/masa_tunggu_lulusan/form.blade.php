@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Rata-rata Masa Tunggu Lulusan Untuk Bekerja Pertama Kali</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="/simpan-masatunggu" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                        </div>
                        {{-- <div class="form-group">
                            <label for="jumlah_lulusan">Jumlah Lulusan</label>
                            <input type="text" class="form-control" id="jumlah_lulusan" name="jumlah_lulusan">
                        </div>
                        <div class="form-group">
                            <label for="lulusan_terlacak">Jumlah Lulusan Yang Terlacak</label>
                            <input type="text" class="form-control" id="lulusan_terlacak" name="lulusan_terlacak">
                        </div> --}}
                        <div class="form-group">
                            <label for="waktu_tunggu">Rata-rata Waktu Tunggu (Bulan)</label>
                            <input type="text" class="form-control" id="waktu_tunggu" name="waktu_tunggu">
                        </div>
                        <div class="form-group">
                            <label for="id_pt_unit">Id PT PT Unit</label>
                            <input type="text" class="form-control" id="id_pt_unit" name="id_pt_unit">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
