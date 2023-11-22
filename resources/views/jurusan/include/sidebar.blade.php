<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <b>{{ Auth::user()->name }}</b>
                        <i class="fa fa-caret-down"></i>
                    </span>

                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        {{-- <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                         --}}
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i
                                class="icon-inbox"></i>
                            {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Dashboard &amp; Mahasiswa</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('home') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-mahasiswa') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mahasiswa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>
        {{-- <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Forms &amp; Tables</div> --}}
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Sumber Daya Manusia</div>

        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('jurusan-bebandtpr') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Beban DTPR</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-kependidikan') }}" class="waves-effect waves-dark">
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
                <a href="{{ route('jurusan-sumberdana') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sumber Dana Prodi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-aksesibilitas') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Aksesibilitas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-saranaprasarana') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sarana dan Prasarana</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Luaran &amp; Capaian Tridarma</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('jurusan-ipklulusan') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">IPK Lulusan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-kelulusan_tepatwaktu') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kelulusan Tepat Waktu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-kepuasan_pengguna') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kepuasan Pengguna</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-masatunggu') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Masa Tunggu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-kerjalulusan') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bidang Kerja Lulusan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan-ppkm_dtpr') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Penelitian &amp; Pengabdian</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

    </div>
</nav>
