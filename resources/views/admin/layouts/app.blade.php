<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Techwind - Tailwind CSS Multipurpose Landing & Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Multipurpose Landing & Admin Dashboard Template">
    <meta name="keywords"
          content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="2.2.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/account/assets/images/favicon.ico') }}">

    <!-- Css -->
    <link href="{{ asset('assets/account/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('assets/account/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/account/assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css"
          rel="stylesheet">
    <link href="{{ asset('assets/account/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/account/assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">

    @stack('admin-custom-css')
</head>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
<!-- Loader Start -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader End -->

<div>
    @if(!empty($isLogin))
        @yield('admin-content')
    @else
        <div class="page-wrapper toggled">
            <!-- sidebar-wrapper -->
            @include('admin.layouts.sidebar')
            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
            <main class="page-content bg-gray-50 dark:bg-slate-800">
                <!-- Top Header -->
                @include('admin.layouts.header')

                <div class="container-fluid relative px-3">
                    <div class="layout-specing">
                        <!-- Start Content -->
                        @yield('admin-content')
                        <!-- End Content -->
                    </div>
                </div><!--end container-->


                <!-- Footer Start -->
                @include('admin.layouts.footer')
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
    @endif
</div>


<!-- page-wrapper -->

<!-- Switcher -->
<div class="fixed top-[30%] -end-3 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk"/>
                <label
                    class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                    for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                    <span
                        class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
                </label>
            </span>
</div>
<!-- Switcher -->

<!-- JAVASCRIPTS -->
<script src="{{ asset('assets/account/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/apexchart.init.js') }}"></script>
<script src="{{ asset('assets/account/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/libs/jsvectormap/maps/world.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/jsvectormap.init.js') }}"></script>
<script src="{{ asset('assets/account/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/plugins.init.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/app.js') }}"></script>
<!-- JAVASCRIPTS -->

@stack('admin-custom-js')
</body>
</html>
