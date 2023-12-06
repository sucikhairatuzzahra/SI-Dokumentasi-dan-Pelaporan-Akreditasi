<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                Tahun Lulus
            </th>
            <th scope="col" rowspan="2">
                Jumlah Lulusan
            </th>
            <th scope="col" rowspan="2">
                Jumlah Lulusan Yang Terlacak
            </th>
            <th scope="col" rowspan="2">
                Jumlah Kerja Bidang Infokom
            </th>
            <th scope="col" rowspan="2">
                Jumlah Kerja Bidang Non Infokom
            </th>
            <th scope="col" colspan="3">
                Lingkup Tempat Kerja
            </th>
            <th scope="col" rowspan="2">
                PT Unit
            </th>

        </tr>
        <tr align="center">
            <th>
                Internasional
            </th>
            <th>
                Nasional
            </th>
            <th>
                Wirausaha
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                {{-- <td>{{ $no + 1 }}</td> --}}
                <td>{{ $item->tahunAkademik->tahun_akademik }}</td>
                <td>{{ $item->jumlah_lulusan }}</td>
                <td>{{ $item->lulusan_terlacak }}</td>
                <td>{{ $item->bidang_infokom }}</td>
                <td>{{ $item->bidang_noninfokom }}</td>
                <td>{{ $item->internasional }}</td>
                <td>{{ $item->nasional }}</td>
                <td>{{ $item->wirausaha }}</td>
                <td>{{ $item->ptUnit->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
