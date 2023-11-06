<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.style')
</head>

<body>
    <div id="pcoded" class="pcoded">

        @include('admin.include.header')

        <div class="pcoded-main-container">

            <div class="pcoded-wrapper">

                @include('admin.include.sidebar')

                <div class="pcoded-content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
    @include('admin.include.script')

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
