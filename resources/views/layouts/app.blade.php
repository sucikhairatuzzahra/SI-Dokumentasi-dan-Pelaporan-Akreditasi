<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.include.style')
</head>

<body>
    <div id="pcoded" class="pcoded">

        @include('layouts.include.header')

        <div class="pcoded-main-container">

            <div class="pcoded-wrapper">

                @include('layouts.include.sidebar')

                <div class="pcoded-content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
    @include('layouts.include.script')

    @stack('addon-script')

    @stack('js')

    @if (session('pesan'))
        <script>
            Swal.fire({
                icon: 'pesan',
                title: '{{ session('pesan') }}',
            })
        </script>
    @endif
</body>

</html>
