<table class="table table-bordered">
    <thead>
        <tr align="center">
            <th scope="col" rowspan="2">
                Tahun Masuk
            </th>
            <th scope="col" rowspan="2">
                Id PT_Unit
            </th>
            <th scope="col" rowspan="2">
                Jumlah Mahasiswa Diterima
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

        @foreach ($data as $no => $item)
            <tr align="center">
                {{-- <td>{{ $no + 1 }}</td>  --}}
                <td>{{ $item->tahun_masuk }}</td>
                <td>{{ $item->id_pt_unit }}</td>
                <td>{{ $item->jml_mhs }}</td>
                <td>{{ $item->ts_6 }}</td>
                <td>{{ $item->ts_5 }}</td>
                <td>{{ $item->ts_4 }}</td>
                <td>{{ $item->ts_3 }}</td>
                <td>{{ $item->ts_2 }}</td>
                <td>{{ $item->ts_1 }}</td>
                <td>{{ $item->ts }}</td>
                <td>{{ $item->jml_lulusan }}</td>
                <td>{{ $item->masa_studi }}</td>
                <td>{{ $item->jml_mhs_aktif }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
