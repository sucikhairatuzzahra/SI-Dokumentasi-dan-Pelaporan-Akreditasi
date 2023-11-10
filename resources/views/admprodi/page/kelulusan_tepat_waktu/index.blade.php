@extends('admprodi.layout.app')
@section('content')
  {{-- page header  --}}
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="page-header-title">
            <h5 class="m-b-10">Kelulusan Tepat Waktu</h5>
            <p class="m-b-0">Data Kelulusan Tepat Waktu</p>
          </div>
        </div>
        <div class="col-md-4">
          <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
              <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Kelulusan Tepat Waktu</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Page-header end -->
  <div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
      <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
          <!-- Basic table card start -->
          <div class="card">
            <div class="card-header">
              <h5>Kelulusan Tepat Waktu</h5>
              <a href="{{ route('tambah-kelulusan_tepatwaktu') }}">
                <span>Tambah data <code>disini</code> </span>
              </a>

              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="fa fa fa-wrench open-card-option"></i></li>
                  <li><i class="fa fa-window-maximize full-card"></i></li>
                  <li><i class="fa fa-minus minimize-card"></i></li>
                  <li><i class="fa fa-refresh reload-card"></i></li>

                </ul>
              </div>
            </div>
            <div class="card-block table-border-style">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr align="center">
                      <th scope="col" rowspan="2">
                        Tahun Masuk
                      </th>
                      <th scope="col" rowspan="2">
                        Jumlah Mahasiswa Diterima
                      </th>
                      <th scope="col" rowspan="2">
                        Tahun Lulus
                      </th>
                      <th scope="col" colspan="7">
                        Jumlah Mahasiswa Yang Lulus Pada
                      </th>
                      <th scope="col" rowspan="2">
                        Jumlah Lulusan s.d Akhir TS
                      </th>
                      <th scope="col" rowspan="2">
                        Rata-rata Masa Studi
                      </th>
                      <th scope="col" rowspan="2">
                        Jumlah Mhs, Yang Masih Aktif
                      </th>
                      <th scope="col" rowspan="2">
                        Id PT_Unit
                      </th>
                      <th scope="col" rowspan="2">
                        Keterangan
                      </th>
                    </tr>
                    <tr align="center">
                      <th>
                        Akhir TS-6
                      </th>
                      <th>
                        Akhir TS-5
                      </th>
                      <th>
                        Akhir TS-4
                      </th>
                      <th>
                        Akhir TS-3
                      </th>
                      <th>
                        Akhir TS-2
                      </th>
                      <th>
                        Akhir TS-1
                      </th>
                      <th>
                        Akhir TS
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($data)
                      @foreach ($data as $no => $item)
                        <tr align="center">
                          {{-- <td>{{ $no + 1 }}</td>  --}}
                          <td>{{ $item->tahun_masuk }}</td>
                          <td>{{ $item->jml_mhs }}</td>
                          <td>{{ $item->tahun_lulus }}</td>
                          {{-- <td>{{ $item->jml_lulusan }}</td> --}}
                          <td>{{ $item->akhir_ts_6 }}</td>
                          <td>{{ $item->akhir_ts_5 }}</td>
                          <td>{{ $item->akhir_ts_4 }}</td>
                          <td>{{ $item->akhir_ts_3 }}</td>
                          <td>{{ $item->akhir_ts_2 }}</td>
                          <td>{{ $item->akhir_ts_1 }}</td>
                          <td>{{ $item->akhir_ts }}</td>
                          <td>{{ $item->jumlah_lulusan_sampai_akhir_ts }}</td>
                          <td>{{ $item->masa_studi }}</td>
                          <td>{{ $item->jml_mhs_aktif }}</td>
                          <td>{{ $item->id_pt_unit }}</td>
                          <td>
                            <a href="{{ route('edit-kelulusan_tepatwaktu', ['id' => $item->id]) }}"
                              style="margin-right: 7px">
                              Edit
                            </a>
                            <a href="{{ route('hapus-kelulusan_tepatwaktu', ['id' => $item->id]) }}"
                              onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                              Hapus
                            </a>
                            <form id="delete-form-{{ $item->id }}"
                              action="{{ route('hapus-kelulusan_tepatwaktu', ['id' => $item->id]) }}" method="POST"
                              style="display: none;">
                              @csrf
                              @method('DELETE')
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="12">Data tidak ditemukan</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Basic table card end -->
        </div>
        <!-- Page-body end -->
      </div>
    </div>
    <!-- Main-body end -->

    <div id="styleSelector">

    </div>
  </div>
@endsection
