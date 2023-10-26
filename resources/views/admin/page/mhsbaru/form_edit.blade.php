@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Jumlah Calon Mahasiswa Baru</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-cmb', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="thn_akademik">Tahun Akademik</label>
                            <input type="text" class="form-control" id="thn_akademik" name="thn_akademik"
                                value="{{ $editData->thn_akademik }}">
                        </div>
                        <div class="form-group">
                            <label for="id_pt_unit">Id PT Unit</label>
                            <input type="text" class="form-control" id="id_pt_unit" name="id_pt_unit"
                                value="{{ $editData->id_pt_unit }}">
                        </div>
                        <div class="form-group">
                            <label for="daya_tampung">Daya Tampung</label>
                            <input type="text" class="form-control" id="daya_tampung" name="daya_tampung"
                                value="{{ $editData->daya_tampung }}">
                        </div>
                        <div class="form-group">
                            <label for="pendaftar">Pendaftar</label>
                            <input type="text" class="form-control" id="pendaftar" name="pendaftar"
                                value="{{ $editData->pendaftar }}">
                        </div>
                        <div class="form-group">
                            <label for="lulus_seleksi">Lulus Seleksi</label>
                            <input type="text" class="form-control" id="lulus_seleksi" name="lulus_seleksi"
                                value="{{ $editData->lulus_seleksi }}">
                        </div>
                        <div class="form-group">
                            <label for="maba_reguler">Mahasiswa Baru Reguler</label>
                            <input type="text" class="form-control" id="maba_reguler" name="maba_reguler"
                                value="{{ $editData->maba_reguler }}">
                        </div>
                        <div class="form-group">
                            <label for="maba_transfer">Mahasiswa Baru Transfer</label>
                            <input type="text" class="form-control" id="maba_transfer" name="maba_transfer"
                                value="{{ $editData->maba_transfer }}">
                        </div>
                        <div class="form-group">
                            <label for="mhs_aktif_reguler">Mahasiswa Aktif Reguler</label>
                            <input type="text" class="form-control" id="mhs_aktif_reguler" name="mhs_aktif_reguler"
                                value="{{ $editData->mhs_aktif_reguler }}">
                        </div>
                        <div class="form-group">
                            <label for="mhs_aktif_transfer">Mahasiswa Aktif Transfer</label>
                            <input type="text" class="form-control" id="mhs_aktif_transfer" name="mhs_aktif_transfer"
                                value="{{ $editData->mhs_aktif_transfer }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
