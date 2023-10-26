@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Kesesuaian Bidang Kerja Lulusan</h4>
                    <p class="card-description">
                        Input data
                    </p>
                    <form action="{{ route('update-kerjalulusan', $editData->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus"
                                value="{{ $editData->tahun_lulus }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_lulusan">Jumlah Lulusan</label>
                            <input type="text" class="form-control" id="jumlah_lulusan" name="jumlah_lulusan"
                                value="{{ $editData->jumlah_lulusan }}">
                        </div>
                        <div class="form-group">
                            <label for="lulusan_terlacak">Jumlah Lulusan Yang Terlacak</label>
                            <input type="text" class="form-control" id="lulusan_terlacak" name="lulusan_terlacak"
                                value="{{ $editData->lulusan_terlacak }}">
                        </div>
                        <div class="form-group">
                            <label for="bidang_infokom">Jumlah Kerja Bidang Infokom</label>
                            <input type="text" class="form-control" id="bidang_infokom" name="bidang_infokom"
                                value="{{ $editData->bidang_infokom }}">
                        </div>
                        <div class="form-group">
                            <label for="non_infokom">Jumlah Kerja Bidang Non Infokom</label>
                            <input type="text" class="form-control" id="non_infokom" name="non_infokom"
                                value="{{ $editData->non_infokom }}">
                        </div>
                        <div class="form-group">
                            <label for="internasional">Internasional</label>
                            <input type="text" class="form-control" id="internasional" name="internasional"
                                value="{{ $editData->internasional }}">
                        </div>
                        <div class="form-group">
                            <label for="nasional">Nasional</label>
                            <input type="text" class="form-control" id="nasional" name="nasional"
                                value="{{ $editData->nasional }}">
                        </div>
                        <div class="form-group">
                            <label for="wirausaha">Wirausaha</label>
                            <input type="text" class="form-control" id="wirausaha" name="wirausaha"
                                value="{{ $editData->wirausaha }}">
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
