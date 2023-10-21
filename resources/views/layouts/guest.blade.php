<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="{{asset('img/logo.png')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
        <style>
            @keyframes float {
                0% {
                    transform: translatey(0px);
                }
                50% {
                    transform: translatey(-20px);
                }
                100% {
                    transform: translatey(0px);
                }
            }
            .cont {
            display: flex;
            flex-direction: column;
            justify-content: center;
            }
            .logo_image {
            transform: translatey(0px);
            animation: float 6s ease-in-out infinite;
            }

        </style>
    </head>
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                 <!-- BEGIN: Login Info -->
                 <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="{{url('/')}}" class="-intro-x flex items-center pt-5">
                        <img alt="" class="w-430" src="{{asset('img/logo.png')}}" style="border-radius:30px;">
                        <span class="text-white text-lg ml-3">Service Request Management System
                    </a>
                    <div class="my-auto cont mt-10">
                        <div class="logo_image">
                            <img alt="" class="-intro-x" src="{{asset('img/smart-water-sytem-hero.svg')}}" width="300">
                        </div>
                        <div class="-intro-x text-white font-medium text-4xl leading-tight">
                            {{(!request()->routeIs('register'))?'Sign-In':'Sign-Up'}}
                             here
                            <br>
                            your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">To manage request and service.</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        @yield('content')
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="{{asset('dist/js/app.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @stack('custom-scripts')
    </body>
</html>
