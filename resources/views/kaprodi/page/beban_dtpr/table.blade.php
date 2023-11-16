<table class="table table-bordered" style="align-content: center">
    <thead>
        <tr>
            <th scope="col" rowspan="2">
                No
            </th>
            <th scope="col" rowspan="2">
                Nama Dosen
            </th>
            <th scope="col" colspan="3" style="align-content: center">
                SKS Pengajaran Pada
            </th>
            <th scope="col" rowspan="2">
                SKS Penelitian
            </th>
            <th scope="col" rowspan="2">
                SKS Pengabdian Pada Masy
            </th>
            <th scope="col" colspan="2">
                SKS Manajemen
            </th>
            <th scope="col" rowspan="2">
                Id PT Unit
            </th>

        </tr>
        <tr>
            <th>
                PS Sendiri
            </th>
            <th>
                PS Lain, PT Sendiri
            </th>
            <th>
                PT Lain
            </th>
            <th>
                PT Sendiri
            </th>
            <th>
                PT Lain
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->nama_dosen }}</td>
                <td>{{ $item->pgjrn_ps_sendiri }}</td>
                <td>{{ $item->pgjrn_ps_lain_pt_sendiri }}</td>
                <td>{{ $item->pgjrn_pt_lain }}</td>
                <td>{{ $item->sks_penelitian }}</td>
                <td>{{ $item->sks_pengabdian }}</td>
                <td>{{ $item->manajemen_pt_sendiri }}</td>
                <td>{{ $item->manajemen_pt_lain }}</td>
                <td>{{ $item->idPtUnit->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
