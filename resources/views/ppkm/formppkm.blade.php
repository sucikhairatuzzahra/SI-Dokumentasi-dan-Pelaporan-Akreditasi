@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Penelitian Dan Pengabdian</h4>
                    <p class="card-description">
                        Input Penelitian Dan Pengabdian
                    </p>

                    <form class="forms-sample" action="{{ route('simpan-ppkm') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Id ppkm</label>
                            <input type="text" class="form-control" name="pk_id_ppkm" placeholder="input id">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun Penelitian dan Pengabdin</label>
                            <input type="text" class="form-control" name="tahun" placeholder="input tahun">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Judul Penelitian dan Pengabdian</label>
                            <input type="text" class="form-control" name="judul" placeholder="input judul">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Penelitian dan Pengabdian</label>
                            <select class="form-control" name="jenis_penelitian_pengabdian">
                                <option value="penelitian">Penelitian</option>
                                <option value="pengabdian">Pengabdian</option>
                            </select>
                            <script>
                                document.getElementById('jenis').value = "";
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Id Jenis Sumber Pembiayaan</label>
                            <select class="form-control" name="id_jenis_sumber_pembiayaan">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <script>
                                document.getElementById('id_jenis_sumber_pembiayaan').value = "";
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sumber Pembiayaan</label>
                            <select class="form-control" name="sumber_pembiayaan">
                                <option value="mandiri">Mandiri</option>
                                <option value="perguruan_tinggi">Perguruan Tinggi</option>
                                <option value="lmbg_dlm_negri">Lembaga Dalam Negeri (diluar PT)</option>
                                <option value="lmbg_luar_negri">Lembaga Luar Negri</option>
                            </select>
                            <script>
                                document.getElementById('sumber_pembiayaan').value = "";
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kerjasama</label>
                            <select class="form-control" name="kerjasama">
                                <option value="y">Y</option>
                                <option value="t">T</option>
                            </select>
                            <script>
                                document.getElementById('kerjasama').value = "";
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kriteria</label>
                            <select class="form-control" name="id_kriteria">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <script>
                                document.getElementById('kerjasama').value = "";
                            </script>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light" onclick="window.history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
