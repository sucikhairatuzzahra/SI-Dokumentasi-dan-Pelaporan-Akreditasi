<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Dashboard </div>
<ul class="pcoded-item pcoded-left-item">
    @include('layouts.include.sidebar.dashboard')

</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Mahasiswa</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('mahasiswa.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mahasiswa</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>

<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Sumber Daya Manusia</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('beban-dtpr.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Beban DTPR</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('kependidikan.index') }}" class="waves-effect waves-dark">
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
        <a href="{{ route('pendanaan.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sumber Dana Prodi</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('aksesibilitas.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Aksesibilitas</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('sarana.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sarana dan Prasarana</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Luaran &amp; Capaian Tridarma</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('ipk-lulusan.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">IPK Lulusan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('lulus-tw.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kelulusan Tepat Waktu</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('kepuasan-pengguna.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kepuasan Pengguna</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('masa-tunggu.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Masa Tunggu</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="{{ route('kerja-lulusan.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bidang Kerja Lulusan</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">PPKM</span>
            {{-- <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Penelitian &amp; Pengabdian</span> --}}
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class=" ">
                <a href="{{ route('ppkm-penelitian.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">PPKM Penelitian Infokom</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('ppkm-pengabdian.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">PPKM Pengabdian
                        Infokom</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('ppkm-dtpr.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">PPKM Dosen</span>
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
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Publikasi PPKM Dosen</span>
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
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">HKI PPKM Dosen</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>




{{-- 
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">PPKM</div>
<ul class="pcoded-item pcoded-left-item">
    <li>
        <a href="{{ route('ppkm.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">PPKM</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>

    <br>

</ul> --}}
