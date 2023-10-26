@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Rata-Rata Beban DTPR Per Semester, Pada TS</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="/simpan-bebandtpr" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                        </div>
                        <div class="form-group">
                            <label for="pgjrn_ps_sendiri">SKS Pengajaran Pada PS Sendiri</label>
                            <input type="text" class="form-control" id="pgjrn_ps_sendiri" name="pgjrn_ps_sendiri">
                        </div>
                        <div class="form-group">
                            <label for="pgjrn_ps_lain_pt_sendiri">SKS Pengajaran Pada PS Lain PT Sendiri</label>
                            <input type="text" class="form-control" id="pgjrn_ps_lain_pt_sendiri"
                                name="pgjrn_ps_lain_pt_sendiri">
                        </div>
                        <div class="form-group">
                            <label for="pgjrn_pt_lain">SKS Pengajaran Pada PT Lain</label>
                            <input type="text" class="form-control" id="pgjrn_pt_lain" name="pgjrn_pt_lain">
                        </div>
                        <div class="form-group">
                            <label for="sks_penelitian">SKS Penelitian</label>
                            <input type="text" class="form-control" id="sks_penelitian" name="sks_penelitian">
                        </div>
                        <div class="form-group">
                            <label for="sks_pengabdian">SKS Pengabdian Pada Masyarakat</label>
                            <input type="text" class="form-control" id="sks_pengabdian" name="sks_pengabdian">
                        </div>
                        <div class="form-group">
                            <label for="manajemen_pt_sendiri">SKS Manajemen PT Sendiri</label>
                            <input type="text" class="form-control" id="manajemen_pt_sendiri"
                                name="manajemen_pt_sendiri">
                        </div>
                        <div class="form-group">
                            <label for="manajemen_pt_lain">SKS Manajemen PT Lain</label>
                            <input type="text" class="form-control" id="manajemen_pt_lain" name="manajemen_pt_lain">
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
