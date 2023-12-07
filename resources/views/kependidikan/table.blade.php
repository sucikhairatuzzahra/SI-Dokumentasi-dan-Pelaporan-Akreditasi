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
            @can('isAdmin')
                <th scope="col" rowspan="2">
                    Aksi
                </th>
            @endcan
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

                <td>{{ $item['jenis_tenaga_kependidikan'] }}</td>
                <td>{{ $item['jenjang_counts']['s3'] ?? 0 ? count($item['jenjang_counts']['s3']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['s2'] ?? 0 ? count($item['jenjang_counts']['s2']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['s1'] ?? 0 ? count($item['jenjang_counts']['s1']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['d4'] ?? 0 ? count($item['jenjang_counts']['d4']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['d3'] ?? 0 ? count($item['jenjang_counts']['d3']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['d2'] ?? 0 ? count($item['jenjang_counts']['d2']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['d1'] ?? 0 ? count($item['jenjang_counts']['d1']) : 0 }}
                </td>
                <td>{{ $item['jenjang_counts']['sma'] ?? 0 ? count($item['jenjang_counts']['sma']) : 0 }}
                </td>
                <td>{{ $item['unit_kerja'] }}</td>
                {{-- <td>{{ $item['pt_unit'] }}</td> --}}

                @can('isAdmin')
                    <td>
                        <a href="{{ route('kependidikan.show', ['id' => $item['unit_kerja']]) }}"
                            style="margin-right: 7px">
                            Lihat
                        </a>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>

</table>