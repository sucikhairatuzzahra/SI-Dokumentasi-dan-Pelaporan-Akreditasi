<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col">
                Tahun Lulus
            </th>
            <th scope="col">
                Jumlah Lulusan
            </th>
            <th scope="col">
                Jumlah Lulusan Yang Terlacak
            </th>
            <th scope="col">
                Rata-rata Waktu Tunggu (Bulan)
            </th>
            <th scope="col">
                Unit Kerja
            </th>

        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                {{-- <td>{{ $no + 1 }}</td> --}}

                <td>{{ $item->tahun_lulus }}</td>
                <td>{{ $item->bidang?->jumlah_lulusan }}</td>
                <td>{{ $item->bidang?->lulusan_terlacak }}</td>
                <td>{{ $item->waktu_tunggu }}</td>
                <td>{{ $item->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>

</table>
