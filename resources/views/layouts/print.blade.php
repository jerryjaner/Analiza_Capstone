<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('img/waterdistrict_logo.png')}}" rel="shortcut icon">
    <title>@yield('title')</title>
    @stack('custom-links')
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
</head>
<!-- END: Head -->
<body class="app">
    <div class="flex">
        <div class="content">
            @yield('content')
        </div>
    </div>
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener("load", window.print());
</script>
@stack('custom-scripts')
</body>
</html>