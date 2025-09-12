@extends('admin.layouts.app')

@section('admin-content')
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-indigo-600/[0.02]"></div>
        <div class="container-fluid relative">
            <div class="md:flex items-center">
                <div class="xl:w-[30%] lg:w-1/3 md:w-1/2">
                    <div class="relative md:flex flex-col md:min-h-screen justify-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 md:px-10 py-10 px-4 z-1">
                        <div class="text-center">
                            <a href="{{ route('index') }}"><img src="{{ asset('assets/account/assets/images/logo-icon-64.png') }}" class="mx-auto" alt=""></a>
                        </div>
                        <div class="title-heading text-center md:my-auto my-20">
                            @error('general')
                            <p class="text-red-600 text-sm mb-4">{{ $message }}</p>
                            @enderror

                            <form class="text-start" action="{{ route('admin.auth.login.index') }}" method="POST">
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
                                        <button type="submit" class="py-2 px-5 inline-block cursor-pointer tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">
                                            ورود
                                        </button>
                                    </div>

                                    <div class="text-center">
                                        <span class="text-slate-400 me-2">آیا حساب کاربری دارید؟</span> <a href="{{ route('auth.register.index') }}" class="text-black dark:text-white font-bold inline-block">ثبت نام</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Techwind. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>
                    </div>
                </div>

                <div class="xl:w-[70%] lg:w-2/3 md:w-1/2 flex justify-center mx-6 md:my-auto my-20">
                    <div>
                        <div class="relative">
                            <div class="absolute top-20 start-20 bg-indigo-600/[0.02] size-[1200px] rounded-full"></div>
                            <div class="absolute bottom-20 -end-20 bg-indigo-600/[0.02] size-[600px] rounded-full"></div>
                        </div>

                        <div class="text-center">
                            <div>
                                <img src="assets/images/contact.svg" class="max-w-xl mx-auto" alt="">
                                <div class="relative max-w-xl mx-auto text-start">
                                    <div class="relative p-8 border-2 border-indigo-600 rounded-[30px] before:content-[''] before:absolute before:w-28 before:border-[6px] before:border-white dark:before:border-slate-900 before:-bottom-1 before:start-16 before:z-2 after:content-[''] after:absolute after:border-2 after:border-indigo-600 after:rounded-none after:rounded-e-[50px] after:w-20 after:h-20 after:-bottom-[80px] after:start-[60px] after:z-3 after:border-s-0 after:border-b-0">
                                            <span class="font-semibold leading-normal">
                                                کمپین خود را راه اندازی کنید و از تخصص ما در طراحی و مدیریت آخرین صفحه html Tailwind CSS با محوریت تبدیل بهره مند شوید.کمپین خود را راه اندازی کنید و از تخصص ما در طراحی و مدیریت آخرین صفحه html Tailwind CSS با محوریت تبدیل بهره مند شوید.
                                            </span>

                                        <div class="absolute text-8xl -top-0 start-4 text-indigo-600/10 dark:text-indigo-600/20 -z-1">
                                            <i class="mdi mdi-format-quote-open"></i>
                                        </div>
                                    </div>

                                    <div class="text-lg font-semibold mt-6 ms-44">
                                        - تیچ وایند
                                    </div>
                                </div>
                                <!-- <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect. Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section -->
@endsection
