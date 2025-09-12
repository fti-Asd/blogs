@extends('admin.layouts.app')

@section('admin-content')
    <div class="flex justify-between items-center">
        <div>
            <h5 class="text-xl font-bold">{{ getAuthenticatedUserFullName('admin') }}</h5>
            <h6 class="text-slate-400 font-semibold">خوش آمدی!</h6>
        </div>
    </div>

    <!-- statistics -->
    <div class="grid xl:grid-cols-5 md:grid-cols-3 grid-cols-1 mt-6 gap-6">
        <!-- site visits -->
        <div
            class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-5 flex items-center">
                <div
                    class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-indigo-600/5 dark:bg-indigo-600/10 shadow shadow-indigo-600/5 dark:shadow-indigo-600/10 text-indigo-600">
                    <i data-feather="users" class="h-5 w-5"></i>
                </div>

                <div class="ms-3">
                    <span class="text-slate-400 font-semibold block">بازدیدکنندگان</span>
                    <div class="flex items-center justify-between mt-1">
                        <div class="text-xl font-semibold">
                            <span class="counter-value" data-target="{{ getSiteVisitsQty() }}">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
                <a href=""
                   class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-indigo-600 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white after:bg-indigo-600 dark:after:bg-white duration-500">مشاهده
                    داده ها<i class="uil uil-arrow-left"></i></a>
            </div>
        </div><!--end-->

        <!-- number of authors -->
        <div
            class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-5 flex items-center">
                <div

                    class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-indigo-600/5 dark:bg-indigo-600/10 shadow shadow-indigo-600/5 dark:shadow-indigo-600/10 text-indigo-600">
                    <i data-feather="users" class="h-5 w-5"></i>
                </div>

                <div class="ms-3">
                    <span class="text-slate-400 font-semibold block">نویسندگان</span>
                    <div class="flex items-center justify-between mt-1">
                        <div class="text-xl font-semibold">
                            <span class="counter-value" data-target="{{ getAuthorsQty() }}">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
                <a href=""
                   class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-indigo-600 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white after:bg-indigo-600 dark:after:bg-white duration-500">مشاهده
                    داده ها<i class="uil uil-arrow-left"></i></a>
            </div>
        </div><!--end-->

        <!-- nubmer of news -->
        <div
            class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-5 flex items-center">
                <div
                    class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-indigo-600/5 dark:bg-indigo-600/10 shadow shadow-indigo-600/5 dark:shadow-indigo-600/10 text-indigo-600">
                    <i data-feather="list" class="h-5 w-5"></i>
                </div>

                <div class="ms-3">
                    <span class="text-slate-400 font-semibold block">اخبار</span>
                    <div class="flex items-center justify-between mt-1">
                        <div class="text-xl font-semibold">
                            <span class="counter-value" data-target="{{ getNewsQty() }}">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
                <a href=""
                   class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-indigo-600 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white after:bg-indigo-600 dark:after:bg-white duration-500">مشاهده
                    داده ها<i class="uil uil-arrow-left"></i></a>
            </div>
        </div><!--end-->
    </div>

    <!-- bar chart -->
    <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
        <div class="lg:col-span-12">
            <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                    <h6 class="text-lg font-semibold">تجزیه و تحلیل سود / هزینه</h6>

                    <div class="position-relative lg:flex justify-between items-center gap-[24px]">
                        <!-- getting excel output -->
                        <form action="{{ route('admin.dashboard') }}"
                              class="lg:flex justify-between items-center gap-2">
                            <div class="position-relative">
                                <select
                                    class="form-select form-input w-44 py-2 h-10 border-2 border-indigo-600/20 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0"
                                    name="excel">
                                    <option value="">بازدیدکنندگان...</option>
                                    <option value="all">همه(پیش فرض)</option>
                                    <option value="last_ten_days">10 روز اخیر</option>
                                    <option value="today">امروز</option>
                                </select>
                            </div>

                            <button type="submit">
                                <div
                                    class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600/5 hover:bg-indigo-600 border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white rounded-md sm:inline-block hidden">
                                    <i class="uil uil-export"></i> خروجی
                                </div>

                                <div
                                    class="h-10 w-10 items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border bg-indigo-600/5 hover:bg-indigo-600 border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white sm:hidden inline-flex">
                                    <i class="uil uil-export"></i>
                                </div>
                            </button>
                        </form>

                        <select
                            class="form-select form-input w-28 py-2 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0"
                            id="site_visits_chart"
                            style="margin-left: 20px !important;"
                            name="chart_filter"
                        >
                            <option value="Y" selected>سالانه</option>
                            <option value="M">ماهانه</option>
                            <option value="W">هفتگی</option>
                            <option value="T">امروز</option>
                        </select>
                    </div>
                </div>
                <div id="mainchart" class="apex-chart px-4 pb-6"></div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
        <!-- today's news -->
        <div class="xl:col-span-3 lg:col-span-6">
            <div class="rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div
                    class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                    <h6 class="text-lg font-semibold">جدیدترین اخبار</h6>

                    <a href="{{ route('admin.dashboard',['sort_news' =>  request()->query('sort_news') == 'asc' ? 'desc' : 'asc']) }}"
                       class="text-slate-400 hover:text-indigo-600 dark:text-white/70 dark:hover:text-white text-[20px]"><i
                            class="mdi mdi-swap-vertical"></i></a>
                </div>

                <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                    <table class="w-full text-start">
                        <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[150px]">عنوان</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[100px]">دسته بندی</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[80px]">تاریخ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($newsItems as $news)
                            <tr>
                                <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4 font-semibold">
                                    {{ mb_substr( $news->title, 0, 20, 'UTF-8') }}
                                </th>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ $news->newsCategory->name }}
                                </td>
                                <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ getShamsiDate($news->created_at) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <p class="p-5">خبری یافت نشد</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- today's comments -->
        <div class="xl:col-span-3 lg:col-span-6">
            <div class="rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div
                    class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                    <h6 class="text-lg font-semibold">پیام های اخیر</h6>

                    <a href="{{ route('admin.dashboard', ['sort_comments' => request()->query('sort_comments') == 'asc' ? 'desc' : 'asc']) }}"
                       class="text-slate-400 hover:text-indigo-600 dark:text-white/70 dark:hover:text-white text-[20px]"><i
                            class="mdi mdi-swap-vertical"></i></a>
                </div>

                <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                    <table class="w-full text-start">
                        <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[100px]">کاربر</th>
                            <th class="text-center font-semibold text-[15px] p-4 min-w-[80px]">وضعیت</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[80px]">تاریخ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4 font-semibold">
                                    {{ getFullName($comment->user_id , null) }}
                                </th>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4 font-semibold">
                                    @switch($comment->status)
                                        @case(\App\Enums\CommentStatus::PENDING->value)
                                            <span
                                                class="bg-yellow-500/10 dark:bg-amber-600/30 text-yellow-500 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">در انتظار تایید</span>
                                            @break

                                        @case(\App\Enums\CommentStatus::ACCEPTED->value)
                                            <span
                                                class="bg-emerald-600/10 dark:bg-emerald-600/20 text-emerald-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">تایید شده</span>
                                            @break

                                        @default
                                            <span
                                                class="bg-red-600/10 dark:bg-red-600/20 text-red-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">رد شده</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ getShamsiDate($comment->created_at) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <p class="p-5">پیامی یافت نشد</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
