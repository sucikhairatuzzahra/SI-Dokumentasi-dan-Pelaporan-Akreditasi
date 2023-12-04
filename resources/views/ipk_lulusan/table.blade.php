<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                No
            </th>
            <th scope="col" rowspan="2">
                Tahun Lulus
            </th>
            <th scope="col" rowspan="2">
                Jumlah Lulusan
            </th>
            <th scope="col" colspan="3">
                Indeks Prestasi Kumulatif
            </th>
            <th scope="col" rowspan="2">
                Unit Kerja
            </th>

        </tr>
        <tr align="center">
            <th>
                Min
            </th>
            <th>
                Rata-Rata
            </th>
            <th>
                Max
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->tahun_lulus }}</td>
                <td>{{ $item->jumlah_lulusan }}</td>
                <td>{{ $item->ipk_min }}</td>
                <td>{{ $item->ipk_rata_rata }}</td>
                <td>{{ $item->ipk_max }}</td>
                <td>{{ $item->ptUnit->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>

</table>
