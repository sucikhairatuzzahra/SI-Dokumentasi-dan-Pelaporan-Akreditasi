<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                No
            </th>
            <th scope="col" rowspan="2">
                Jenis Kemampuan
            </th>
            <th scope="col" colspan="4">
                Tingkat Kepuasan Pengguna (%)
            </th>
            <th scope="col" rowspan="2">
                Rencana Tindak Lanjut Oleh UPPS/PS
            </th>
            <th scope="col" rowspan="2">
                Id PT_Unit
            </th>

        </tr>
        <tr align="center">
            <th>
                Sangat Baik
            </th>
            <th>
                Baik
            </th>
            <th>
                Cukup
            </th>
            <th>
                Kurang
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->jenis_kemampuan }}</td>
                <td>{{ $item->sangat_baik }}</td>
                <td>{{ $item->baik }}</td>
                <td>{{ $item->cukup }}</td>
                <td>{{ $item->kurang }}</td>
                <td>{{ $item->rencana_tindak_lanjut }}</td>
                <td>{{ $item->idPtUnit->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
