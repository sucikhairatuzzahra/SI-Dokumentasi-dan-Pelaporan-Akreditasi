<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                No
            </th>
            <th scope="col" rowspan="2">
                Jenis Data
            </th>
            <th scope="col" colspan="4">
                Sistem Pengolahan Data Ditangani
            </th>

            @can('isAdmin')
                <th scope="col" rowspan="2">
                    Aksi
                </th>
            @endcan
        </tr>
        <tr align="center">
            <th>
                Secara Manual
            </th>
            <th>
                Dengan Komputer Tanpa Jaringan
            </th>
            <th>
                Dengan Komputer Serta Dapat Diakses Melalui Jaringan Lokal (LAN)
            </th>
            <th>
                Dengan Komputer Serta Dapat Diakses Melalui jaringan Luas (WAN)
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->jenis_data }}</td>
                <td>{{ $item->secara_manual }}</td>
                <td>{{ $item->tanpa_jrg }}</td>
                <td>{{ $item->lan }}</td>
                <td><a href="{{ $item->wan }}">{{ $item->wan }}</a></td>
                {{-- <td>{{ $item->ptUnit->kode_pt_unit }}</td> --}}
                @can('isAdmin')
                    <td>
                        <form action="{{ route('aksesibilitas.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('aksesibilitas.edit', ['id' => $item->id]) }}" style="margin-right: 7px">
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
