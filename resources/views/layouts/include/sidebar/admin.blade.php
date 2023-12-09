<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Dashboard</div>
<ul class="pcoded-item pcoded-left-item">
    @include('layouts.include.sidebar.dashboard')
</ul>

<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Kelola Data</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('users.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('dosen.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dosen</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('pegawai.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Pegawai</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('ta.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-calendar"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tahun Akademik</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>

<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Data LKPS</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('beban-dtpr.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Beban DTPR</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('kependidikan.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tenaga Kependidikan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('aksesibilitas.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Aksesibilitas</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('sarana.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Sarana dan Prasarana</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>

<ul class="pcoded-item pcoded-left-item">
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">PPkM</span>
            {{-- <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Penelitian &amp; Pengabdian</span> --}}
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">LKPS PPkM</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ route('penelitian-pengabdian.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Penelitian Pengabdian
                                DTPR</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" ">
                <a href="{{ route('ppkm-penelitian.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Penelitian Tema
                        Infokom</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('ppkm-pengabdian.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">PkM Diadobsi Masy
                        Tema
                        Infokom</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('ppkm-dtpr.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">PPkM Dosen</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('luaran-ppkm.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Publikasi PPKM</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('luaran-ppkm-dosen.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Publikasi PPkM
                        Dosen</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('luaran-lain-ppkm.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">HKI PPKM</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('luaran-lain-ppkm-dosen.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">HKI PPkM Dosen</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>


<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Referensi</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('ptunit.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit Kerja</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('luaran.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Jenis Publikasi</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('luaran-lain.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Luaran HKI</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
