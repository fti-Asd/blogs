<div class="top-header">
    <div class="header-bar flex justify-between p-5 bg-white dark:bg-slate-900 shadow-sm mb-5">
        <div class="flex items-center space-x-1">
            <!-- Logo -->
            <a href="#" class="xl:hidden block me-2">
                <img src="{{ asset('assets/account/assets/images/logo-icon-32.png') }}" class="md:hidden block" alt="">
                <div class="md:block hidden">
                    <img src="{{ asset('assets/account/assets/images/logo-dark.png') }}"
                         class="inline-block dark:hidden" alt="">
                    <img src="{{ asset('assets/account/assets/images/logo-light.png') }}"
                         class="hidden dark:inline-block" alt="">
                </div>
            </a>
            <!-- Logo -->

            <!-- Searchbar -->
            <div class="ps-1.5">
                <form action="{{ route('account.profile') }}" method="GET" class="form-icon relative sm:block hidden">
                    <i class="uil uil-search absolute top-1/2 -translate-y-1/2 start-3"></i>
                    <input
                        name="search"
                        value="{{ request()->query('search') }}"
                        class="form-input w-56 h-12 rounded-full px-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                        placeholder="جستجوی خبر..."
                    >

                    <button type="submit">
                        <i class="uil uil-search absolute top-1/2 -translate-y-1/2 start-3"></i>
                    </button>
                </form>
            </div>
            <!-- Searchbar -->
        </div>

        <ul class="list-none mb-0 space-x-1">
            <!-- Notification Dropdown -->
            <li class="dropdown inline-block relative">
                <button data-dropdown-toggle="dropdown"
                        class="dropdown-toggle h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-full"
                        type="button">
                    <i data-feather="bell" class="h-4 w-4"></i>
                    <span
                        class="absolute top-0 end-0 flex items-center justify-center bg-red-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-red-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-64 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hidden"
                    onclick="event.stopPropagation();">
                                    <span class="px-4 py-4 flex justify-between">
                                        <span class="font-semibold">اطلاعیه</span>
                                        <span
                                            class="flex items-center justify-center bg-red-600/20 text-red-600 text-[10px] font-bold rounded-full w-5 max-h-5 ms-1">۳</span>
                                    </span>
                    <ul class="py-2 text-start h-64 border-t border-gray-100 dark:border-gray-800"
                        data-simplebar>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 rounded-md shadow shadow-indigo-600/10 dark:shadow-gray-700 bg-indigo-600/10 dark:bg-slate-800 text-indigo-600 dark:text-white flex items-center justify-center">
                                        <i data-feather="shopping-cart" class="h-4 w-4"></i>
                                    </div>
                                    <div class="ms-2">
                                        <span class="text-[15px] font-semibold block">سفارش کامل شد</span>
                                        <small class="text-slate-400">۱۵ دقیقه پیش</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/account/assets/images/client/04.jpg') }}"
                                         class="h-10 w-10 rounded-md shadow dark:shadow-gray-700" alt="">
                                    <div class="ms-2">
                                        <span class="text-[15px] font-semibold block"><span
                                                class="font-bold">پیام</span> از لوئیس</span>
                                        <small class="text-slate-400">۱ ساعت پیش</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 rounded-md shadow shadow-indigo-600/10 dark:shadow-gray-700 bg-indigo-600/10 dark:bg-slate-800 text-indigo-600 dark:text-white flex items-center justify-center">
                                        <i data-feather="dollar-sign" class="h-4 w-4"></i>
                                    </div>
                                    <div class="ms-2">
                                        <span class="text-[15px] font-semibold block"><span class="font-bold">یک درخواست بازپرداخت</span></span>
                                        <small class="text-slate-400">۲ ساعت پیش</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 rounded-md shadow shadow-indigo-600/10 dark:shadow-gray-700 bg-indigo-600/10 dark:bg-slate-800 text-indigo-600 dark:text-white flex items-center justify-center">
                                        <i data-feather="truck" class="h-4 w-4"></i>
                                    </div>
                                    <div class="ms-2">
                                                <span
                                                    class="text-[15px] font-semibold block">سفارش شما را تحویل داد</span>
                                        <small class="text-slate-400">دیروز</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/account/assets/images/client/05.jpg') }}"
                                         class="h-10 w-10 rounded-md shadow dark:shadow-gray-700" alt="">
                                    <div class="ms-2">
                                        <span class="text-[15px] font-semibold block"><span
                                                class="font-bold">کالی</span> شما را دنبال میکند</span>
                                        <small class="text-slate-400">۲ روز قبل</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li><!--end dropdown-->
            <!-- Notification Dropdown -->

            <!-- User/Profile Dropdown -->
            <li class="dropdown inline-block relative">
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                    <div
                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-full">
                        <img
                            src="{{ asset('assets/account/assets/images/client/05.jpg') }}" class="rounded-full" alt="">
                    </div>
                    <span class="font-semibold text-[16px] ms-1 sm:inline-block hidden">{{ getAuthenticatedUserFullName() }}</span>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hidden"
                    onclick="event.stopPropagation();">
                    <ul class="py-2 text-start">
                        <li>
                            <a href="profile.html"
                               class="block font-medium py-1 px-4 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"><i
                                    class="uil uil-user me-2"></i>پروفایل</a>
                        </li>
                        <li>
                            <a href="login.html"
                               class="block font-medium py-1 px-4 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"><i
                                    class="uil uil-sign-out-alt me-2"></i>خروج</a>
                        </li>
                    </ul>
                </div>
            </li><!--end dropdown-->
            <!-- User/Profile Dropdown -->
        </ul>
    </div>
</div>
