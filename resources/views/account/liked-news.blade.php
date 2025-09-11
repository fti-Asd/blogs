@extends('account.layouts.app')

@section('account-content')
    <div class="container-fluid w-full relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">لیست اخبار لایک شده</h5>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-xs text-gray-400">
                        <tr>
                            <th class="text-start p-6">عنوان خبر</th>
                            <th class="text-start p-6">دسته بندی</th>
                            <th class="text-start p-6">نویسنده</th>
                            <th class="text-start p-6">منتشر شده در تاریخ</th>
                            <th class="text-start p-6">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($likedNewsItems as $likedNewsItem)
                            <tr class="text-xs">
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <div class="flex items-center">
                                        <a href="{{ route('news.show', $likedNewsItem->news_id) }}"
                                           class="ms-2 font-medium cursor-pointer hover:text-indigo-600">
                                            {{ mb_substr($likedNewsItem->news->title,0,30,'utf-8')."..." }}
                                        </a>
                                    </div>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <div class="flex items-center">
                                            <span class="ms-2 font-medium">
                                                {{ $likedNewsItem->news->newsCategory->name }}
                                            </span>
                                    </div>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <div class="flex items-center">
                                            <span class="ms-2 font-medium">
                                                {{ getFullName(null, $likedNewsItem->news->admin_id) }}
                                            </span>
                                    </div>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <div class="flex items-center">
                                            <span class="ms-2 font-medium">
                                                {{ getShamsiDate($likedNewsItem->news->created_at) }}
                                            </span>
                                    </div>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <a href="{{ route('account.edit-like-news', $likedNewsItem->id) }}">
                                        <img src="{{ asset('assets/icons/heart-fill.png') }}"
                                             class="w-7 w-7"
                                             alt="قلب پر"
                                        >
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <p class="p-5">خبری به لیست علاقه مندی ها اضافه نشده!</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="my-2">
                    {{ $likedNewsItems->links('pagination::tailwind') }}
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div><!--end container-->
@endsection
