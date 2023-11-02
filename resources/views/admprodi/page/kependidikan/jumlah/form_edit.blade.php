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
                    <form action="{{ route('update-kependidikan', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="sma">SMA/SMK</label>
                            <input type="text" class="form-control" id="sma" name="sma"
                            value="{{ $editData->sma }}">
                        </div>
                        <div class="form-group">
                            <label for="d1">D1</label>
                            <input type="text" class="form-control" id="d1" name="d1"
                            value="{{ $editData->s1 }}">
                        </div>
                        <div class="form-group">
                            <label for="d2">D2</label>
                            <input type="text" class="form-control" id="d2" name="d2">
                        </div>
                        <div class="form-group">
                            <label for="d3">D3</label>
                            <input type="text" class="form-control" id="d3" name="d3">
                        </div>
                        <div class="form-group">
                            <label for="d4">D4</label>
                            <input type="text" class="form-control" id="d4" name="d4">
                        </div>
                        <div class="form-group">
                            <label for="s1">S1</label>
                            <input type="text" class="form-control" id="s1" name="s1">
                        </div>
                        <div class="form-group">
                            <label for="s2">S2</label>
                            <input type="text" class="form-control" id="s2" name="s2">
                        </div>
                        <div class="form-group">
                            <label for="s3">S3</label>
                            <input type="text" class="form-control" id="s3" name="s3">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
