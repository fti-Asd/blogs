<div class="xl:col-span-3 lg:col-span-4 md:col-span-4 mx-6">
    <div
        class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900 -mt-48">
        <div class="profile-pic text-center mb-5">
            <input id="pro-img" name="profile-image" type="file" class="hidden"
                   onchange="loadFile(event)">
            <div>
                <div class="relative size-24 mx-auto">
                    <img src="{{ asset('assets/account/assets/images/client/05.jpg') }}"
                         class="rounded-full shadow dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800"
                         id="profile-image" alt="">
                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                </div>

                <div class="mt-4">
                    <h5 class="text-lg font-semibold">{{ getAuthenticatedUserFullName() }}</h5>
                    <p class="text-slate-400">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 dark:border-gray-700">
            <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                <li class="navbar-item account-menu">
                    <a href="{{ route('account.profile') }}"
                       class="navbar-link text-slate-400 flex items-center py-2 rounded">
                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                        <h6 class="mb-0 font-semibold">پروفایل</h6>
                    </a>
                </li>

                <li class="navbar-item account-menu">
                    <a href="{{ route('account.liked-news') }}"
                       class="navbar-link text-slate-400 flex items-center py-2 rounded">
                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                        <h6 class="mb-0 font-semibold">علاقه مندی ها</h6>
                    </a>
                </li>

                <li class="navbar-item account-menu">
                    <a href="{{ route('account.comments') }}"
                       class="navbar-link text-slate-400 flex items-center py-2 rounded">
                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-credit-card"></i></span>
                        <h6 class="mb-0 font-semibold">کامنت ها</h6>
                    </a>
                </li>

                <li class="navbar-item account-menu">
                    <a href="{{ route('auth.logout.index') }}"
                       class="navbar-link text-slate-400 flex items-center py-2 rounded">
                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-process"></i></span>
                        <h6 class="mb-0 font-semibold">خروج</h6>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
