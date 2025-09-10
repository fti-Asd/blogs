<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{ asset('index.html') }}">
                    <span class="inline-block dark:hidden">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" class="l-dark" height="24" alt="">
                        <img src="{{ asset('assets/images/logo-light.png') }}" class="l-light" height="24" alt="">
                    </span>
            <img src="{{ asset('assets/images/logo-light.png') }}" height="24" class="hidden dark:inline-block" alt="">
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <div class="buy-button list-none mb-0">
            @if(auth('web')->check())
                <div class="dropdown">
                    <a href="javascript:void(0)"
                       class="dropdown py-3 px-5 rounded-lg text-xs font-bold inline-block tracking-wide border align-middle duration-500 text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white">
                        <spa>{{ getAuthenticatedUserFullName() }}</spa>
                    </a>
                    <ul class="dropdown-content text-xs font-bold flex flex-col justify-between gap-6">
                        <li><a href="{{ route('account.profile') }}" class="cursor-pointer">حساب کاربری</a></li>
                        <li><a href="{{ route('auth.logout.index') }}" class="cursor-pointer text-red-600">خروج از حساب</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('auth.login.index') }}"
                   class="py-2 px-5 rounded-lg text-sm inline-block tracking-wide border align-middle duration-500 text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white">
                    ورود
                </a>
            @endif
        </div>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{ route('index') }}" class="sub-menu-item">خانه</a></li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">اخبار</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach(getNewsCategories() as $category)
                            <li class="has-submenu parent-menu-item">
                                <a href="{{ route('news.index', ['category_id' => $category['id']]) }}"> {{ $category['name'] }} </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
