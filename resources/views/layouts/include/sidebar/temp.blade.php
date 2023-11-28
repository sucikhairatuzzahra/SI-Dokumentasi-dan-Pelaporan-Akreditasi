<ul class="pcoded-item pcoded-left-item">
    @include('layouts.include.sidebar.dashboard')
    <li class="">
        <a href="{{ route('admin-users') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('tahun-akademik') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tahun Akademik</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('ptunit') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">PT Unit</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

</ul>

<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Mahasiswa</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('admin-mahasiswa') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mahasiswa</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Sumber Daya Manusia</div>

<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('admin-bebandtpr') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Beban DTPR</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-kependidikan') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tenaga Kependidikan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <br>

</ul>

<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Keuangan dan Sarana</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('admin-sumberdana') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sumber Dana Prodi</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-aksesibilitas') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Aksesibilitas</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-saranaprasarana') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sarana dan Prasarana</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Luaran &amp; Capaian Tridarma</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('admin-ipklulusan') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">IPK Lulusan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-kelulusan_tepatwaktu') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kelulusan Tepat Waktu</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-kepuasan_pengguna') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kepuasan Pengguna</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-masatunggu') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Masa Tunggu</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-kerjalulusan') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bidang Kerja Lulusan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin-ppkm_dtpr') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Penelitian &amp; Pengabdian</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>