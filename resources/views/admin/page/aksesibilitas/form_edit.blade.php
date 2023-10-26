@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Edit Aksesibilitas</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-aksesibilitas', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="jenis_data">Jenis Data</label>
                            <input type="text" class="form-control" id="jenis_data" name="jenis_data"
                                value="{{ $editData->jenis_data }}">
                        </div>
                        <div class="form-group">
                            <label for="secara_manual">Sistem Pengolahan Data Secara Manual</label>
                            <input type="text" class="form-control" id="secara_manual" name="secara_manual"
                                value="{{ $editData->secara_manual }}">
                        </div>
                        <div class="form-group">
                            <label for="tanpa_jrg">Sistem Pengolahan Data Dengan Komputer Tanpa Jaringan</label>
                            <input type="text" class="form-control" id="tanpa_jrg" name="tanpa_jrg"
                                value="{{ $editData->tanpa_jrg }}">
                        </div>
                        <div class="form-group">
                            <label for="lan">Sistem Pengolahan Data Dengan LAN</label>
                            <input type="text" class="form-control" id="lan" name="lan"
                                value="{{ $editData->lan }}">
                        </div>
                        <div class="form-group">
                            <label for="wan">Sistem Pengolahan Data Dengan WAN</label>
                            <input type="text" class="form-control" id="wan" name="wan"
                                value="{{ $editData->wan }}">
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
