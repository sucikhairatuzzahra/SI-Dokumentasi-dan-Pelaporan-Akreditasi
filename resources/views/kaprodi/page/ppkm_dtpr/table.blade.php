<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col">
                No
            </th>
            <th scope="col">
                Nama DTPRs
            </th>
            <th scope="col">
                Jumlah Publikasi bertema INFOKOM
            </th>
            <th scope="col">
                Jumlah Penelitian bertema INFOKOM
            </th>
            <th scope="col">
                Jumlah penelitian bertema INFOKOM yang mendapat HKI Pengabdian Pada Masy
            </th>
            <th scope="col">
                Jumlah PkM bertema INFOKOM yang diadopsi masyarakat
            </th>
            <th scope="col">
                Jumlah PkM bertema INFOKOM yang mendapat HKI
            </th>
            <th scope="col">
                Id PT_Unit
            </th>

        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->nama_dtpr }}</td>
                <td>{{ $item->publikasi_infokom }}</td>
                <td>{{ $item->penelitian_infokom }}</td>
                <td>{{ $item->penelitian_infokom_hki }}</td>
                <td>{{ $item->pkm_infokom_adobsi }}</td>
                <td>{{ $item->pkm_infokom_hki }}</td>
                <td>{{ $item->idPtUnit->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
