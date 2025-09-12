<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="index.html"><img src="assets/images/logo-light.png" height="24" alt=""></a>
        </div>

        <ul class="sidebar-menu border-t border-white/10" data-simplebar style="height: calc(100% - 70px);">
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="uil uil-chart-line me-2"></i>داشبورد</a>
            </li>

            <li>
                <a href="{{ route('admin.user.index') }}"><i class="uil uil-user me-2"></i>مدیریت کاربر</a>
            </li>

            <li>
                <a href="{{ route('index') }}"><i class="uil uil-newspaper me-2"></i>مدیریت اخبار</a>
            </li>

            <li>
                <a href="{{ route('index') }}"><i class="uil uil-grid me-2"></i>لاگ ها</a>
            </li>

            <li>
                <a href="{{ route('index') }}"><i class="uil uil-grids me-2"></i>مدیریت دسته بندی اخبار</a>
            </li>

            <li>
                <a href="{{ route('index') }}"><i class="uil uil-user me-2"></i>مدیریت مدیران</a>
            </li>

            <li>
                <a href="{{ route('admin.auth.logout') }}" class="text-red-600"><i class="uil uil-signout me-2"></i>خروج</a>
            </li>
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
