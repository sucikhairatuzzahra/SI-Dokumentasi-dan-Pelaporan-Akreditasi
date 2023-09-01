@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Sarana Dan Prasarana</h4>
                    <p class="card-description">
                        Input Data Sarana Dan Prasarana

                    <form action="/simpan-cmb" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik</label>
                            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik">
                        </div>
                        <div class="form-group">
                            <label for="daya_tampung">Daya Tampung</label>
                            <input type="text" class="form-control" id="daya_tampung" name="daya_tampung">
                        </div>
                        <div class="form-group">
                            <label for="pendaftar">Pendaftar</label>
                            <input type="text" class="form-control" id="pendaftar" name="pendaftar">
                        </div>
                        <div class="form-group">
                            <label for="lulus_seleksi">Lulus Seleksi</label>
                            <input type="text" class="form-control" id="lulus_seleksi" name="lulus_seleksi">
                        </div>
                        <div class="form-group">
                            <label for="maba_reguler">Maba Reguler</label>
                            <input type="text" class="form-control" id="maba_reguler" name="maba_reguler">
                        </div>
                        <div class="form-group">
                            <label for="maba_transfer">Maba Transfer</label>
                            <input type="text" class="form-control" id="maba_transfer" name="maba_transfer">
                        </div>
                        <div class="form-group">
                            <label for="mhs_aktif_reguler">Mahasiswa Aktif Reguler</label>
                            <input type="text" class="form-control" id="mhs_aktif_reguler" name="mhs_aktif_reguler">
                        </div>
                        <div class="form-group">
                            <label for="mhs_aktif_transfer">Mahasiswa Aktif Transfer</label>
                            <input type="text" class="form-control" id="mhs_aktif_transfer" name="mhs_aktif_transfer">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
