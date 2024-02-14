<!doctype html>

<head>
    @include('admin.layouts.components.custom-styles')

    
    @yield('styles')

</head>

<body>
    <div class="wrapper">
    @include('admin.layouts.header')

    @yield('content')


@include('admin.layouts.footer')
</div>


@include('admin.layouts.components.custom-scripts')


@yield('scripts')


</body>


</html>
