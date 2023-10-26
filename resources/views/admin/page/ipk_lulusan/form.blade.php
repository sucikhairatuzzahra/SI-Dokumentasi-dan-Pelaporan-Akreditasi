@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form IPK Lulusan</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="/simpan-ipklulusan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_lulusan">Jumlah Lulusan</label>
                            <input type="text" class="form-control" id="jumlah_lulusan" name="jumlah_lulusan">
                        </div>
                        <div class="form-group">
                            <label for="ipk_min">IPK Minimal</label>
                            <input type="text" class="form-control" id="ipk_min" name="ipk_min">
                        </div>
                        <div class="form-group">
                            <label for="ipk_rata_rata">IPK Rata-Rata</label>
                            <input type="text" class="form-control" id="ipk_rata_rata" name="ipk_rata_rata">
                        </div>
                        <div class="form-group">
                            <label for="ipk_max">IPK Maksimal</label>
                            <input type="text" class="form-control" id="ipk_max" name="ipk_max">
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
