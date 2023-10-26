<!DOCTYPE html>
<html lang="en">

<head>
    @include('jurusan.include.style')
</head>

<body>
    <div id="pcoded" class="pcoded">

        @include('jurusan.include.header')

        <div class="pcoded-main-container">

            <div class="pcoded-wrapper">

                @include('jurusan.include.sidebar')

                <div class="pcoded-content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
    @include('jurusan.include.script')

</body>

</html>
