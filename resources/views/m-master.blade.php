<!DOCTYPE html>
<html lang="en">
@include('layout.m-header')

<head>
</head>

<body>

    @include('menu.m-menu')

    {{-- main class --}}
    <div class="container">
        @yield('content')
    </div>
    {{--/ main class --}}

    @include('layout.m-footer')
</body>
@yield('AddScript')

</html>
