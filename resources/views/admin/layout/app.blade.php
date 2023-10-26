<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.style')

</head>

<body>

    <div class="wrapper">

        @include('admin.include.header')



        @include('admin.include.sidebar')

        <div class="content-wrapper">

            @yield('content')

        </div>


    </div>
    @include('admin.include.footer')


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
