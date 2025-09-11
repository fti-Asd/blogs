@extends('layouts.app')

@section('content')
    <section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo-icon-64.png') }}" class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">ورود</h5>

                    @error('general')
                    <p class="text-red-600 text-sm mb-4">{{ $message }}</p>
                    @enderror

                    <form class="text-start" action="{{ route('auth.login.post') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 gap-5">
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

                            <div class="flex justify-between my-4">
                                <div class="flex items-center mb-0">
                                    <input class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">مرا به خاطر بسپار</label>
                                </div>
                                <p class="text-slate-400 mb-0"><a href="auth-re-password.html" class="text-slate-400">گذرواژه خود را فراموش کردید؟</a></p>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">
                                    ورود
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">آیا حساب کاربری دارید؟</span> <a href="{{ route('auth.register.index') }}" class="text-black dark:text-white font-bold inline-block">ثبت نام</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

    <div class="fixed bottom-3 end-3">
        <a href="{{ route('index') }}" class="back-button size-9 inline-flex items-center justify-center tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i data-feather="arrow-left" class="size-4"></i></a>
    </div>
@endsection
