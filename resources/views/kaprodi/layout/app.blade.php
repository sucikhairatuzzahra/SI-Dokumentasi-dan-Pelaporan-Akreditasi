<!DOCTYPE html>
<html lang="en">

<head>
    @include('kaprodi.include.style')
</head>

<body>
    <div id="pcoded" class="pcoded">

        @include('kaprodi.include.header')

        <div class="pcoded-main-container">

            <div class="pcoded-wrapper">

                @include('kaprodi.include.sidebar')

                <div class="pcoded-content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
    @include('kaprodi.include.script')

</body>

</html>
