@extends('layouts.app')

@section('content')
    <section
        class="h-full w-full flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="h-full w-full py-10 bg-gradient-to-b from-transparent to-black">
            <div class="container relative">
                <div class="flex justify-center">
                    <div
                        class="min-w-[220px] lg:max-w-[800px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/images/logo-icon-64.png') }}"
                                 class="mx-auto"
                                 alt="لوگو"
                            >
                        </a>
                        <h5 class="my-6 text-xl font-semibold">ثبت نام</h5>

                        @error('general')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror

                        <form action="{{ route('auth.register.post') }}" method="POST" class="text-start">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <!-- first name -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="first_name">
                                        نام
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="first_name" name="first_name" value="{{ old('first_name') }}" type="text"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="هری"
                                    >

                                    @error('first_name')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- last name -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="last_name">
                                        نام خانوادگی
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="last_name" name="last_name" value="{{ old('last_name') }}" type="text"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="هری"
                                    >

                                    @error('last_name')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- national code -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="national_code">
                                        کد ملی
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="national_code" name="national_code"
                                           value="{{ old('national_code') }}"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="name@example.com"
                                    >

                                    @error('national_code')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- gender -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="gender">
                                        جنسیت
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <select name="gender"
                                            id="gender"
                                            class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                    >
                                        <option
                                            value="{{ \App\Enums\UserGender::FEMALE->value }}"
                                            {{--                                            @selected(old('gender') == \App\Enums\UserGender::FEMALE->value)--}}
                                        >
                                            زن
                                        </option>
                                        <option
                                            value="{{ \App\Enums\UserGender::MALE->value }}"
                                            {{--                                            @selected(old('gender') == \App\Enums\UserGender::MALE->value)--}}
                                        >
                                            مرد
                                        </option>
                                    </select>

                                    @error('gender')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- military service status -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="military_service_status">
                                        وضعیت نظام وظیفه
                                    </label>
                                    <select name="military_service_status"
                                            id="military_service_status"
                                            class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                    >
                                        <option
                                            value=""
                                        >
                                            وضعیت نظام وظیفه...
                                        </option>
                                        <option
                                            value="{{ \App\Enums\UserMilitaryService::EXEMPT->value }}"
                                        >
                                            معاف
                                        </option>
                                        <option
                                            value="{{ \App\Enums\UserMilitaryService::INS_SERVICE->value }}"
                                        >
                                            در حال خدمت
                                        </option>
                                        <option
                                            value="{{ \App\Enums\UserMilitaryService::END_OF_SERVICE->value }}"
                                        >
                                            پایان خدمت
                                        </option>
                                    </select>

                                    @error('military_service_status')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- mobile -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="mobile">
                                        موبایل
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="mobile"
                                           name="mobile"
                                           value="{{ old('mobile') }}"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="name@example.com"
                                    >

                                    @error('mobile')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- email -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="email">
                                        ایمیل
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           type="email"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="name@example.com"
                                    >

                                    @error('email')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- username -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="username">
                                        نام کاربری
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="username"
                                           value="{{ old('username') }}"
                                           name="username"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="name@example.com"
                                    >

                                    @error('username')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- password -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="password">
                                        رمز عبور
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="password"
                                           name="password"
                                           type="password"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="رمز عبور:"
                                    >

                                    @error('password')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- password confirmation -->
                                <div class="col-span-1">
                                    <label class="font-semibold text-sm" for="password_confirmation">
                                        تکرار رمز عبور
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           class="form-input mt-1 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                           placeholder="تکرار رمز عبور:"
                                    >

                                    @error('password_confirmation')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-3 mt-6">
                                <div class="col-span-12">
                                    <div class="w-full mb-0">
                                        <div class="mb-2">
                                            <input
                                                class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 me-2"
                                                type="checkbox"
                                                name="accept_rules"
                                                value="{{ 1 }}"
                                                id="accept_rules"

                                            @if(old('accept_rules')) {{ "checked" }} @endif
                                            >
                                            <label class="form-check-label text-slate-400"
                                                   for="accept_rules"
                                            >
                                                من تمام
                                                <a href="" class="text-indigo-600">قوانین را می پذیرم</a>
                                            </label>
                                        </div>

                                        @error('accept_rules')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <button type="submit"
                                            class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full"
                                    >
                                        ثبت نام
                                    </button>
                                </div>

                                <div class="col-span-12">
                                    <div class="text-center">
                                        <span class="text-slate-400 me-2">آیا حساب کاربری دارید؟ </span>
                                        <a href="{{ route('auth.login.index') }}"
                                           class="text-black dark:text-white font-bold inline-block">
                                            ورود
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="fixed bottom-3 end-3">
        <a href="{{ route('index') }}"
           class="back-button size-9 inline-flex items-center justify-center tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"
        >
            <i data-feather="arrow-left" class="size-4"></i>
        </a>
    </div>
@endsection
