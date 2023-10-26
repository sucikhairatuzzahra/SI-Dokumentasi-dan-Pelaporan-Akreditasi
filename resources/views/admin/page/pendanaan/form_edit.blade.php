@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Sumber Pendanaan Program Studi</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-pendanaan', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana</label>
                            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana"
                                value="{{ $editData->sumber_dana }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                value="{{ $editData->jumlah }}">
                        </div>
                        <div class="form-group">
                            <label for="bukti">Bukti</label>
                            <input type="text" class="form-control" id="bukti" name="bukti"
                                value="{{ $editData->bukti }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ $editData->keterangan }}">
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
