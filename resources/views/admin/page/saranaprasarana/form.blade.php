@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Pendayagunaan Sarana dan Prasarana Utama</h4>
                    <p class="card-description">
                        Input Data Sarana dan Prasarana
                    </p>
                    <form action="/simpan-sarana" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="sarana">Sarana/Prasarana</label>
                            <input type="text" class="form-control" id="sarana" name="sarana">
                        </div>
                        <div class="form-group">
                            <label for="daya_tampung">Daya Tampung</label>
                            <input type="text" class="form-control" id="daya_tampung" name="daya_tampung">
                        </div>
                        <div class="form-group">
                            <label for="luas_ruang">Luas Ruang (m2)</label>
                            <input type="text" class="form-control" id="luas_ruang" name="luas_ruang">
                        </div>
                        <div class="form-group">
                            <label for="jml_mhs">Jumlah Mahasiswa yang Dilayani</label>
                            <input type="text" class="form-control" id="jml_mhs" name="jml_mhs">
                        </div>
                        <div class="form-group">
                            <label for="jam_lyn">Jam Layanan</label>
                            <input type="text" class="form-control" id="jam_lyn" name="jam_lyn">
                        </div>
                        <div class="form-group">
                            <label for="perangkat">Perangkat Yang Dimiliki</label>
                            <textarea class="form-control" id="perangkat" name="perangkat" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
