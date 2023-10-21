<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('img/logo.png')}}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @stack('custom-links')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
</head>
<!-- END: Head -->
<body class="app">
    <!-- BEGIN: Mobile Menu -->
    @include('layouts.partials.customer.mobile-nav')
    <div class="flex">
        @include('layouts.partials.customer.side-nav')
        <div class="content">
            @include('layouts.partials.customer.top-bar')
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('custom-scripts')
    @stack('modals')
    @livewireScripts
</body>
</html>