<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                Jenis Tenaga Kependidikan
            </th>
            <th scope="col" colspan="8">
                Jumlah Tenaga Kependidikan
            </th>
            <th scope="col" rowspan="2">
                Unit Kerja
            </th>

        </tr>
        <tr align="center">
            <th>
                S3
            </th>
            <th>
                S2
            </th>
            <th>
                S1
            </th>
            <th>
                D4
            </th>
            <th>
                D3
            </th>
            <th>
                D2
            </th>
            <th>
                D1
            </th>
            <th>
                SMA/SMK
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                <td>{{ $item->jenis_tng_kpddkn }}</td>
                <td>{{ $item->lulusan?->s3 }}</td>
                <td>{{ $item->lulusan?->s2 }}</td>
                <td>{{ $item->lulusan?->s1 }}</td>
                <td>{{ $item->lulusan?->d4 }}</td>
                <td>{{ $item->lulusan?->d3 }}</td>
                <td>{{ $item->lulusan?->d2 }}</td>
                <td>{{ $item->lulusan?->d1 }}</td>
                <td>{{ $item->lulusan?->sma }}</td>
                <td>{{ $item->unit_kerja }}</td>

            </tr>
        @endforeach
    </tbody>

</table>
