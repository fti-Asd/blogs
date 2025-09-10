@extends('layouts.app')

@section('content')
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-8 md:col-span-6">
                    <!-- news information -->
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800">

                        <img src="{{ asset('assets/images/blog/slide02.jpg') }}" class="rounded-md" alt="">

                        <div class="mt-6">
                            <p class="text-lg font-bold">{{ $news->title }}</p>
                            <p class="text-slate-400 italic border-x-4 border-indigo-600 rounded-ss-xl rounded-ee-xl mt-3 p-3">
                                "{{ $news->abstract }}"
                            </p>
                            <p class="text-slate-400 mt-3">{{ $news->description }}</p>
                        </div>

                        <div class="my-4 flex justify-end items-center gap-3">
                            <p class="my-auto">{{ number_format($news->like_qty) }}</p>

                            @if(auth('web')->check())
                                <form action="{{ route('news.like') }}" method="POST" class="my-auto">
                                    @csrf

                                    <input name="user_id" value="{{ auth('web')->user()->id }}"
                                           hidden/>
                                    <input name="news_id" value="{{ $news->id }}"
                                           hidden/>

                                    <button type="submit" class="flex justify-center items-center">
                                        @if($isUserLikeNews)
                                            <img width="20" height="20" src="{{ asset('assets/icons/heart-fill.png') }}"
                                                 alt="لایک خبر"/>
                                        @else
                                            <img width="20" height="20"
                                                 src="{{ asset('assets/icons/heart-empty.png') }}"
                                                 alt="لایک خبر"/>
                                        @endif
                                    </button>
                                </form>
                            @else
                                <div onclick="alert('لطفا ابتدا ثبت نام کنید')">
                                    <img width="20" height="20" src="{{ asset('assets/icons/heart-empty.png') }}"
                                         alt="لایک خبر"/>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- comments -->
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                        <h5 class="text-lg font-semibold">نظرات:</h5>

                        @forelse($comments as $comment)
                            <div class="bg-gray-100 my-6 rounded-lg py-4 px-5">
                                @include('news.component.comment-card')
                            </div>
                        @empty
                            <p class="my-3 text-gray-500">نظری ثبت نشده است.</p>
                        @endforelse
                    </div>

                    <!-- leave comment -->
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                        <h5 class="text-lg font-semibold">پیام بگذارید:</h5>

                        @error('general')
                        <p class="text-red-600 text-sm mt-8">{{ $message }}</p>
                        @enderror

                        <form class="mt-8" action="{{ route('news.post-comment', $news->id) }}" method="POST">
                            @csrf

                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="name" class="font-semibold">اسم شما:</label>
                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-user size-4 absolute top-3 start-4">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <input name="name" id="name" type="text"
                                                   class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                                   placeholder="نام :">
                                        </div>

                                        @error('name')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">ایمیل شما:</label>
                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-mail size-4 absolute top-3 start-4">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                            <input name="email" id="email" type="email"
                                                   class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                                   placeholder="ایمیل :">
                                        </div>

                                        @error('email')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="comment_text" class="font-semibold">نظر شما:</label>

                                        <input
                                            name="user_id"
                                            value="{{ auth('web')?->user()?->id }}"
                                            hidden
                                        >

                                        <input
                                            name="admin_id"
                                            value="{{ auth('admin')?->user()?->id }}"
                                            hidden
                                        >

                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-message-circle size-4 absolute top-3 start-4">
                                                <path
                                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                            </svg>
                                            <textarea name="comment_text"
                                                      id="comment_text"
                                                      class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                                      placeholder="پیام :"></textarea>

                                            @error('comment_text')
                                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit"
                                    class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">
                                ارسال پیام
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div class="sticky top-20">
                        <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center">
                            نویسنده</h5>
                        <div class="text-center mt-8">
                            <img src="{{ asset('assets/images/client/05.jpg') }}"
                                 class="size-24 mx-auto rounded-full shadow mb-4" alt="">

                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">کریستینا
                                رامسی</a>
                            <p class="text-slate-400">نویسنده محتوا</p>
                        </div>

                        <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                            پست اخیر</h5>
                        <div class="flex items-center mt-8">
                            <img src="{{ asset('assets/images/blog/06.jpg') }}"
                                 class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                            <div class="ms-3">
                                <a href="" class="font-semibold hover:text-indigo-600">بازرگانی مشاور</a>
                                <p class="text-sm text-slate-400">11 اردیبهشت 1401</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-4">
                            <img src="{{ asset('assets/images/blog/07.jpg') }}"
                                 class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                            <div class="ms-3">
                                <a href="" class="font-semibold hover:text-indigo-600">کسب و کار خود را رشد دهید</a>
                                <p class="text-sm text-slate-400">11 اردیبهشت 1401</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-4">
                            <img src="{{ asset('assets/images/blog/08.jpg') }}"
                                 class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                            <div class="ms-3">
                                <a href="" class="font-semibold hover:text-indigo-600">به تعادل با شکوه نگاه کنید</a>
                                <p class="text-sm text-slate-400">11 اردیبهشت 1401</p>
                            </div>
                        </div>

                        <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                            سایت های اجتماعی</h5>
                        <ul class="list-none text-center mt-8">
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-facebook size-4">
                                        <path
                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-instagram size-4">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-twitter size-4">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-linkedin size-4">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                        <rect x="2" y="9" width="4" height="12"></rect>
                                        <circle cx="4" cy="4" r="2"></circle>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-github size-4">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-youtube size-4">
                                        <path
                                            d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                    </svg>
                                </a></li>
                            <li class="inline"><a href=""
                                                  class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-gitlab size-4">
                                        <path
                                            d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42 0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.51L23 13.45a.84.84 0 0 1-.35.94z"></path>
                                    </svg>
                                </a></li>
                        </ul><!--end icon-->

                        <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                            برچسب ها</h5>
                        <ul class="list-none text-center mt-8">
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">کسب
                                    و کار</a></li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">دارایی،
                                    مالیه، سرمایه گذاری</a></li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">بازار
                                    یابی</a></li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">روش</a>
                            </li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">عروس</a>
                            </li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">سبک
                                    زندگی</a></li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">مسافرت
                                    رفتن</a></li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">زیبایی</a>
                            </li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">ویدیو</a>
                            </li>
                            <li class="inline-block m-2"><a href=""
                                                            class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-md shadow dark:shadow-gray-800 duration-500">سمعی</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section>
@endsection


{{--@push('custom-js')--}}
{{--    <script src="{{ asset('assets/js/news/showComment.js') }}"></script>--}}
{{--@endpush--}}
