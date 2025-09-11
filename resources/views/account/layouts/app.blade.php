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
    <!-- Main Css -->
    <link href="{{ asset('assets/account/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/account/assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css"
          rel="stylesheet">
    <link href="{{ asset('assets/account/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/account/assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-modal.css') }}">

    @stack('custom-css')
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


<div class="page-wrapper toggled">
    <!-- sidebar-wrapper -->
{{--    @include('account.layouts.sidebar')--}}
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class=" bg-gray-50 dark:bg-slate-800 w-full">
        <!-- Top Header -->
        @include('account.layouts.header')
        <!-- Top Header -->

        <div class="container-fluid relative px-3 w-full">
            <div class="layout-specing">
                <div class="grid grid-cols-1 w-full">
                    <div
                        class="profile-banner relative text-transparent rounded-md shadow dark:shadow-gray-700 overflow-hidden">
                        <input id="pro-banner" name="profile-banner" type="file" class="hidden"
                               onchange="loadFile(event)">
                        <div class="relative shrink-0">
                            <img src="{{ asset('assets/account/assets/images/blog/bg.jpg') }}" class="h-80 w-full object-cover" id="profile-banner"
                                 alt="">
                            <div class="absolute inset-0 bg-black/70"></div>
                            <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-12 grid-cols-1 w-full">
                    <div class="xl:col-span-3 lg:col-span-3 md:col-span-4 mx-6">
                        @include('account.layouts.menu')
                    </div>

                    <div class="xl:col-span-9 lg:col-span-9 md:col-span-8 mt-6">
                        @yield('account-content')
                    </div>
                </div>
                <!-- End Content -->
            </div>

            <!-- Footer Start -->
            @include('account.layouts.footer')
            <!-- End -->
        </div>
    </main>
    <!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Start Modal -->
<dialog id="addblog" class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white">
    <div class="relative h-auto md:w-[600px] w-300px">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
            <form method="dialog">
                <button class="size-6 flex justify-center items-center shadow dark:shadow-gray-800 rounded-md btn-ghost"><i data-feather="x" class="size-4"></i></button>
            </form>
        </div>
        <div class="p-4">
            @yield('modal-content')
        </div>
    </div>
</dialog>
<!-- End Modal -->

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
<script src="{{ asset('assets/account/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/plugins.init.js') }}"></script>
<script src="{{ asset('assets/account/assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/modal.js') }}"></script>

@stack('custom-js')
<!-- JAVASCRIPTS -->
</body>
</html>
