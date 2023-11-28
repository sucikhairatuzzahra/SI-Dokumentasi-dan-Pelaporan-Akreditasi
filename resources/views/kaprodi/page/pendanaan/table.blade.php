<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col">
                No
            </th>
            <th scope="col">
                Sumber Dana
            </th>
            <th scope="col">
                Jumlah (dalam juta Rupiah)
            </th>
            <th scope="col">
                Bukti
            </th>
            <th scope="col">
                Keterangan
            </th>
            <th scope="col">
                Unit Kerja
            </th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        // dd($data);
        ?>
        @foreach ($data as $no => $item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->sumber_dana }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->bukti }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>

</table>
