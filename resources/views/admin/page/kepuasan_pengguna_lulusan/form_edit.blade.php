@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Kepuasan Pengguna Lulusan</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-pendanaan', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="jenis_kemampuan">Jenis Kemampuan</label>
                            <input type="text" class="form-control" id="jenis_kemampuan" name="jenis_kemampuan"
                                value="{{ $editData->jenis_kemampuan }}">
                        </div>
                        <div class="form-group">
                            <label for="sangat_baik">Sangat Baik</label>
                            <input type="text" class="form-control" id="sangat_baik" name="sangat_baik"
                                value="{{ $editData->sangat_baik }}">
                        </div>
                        <div class="form-group">
                            <label for="baik">Baik</label>
                            <input type="text" class="form-control" id="baik" name="baik"
                                value="{{ $editData->baik }}">
                        </div>
                        <div class="form-group">
                            <label for="cukup">Cukup</label>
                            <input type="text" class="form-control" id="cukup" name="cukup"
                                value="{{ $editData->cukup }}">
                        </div>
                        <div class="form-group">
                            <label for="kurang">Kurang</label>
                            <input type="text" class="form-control" id="kurang" name="kurang"
                                value="{{ $editData->kurang }}">
                        </div>
                        <div class="form-group">
                            <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut Oleh UPPS/PS</label>
                            <input type="text" class="form-control" id="rencana_tindak_lanjut"
                                name="rencana_tindak_lanjut" value="{{ $editData->rencana_tindak_lanjut }}">
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
