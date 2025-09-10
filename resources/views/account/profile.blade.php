@extends('account.layouts.app')

@section('account-content')
    <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
        <div class="grid grid-cols-1 gap-6">
            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <h5 class="text-lg font-semibold mb-4">جزییات شخصی :</h5>
                <form>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div>
                            <label class="form-label font-medium">نام کوچک : <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-user size-4 absolute top-3 start-4">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input type="text"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                       placeholder="نام کوچک:" id="firstname" name="name" required="">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">نام خانوادگی : <span
                                    class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-user-check size-4 absolute top-3 start-4">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <input type="text"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                       placeholder="نام خانوادگی:" id="lastname" name="name"
                                       required="">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium"> پست الکترونیک : <span
                                    class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-mail size-4 absolute top-3 start-4">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <input type="email"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                       placeholder="پست الکترونیک" name="email" required="">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">اشتغال : </label>
                            <div class="form-icon relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-bookmark size-4 absolute top-3 start-4">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <input name="name" id="occupation" type="text"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                       placeholder="اشتغال :">
                            </div>
                        </div>
                    </div><!--end grid-->

                    <div class="grid grid-cols-1">
                        <div class="mt-5">
                            <label class="form-label font-medium">شرح : </label>
                            <div class="form-icon relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-message-circle size-4 absolute top-3 start-4">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                <textarea name="comments" id="comments"
                                          class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                          placeholder="شرح : :"></textarea>
                            </div>
                        </div>
                    </div><!--end row-->

                    <input type="submit" id="submit" name="send"
                           class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5"
                           value="ذخیره تغییرات">
                </form><!--end form-->
            </div>

            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
                    <div>
                        <h5 class="text-lg font-semibold mb-4">اطلاعات تماس :</h5>

                        <form>
                            <div class="grid grid-cols-1 gap-5">
                                <div>
                                    <label class="form-label font-medium">شماره تلفن:</label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-phone size-4 absolute top-3 start-4">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                        <input name="number" id="number" type="number"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                               placeholder="تلفن :">
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">سایت اینترنتی :</label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-globe size-4 absolute top-3 start-4">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>
                                        <input name="url" id="url" type="url"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                               placeholder="آدرس اینترنتی :">
                                    </div>
                                </div>
                            </div><!--end grid-->

                            <button
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">
                                اضافه کردن
                            </button>
                        </form>
                    </div><!--end col-->

                    <div>
                        <h5 class="text-lg font-semibold mb-4">تغییر رمز عبور:</h5>
                        <form>
                            <div class="grid grid-cols-1 gap-5">
                                <div>
                                    <label class="form-label font-medium">رمز قدیمی :</label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-key size-4 absolute top-3 start-4">
                                            <path
                                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                        </svg>
                                        <input type="password"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                               placeholder="رمز قدیمی" required="">
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">رمز عبور جدید :</label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-key size-4 absolute top-3 start-4">
                                            <path
                                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                        </svg>
                                        <input type="password"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                               placeholder="رمز عبور جدید :" required="">
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">رمز عبور جدید را دوباره تایپ
                                        کنید:</label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-key size-4 absolute top-3 start-4">
                                            <path
                                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                        </svg>
                                        <input type="password"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                               placeholder="رمز عبور جدید را دوباره تایپ کنید:"
                                               required="">
                                    </div>
                                </div>
                            </div><!--end grid-->

                            <button
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">
                                ذخیره رمز عبور
                            </button>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div>

            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <h5 class="text-lg font-semibold mb-4 text-red-600">حذف حساب کاربری :</h5>

                <p class="text-slate-400 mb-4">آیا می خواهید اکانت را حذف کنید؟ لطفاً دکمه «حذف» را فشار
                    دهید</p>

                <a href=""
                   class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">حذف</a>
            </div>
        </div>
    </div>
@endsection
