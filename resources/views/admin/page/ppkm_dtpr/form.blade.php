@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Penelitian dan Kegiatan Pengabdian kepada Masyarakat dari DTPR</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="/simpan-ppkm_dtpr" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_dtpr">Nama DTPRs</label>
                            <input type="text" class="form-control" id="nama_dtpr" name="nama_dtpr">
                        </div>
                        <div class="form-group">
                            <label for="publikasi_infokom">Jumlah Publikasi bertema INFOKOM</label>
                            <input type="text" class="form-control" id="publikasi_infokom" name="publikasi_infokom">
                        </div>
                        <div class="form-group">
                            <label for="penelitian_infokom">Jumlah Penelitian bertema INFOKOM</label>
                            <input type="text" class="form-control" id="penelitian_infokom" name="penelitian_infokom">
                        </div>
                        <div class="form-group">
                            <label for="penelitian_infokom_hki">Jumlah penelitian bertema INFOKOM yang mendapat HKI
                                Pengabdian Pada Masy</label>
                            <input type="text" class="form-control" id="penelitian_infokom_hki"
                                name="penelitian_infokom_hki">
                        </div>
                        <div class="form-group">
                            <label for="pkm_infokom_adobsi">Jumlah PkM bertema INFOKOM yang diadopsi masyarakat</label>
                            <input type="text" class="form-control" id="pkm_infokom_adobsi" name="pkm_infokom_adobsi">
                        </div>
                        <div class="form-group">
                            <label for="pkm_infokom_hki">Jumlah PkM bertema INFOKOM yang mendapat HKI</label>
                            <input type="text" class="form-control" id="pkm_infokom_hki" name="pkm_infokom_hki">
                        </div>
                        <div class="form-group">
                            <label for="id_pt_unit">Id PT Unit</label>
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
