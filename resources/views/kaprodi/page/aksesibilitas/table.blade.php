<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                No
            </th>
            <th scope="col" rowspan="2">
                Jenis Data
            </th>
            <th scope="col" colspan="4">
                Sistem Pengolahan Data Ditangani
            </th>
            <th scope="col" rowspan="2">
                Unit Kerja
            </th>

        </tr>
        <tr align="center">
            <th>
                Secara Manual
            </th>
            <th>
                Dengan Komputer Tanpa Jaringan
            </th>
            <th>
                Dengan Komputer Serta Dapat Diakses Melalui Jaringan Lokal (LAN)
            </th>
            <th>
                Dengan Komputer Serta Dapat Diakses Melalui jaringan Luas (WAN)
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->jenis_data }}</td>
                <td>{{ $item->secara_manual }}</td>
                <td>{{ $item->tanpa_jrg }}</td>
                <td>{{ $item->lan }}</td>
                <td><a href="{{ $item->wan }}">{{ $item->wan }}</a></td>
                <td>{{ $item->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
