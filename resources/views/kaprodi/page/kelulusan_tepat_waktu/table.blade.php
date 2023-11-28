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
                Unit Kerja
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
                    <td>{{ $item->jumlah_lulusan_sampai_ts }}</td>
                    <td>{{ $item->masa_studi }}</td>
                    <td>{{ $item->jml_mhs_aktif }}</td>
                    <td>{{ $item->kode_pt_unit }}</td>

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
