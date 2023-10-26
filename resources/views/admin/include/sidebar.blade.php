<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="/images/faces/logoti.png">
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        {{ Auth::user()->name }}

    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mhs-baru') }}">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Mahasiswa Baru</span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-move menu-icon"></i>
                <span class="menu-title">Sumber Daya Manusia</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('bebandtpr') }}">Beban DTPR</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kependidikan') }}">Kualifikasi
                            Pendidikan</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-pie-graph menu-icon"></i>
                <span class="menu-title">Keuangan dan Sarana</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('pendanaan') }}">Sumber Dana Prodi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('aksesibilitas') }}">Aksesibilitas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sarana') }}">Sarana Prasarana</a>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Capaian Tridarma</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ipklulusan') }}">IPK Lulusan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kelulusan_tepatwaktu') }}">Kelulusan
                            Tepat
                            Waktu
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kepuasan_pengguna') }}">Kepuasan Pengguna
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('masatunggu') }}">Masa Tunggu </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kerjalulusan') }}">Bidang Kerja
                            Lulusan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ppkm_dtpr') }}">PPKM DTPR</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ppkmadmin') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Penelitian Pengabdian</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('pendanaan') }}">
                <i class="icon-pie-graph menu-icon"></i>
                <span class="menu-title">Sumber Dana Prodi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('aksesibilitas') }}">
                <i class="icon-link menu-icon"></i>
                <span class="menu-title">Aksesibilitas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sarana') }}">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Sarana Prasarana</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('kependidikan') }}">
                <i class="icon-command menu-icon"></i>
                <span class="menu-title">Tenaga Kependidikan</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-move menu-icon"></i>
                <span class="menu-title">Lulusan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ipklulusan') }}">IPK Lulusan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('masatunggu') }}">Rata2 Waktu
                            Tunggu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kelulusan_tepatwaktu') }}">Kelulusan
                            Tepat
                            Waktu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kerjalulusan') }}">Bidang Kerja
                            Lulusan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kepuasan_pengguna') }}">Kepuasan
                            Pengguna
                            Lulusan</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('bebandtpr') }}">
                <i class="icon-help menu-icon"></i>
                <span class="menu-title">Beban DTPR</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
