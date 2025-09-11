@extends('account.layouts.app')

@push('custom-css')

@endpush

@section('account-content')
    <div class="container-fluid w-full relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">لیست نظرات شما</h5>
            </div>

            <div class="grid grid-cols-1 mt-6 min-w-[200px]">
                <div id="accordion-collapseone" data-accordion="collapse" class="mt-1">
                    <div
                        class="relative shadow text-xs dark:shadow-gray-700 my-1 rounded-md bg-white dark:bg-slate-900 overflow-hidden">
                        <div
                            class="relative overflow-x-auto py-2 px-4 grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 text-xs text-gray-400 font-bold w-full dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                            <p class="text-start py-4">عنوان خبر</p>
                            <p class="text-start py-4 hidden lg:block">دسته بندی</p>
                            <p class="text-start py-4 hidden sm:block">تاریخ ثبت نظر</p>
                            <p class="text-start py-4">وضعیت</p>
                            <p class="text-start py-4">پیام</p>
                        </div>
                    </div>

                    @forelse($comments as $comment)
                        <div
                            class="relative shadow text-xs font-medium dark:shadow-gray-700 my-2 rounded-md bg-white dark:bg-slate-900 overflow-hidden">
                            <div
                                id="accordion-collapse-heading-1"
                                class="relative overflow-x-auto py-2 px-4 grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3 w-full dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md"
                            >
                                <div class="text-start py-4 cursor-pointer hover:text-indigo-600">
                                    <a class="hidden sm:block" href="{{ route('news.show', $comment->news_id) }}">
                                        {{ mb_substr($comment->news->title,0,40,'utf-8')."..." }}
                                    </a>
                                    <a class="sm:hidden" href="{{ route('news.show', $comment->news_id) }}">
                                        {{ mb_substr($comment->news->title,0,10,'utf-8')."..." }}
                                    </a>
                                </div>
                                <div
                                    class="text-start py-4 hidden lg:block">{{ $comment->news->newsCategory->name }}</div>
                                <div
                                    class="text-start py-4 hidden sm:block">{{ getShamsiDate($comment->created_at) }}</div>
                                <div class="text-start py-4 text-start dark:border-gray-800">
                                    @switch($comment->status)
                                        @case(1)
                                            <td>
                                            <span
                                                class="bg-emerald-600/10 dark:bg-emerald-600/20 text-emerald-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">تایید شده</span>
                                            </td>
                                            @break
                                        @case(2)
                                            <td>
                                            <span
                                                class="bg-red-600/10 dark:bg-red-600/20 text-red-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">رد شده</span>
                                            </td>
                                            @break
                                        @case(0)
                                            <td>
                                            <span
                                                class="bg-yellow-500/10 dark:bg-amber-600/30 text-yellow-500 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">در انتظار تایید</span>
                                            </td>
                                            @break
                                    @endswitch
                                </div>
                                <div class="text-end py-4">
                                    <button type="button"
                                            class="flex justify-between items-center gap-1"
                                            data-accordion-target="#accordion-collapse-body-{{ $comment->id }}"
                                            aria-expanded="true"
                                            aria-controls="accordion-collapse-body-{{ $comment->id }}">
                                        <span>پیام</span>
                                        <svg data-accordion-icon class="size-4 rotate-180 shrink-0"
                                             fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div id="accordion-collapse-body-{{ $comment->id }}" class="hidden"
                                 aria-labelledby="accordion-collapse-heading-{{ $comment->id }}">
                                <div class="p-5 flex flex-col justify-between gap-3">
                                    <div class="text-slate-500 dark:text-gray-400 lg:hidden">
                                        <span class="text-slate-900 dark:text-gray-200"> دسته بندی خبر: </span>
                                        <span>{{ $comment->news->newsCategory->name }}</span>
                                    </div>
                                    <div class="text-slate-500 dark:text-gray-400 sm:hidden">
                                        <span class="text-slate-900 dark:text-gray-200">عنوان خبر:</span>
                                        <span>{{ $comment->news->title }}</span>
                                    </div>
                                    <div class="text-slate-500 dark:text-gray-400">
                                        <span class="text-slate-900 dark:text-gray-200">پیام:</span>
                                        <span>{{ $comment->comment_text }}</span>
                                    </div>
                                    <p class="text-slate-500 dark:text-gray-400 sm:hidden text-end">{{ getShamsiDate($comment->created_at) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="p-5 bg-white">خبری به لیست علاقه مندی ها اضافه نشده!</p>
                    @endforelse
                </div>

                <div class="my-2">
                    {{ $comments->links('pagination::tailwind') }}
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div><!--end container-->
@endsection
