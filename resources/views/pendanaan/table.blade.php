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
            @can('isAdmProdi')
                <th scope="col" rowspan="2">
                    Aksi
                </th>
            @endcan
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
                <td>{{ $item->ptUnit->kode_pt_unit }}</td>
                @can('isAdmProdi')
                    <td>
                        <form action="{{ route('pendanaan.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pendanaan.edit', ['id' => $item->id]) }}" style="margin-right: 7px">
                                Edit
                            </a>
                            <button type="submit" class="btn btn-link">Hapus</button>
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>

</table>
