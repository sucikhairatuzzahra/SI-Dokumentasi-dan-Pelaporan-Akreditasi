@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Kualifikasi Tenaga Kependidikan</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="/simpan-kependidikan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_tng_kpddkn">Jenis Tenaga Kependidikan</label>
                            <input type="text" class="form-control" id="jenis_tng_kpddkn" name="jenis_tng_kpddkn">
                        </div>
                        <div class="form-group">
                            <label for="unit_kerja"> Unit Kerja</label>
                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
