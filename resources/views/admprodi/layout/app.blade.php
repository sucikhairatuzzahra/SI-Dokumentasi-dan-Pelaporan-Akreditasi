<!DOCTYPE html>
<html lang="en">

<head>
    @include('admprodi.include.style')
</head>

<body>
    <div id="pcoded" class="pcoded">

        @include('admprodi.include.header')

        <div class="pcoded-main-container">

            <div class="pcoded-wrapper">

                @include('admprodi.include.sidebar')

                <div class="pcoded-content">

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
    @include('admprodi.include.script')

</body>

</html>
