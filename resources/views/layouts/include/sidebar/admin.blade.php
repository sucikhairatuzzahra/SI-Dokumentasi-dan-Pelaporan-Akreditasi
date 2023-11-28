<ul class="pcoded-item pcoded-left-item">
    @include('layouts.include.sidebar.dashboard')
    <li class="">
        <a href="{{ route('users.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('ta.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tahun Akademik</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="">
        <a href="{{ route('ptunit.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">PT Unit</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Dosen</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href="{{ route('dosen.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dosen</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
