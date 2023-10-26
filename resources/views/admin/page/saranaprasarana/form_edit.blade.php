@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Pendayagunaan Sarana Dan Prasarana Utama</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-sarana', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="sarana">Sarana atau Prasarana</label>
                            <input type="text" class="form-control" id="sarana" name="sarana"
                                value="{{ $editData->sarana }}">
                        </div>
                        <div class="form-group">
                            <label for="daya_tampung">Daya Tampung</label>
                            <input type="text" class="form-control" id="daya_tampung" name="daya_tampung"
                                value="{{ $editData->daya_tampung }}">
                        </div>
                        <div class="form-group">
                            <label for="luas_ruang">Luas Ruang (m2)</label>
                            <input type="text" class="form-control" id="luas_ruang" name="luas_ruang"
                                value="{{ $editData->luas_ruang }}">
                        </div>
                        <div class="form-group">
                            <label for="jml_mhs">Jumlah Mahasiswa Yang Dilayani</label>
                            <input type="text" class="form-control" id="jml_mhs" name="jml_mhs"
                                value="{{ $editData->jml_mhs }}">
                        </div>
                        <div class="form-group">
                            <label for="jam_lyn">Jam Layanan</label>
                            <input type="text" class="form-control" id="jam_lyn" name="jam_lyn"
                                value="{{ $editData->jam_lyn }}">
                        </div>
                        <div class="form-group">
                            <label for="perangkat">Perangkat Yang Dimiliki</label>
                            <input type="text" class="form-control" id="perangkat" name="perangkat"
                                value="{{ $editData->perangkat }}">
                        </div>
                        <div class="form-group">
                            <label for="id_pt_unit">Id PT Unit</label>
                            <input type="text" class="form-control" id="id_pt_unit" name="id_pt_unit"
                                value="{{ $editData->id_pt_unit }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
