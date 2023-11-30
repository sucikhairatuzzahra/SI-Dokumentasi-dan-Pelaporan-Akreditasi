<table class="table table-bordered">
    <thead>
        <tr style="text-align-last: center">
            <th scope="col" rowspan="2">
                Tahun Akademik
            </th>
            <th scope="col" rowspan="2">
                Daya Tampung
            </th>
            <th scope="col" colspan="2">
                Jumlah Calon Mahasiswa
            </th>
            <th scope="col" colspan="2">
                Jumlah Mahasiswa Baru
            </th>
            <th scope="col" colspan="2">
                Jumlah Mahasiswa Aktif
            </th>
            <th scope="col" rowspan="2">
                Unit Kerja
            </th>

        </tr>
        <tr align="center">
            <th>
                Pendaftar
            </th>
            <th>
                Lulus Seleksi
            </th>
            <th>
                Reguler
            </th>
            <th>
                Transfer
            </th>
            <th>
                Reguler
            </th>
            <th>
                Transfer
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $no => $item)
            <tr align="center">
                {{-- <td>{{ $no + 1 }}</td> --}}
                <td>{{ $item->tahunAkademik->tahun_akademik }}</td>
                <td>{{ $item->daya_tampung }}</td>
                <td>{{ $item->pendaftar }}</td>
                <td>{{ $item->lulus_seleksi }}</td>
                <td>{{ $item->maba_reguler }}</td>
                <td>{{ $item->maba_transfer }}</td>
                <td>{{ $item->mhs_aktif_reguler }}</td>
                <td>{{ $item->mhs_aktif_transfer }}</td>
<<<<<<< HEAD:resources/views/kaprodi/page/mhsbaru/table.blade.php
                <td>{{ $item->kode_pt_unit }}</td>
=======
                <td>{{ $item->ptUnit->kode_pt_unit }}</td>
>>>>>>> origin/prefered_dev:resources/views/mahasiswa/table.blade.php
            </tr>
        @endforeach
    </tbody>

</table>
