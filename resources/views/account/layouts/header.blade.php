<div class="top-header">
    <div class="header-bar fixed z-50 w-full flex justify-between p-5 bg-white dark:bg-slate-900 shadow-sm mb-5">
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
                        placeholder="جستجوی ..."
                    >

                    <button type="submit">
                        <i class="uil uil-search absolute top-1/2 -translate-y-1/2 start-3"></i>
                    </button>
                </form>
            </div>
            <!-- Searchbar -->
        </div>

        <ul class="list-none mb-0 space-x-1">
            <!-- User/Profile Dropdown -->
            <li class="dropdown inline-block relative">
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                    <div
                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-full">
                        <img
                            src="{{auth('web')->user()->avatar_file_id != null ? getUserFullAvatar(auth()->user()->id, null) : ($user->gender == \App\Enums\UserGender::FEMALE->value ? asset('assets/account/assets/images/client/05.jpg') : asset('assets/account/assets/images/client/04.jpg')) }}"
                            class="rounded-full h-8 w-8 object-cover"
                            alt="">
                    </div>
                    <span
                        class="font-semibold text-[16px] ms-1 sm:inline-block hidden">{{ getAuthenticatedUserFullName() }}</span>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hidden"
                    onclick="event.stopPropagation();">
                    <ul class="py-2 text-start">
                        <li>
                            <a href="{{ route('account.profile') }}"
                               class="block font-medium py-1 px-4 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"><i
                                    class="uil uil-user me-2"></i>پروفایل</a>
                        </li>
                        <li>
                            <a href="{{ route('index') }}"
                               class="block font-medium py-1 px-4 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"><i
                                    class="uil uil-user me-2"></i>صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="{{ route('auth.logout.index') }}"
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
