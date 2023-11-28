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

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Dashboard</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Users</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('admin-users') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Dosen</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('dosen') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dosen</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Pegawai</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('pegawai') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Pegawai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Tahun Akademik</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('tahun-akademik') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-calendar"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Tahun Akademik</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">PT Unit</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('ptunit') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">PT Unit</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Luaran &amp; Luaran lain</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('luaran') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Luaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('luaranlain') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Luaran Lain</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

    </div>
</nav>
