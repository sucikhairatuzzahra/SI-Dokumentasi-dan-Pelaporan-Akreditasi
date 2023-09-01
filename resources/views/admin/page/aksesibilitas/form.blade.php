@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Aksesibilitas</h4>
                    <p class="card-description">
                        Input Data Aksesibilitas
                    </p>
                    <form action="/simpan-aksesibilitas" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_data">Jenis Data</label>
                            <input type="text" class="form-control" id="jenis_data" name="jenis_data">
                        </div>
                        <div class="form-group">
                            <label for="secara_manual">Secara Manual</label>
                            <input type="text" class="form-control" id="secara_manual" name="secara_manual">
                        </div>
                        <div class="form-group">
                            <label for="tanpa_jrg">Dengan Komputer Tanpa Jaringan</label>
                            <input type="text" class="form-control" id="tanpa_jrg" name="tanpa_jrg">
                        </div>
                        <div class="form-group">
                            <label for="lan">Dengan Komputer Serta Dapat Diakses Melalui Jaringan Lokal (LAN)</label>
                            <input type="text" class="form-control" id="lan" name="lan">
                        </div>
                        <div class="form-group">
                            <label for="wan">Dengan Komputer Serta Dapat Diakses Melalui jaringan Luas (WAN)</label>
                            <input type="text" class="form-control" id="wan" name="wan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
