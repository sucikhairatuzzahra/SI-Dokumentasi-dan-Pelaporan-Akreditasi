<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col">
                No
            </th>
            <th scope="col">
                Sarana/ Prasarana
            </th>
            <th scope="col">
                Daya Tampung
            </th>
            <th scope="col">
                Luas Ruang (m2)
            </th>
            <th scope="col">
                Jumlah Mhs Yang Dilayani
            </th>
            <th scope="col">
                Jam Layanan
            </th>
            <th scope="col">
                Perangkat Yang Dimiliki
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
                <td>{{ $item->sarana }}</td>
                <td>{{ $item->daya_tampung }}</td>
                <td>{{ $item->luas_ruang }}</td>
                <td>{{ $item->jml_mhs }}</td>
                <td>{{ $item->jam_lyn }}</td>
                <td>{{ $item->perangkat }}</td>
                <td>{{ $item->kode_pt_unit }}</td>

            </tr>
        @endforeach
    </tbody>

</table>
