<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="User-Profile-Image">
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
                        {{-- <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i
                                class="icon-inbox"></i>
                            {{ __('Logout') }}
                        </a> --}}
                    </li>
                </ul>
            </div>
        </div>
        @can('isAdmin')
            @include('layouts.include.sidebar.admin')
        @else
            @include('layouts.include.sidebar.main')
        @endcan
    </div>
</nav>
