@extends('account.layouts.app')

@section('account-content')
    <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
        <div class="grid grid-cols-1 gap-6">
            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                @error('general')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                <form action="{{ route('account.profile.update') }}" method="POST" class="text-start"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="profile-pic text-center mb-5">
                        <input id="avatar_image" name="avatar_file" data-preview="avatar_preview" type="file"
                               class="hidden"
                               onchange="loadFile(event)"/>

                        <div>
                            <div class="relative mx-auto">
                                <img src="{{ $user->avatar_file_id != null ? getUserFullAvatar($user->id) : asset('assets/account/assets/images/client/05.jpg') }}"
                                     class="rounded-full w-28 h-28 object-cover mx-auto shadow dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800"
                                     id="avatar_file"
                                     alt="عکس کاربر"
                                >
                                <label class="absolute inset-0" for="avatar_image"></label>
                            </div>

                            <div class="mt-3 mb-8 font-bold">
                                تغییر عکس
                            </div>
                        </div>

                        @error('avatar_file')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- first name -->
                        <div class="col-span-1">
                            <label class="font-semibold text-sm" for="first_name">
                                نام
                                <span class="text-red-600">*</span>
                            </label>
                            <input id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                   type="text"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
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
                            <input id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                   type="text"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
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
                            <p class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent text-gray-500 dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                {{ $user->national_code }}
                            </p>
                        </div>

                        <!-- gender -->
                        <div class="col-span-1">
                            <label class="font-semibold text-sm" for="national_code">
                                جنسیت
                                <span class="text-red-600">*</span>
                            </label>
                            @switch($user->gender)
                                @case(\App\Enums\UserGender::MALE)
                                    <p class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent text-gray-500 dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        مرد
                                    </p>
                                    @break

                                @default
                                    <p class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent text-gray-500 dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        زن
                                    </p>
                                    @break
                            @endswitch
                        </div>

                        <!-- military service status -->
                        @if($user->gender == \App\Enums\UserGender::MALE->value)
                            <div class="col-span-1">
                                <label class="font-semibold text-sm" for="military_service_status">
                                    وضعیت نظام وظیفه
                                </label>
                                <select name="military_service_status"
                                        id="military_service_status"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                >
                                    <option
                                            value=""
                                    >
                                        وضعیت نظام وظیفه...
                                    </option>
                                    <option
                                            value="{{old('military_service_status', $user->military_service_status) }}"
                                            @selected($user->military_service_status == \App\Enums\UserMilitaryService::EXEMPT->value)
                                    >
                                        معاف
                                    </option>
                                    <option
                                            value="{{old('military_service_status', $user->military_service_status) }}"
                                            @selected($user->military_service_status == \App\Enums\UserMilitaryService::INS_SERVICE->value)
                                    >
                                        در حال خدمت
                                    </option>
                                    <option
                                            value="{{old('military_service_status', $user->military_service_status) }}"
                                            @selected($user->military_service_status == \App\Enums\UserMilitaryService::END_OF_SERVICE->value)
                                    >
                                        پایان خدمت
                                    </option>
                                </select>

                                @error('military_service_status')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                        <!-- mobile -->
                        <div class="col-span-1">
                            <label class="font-semibold text-sm" for="mobile">
                                موبایل
                                <span class="text-red-600">*</span>
                            </label>
                            <input id="mobile"
                                   name="mobile"
                                   value="{{ old('mobile', $user->mobile) }}"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
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
                                   value="{{ old('email', $user->email) }}"
                                   type="email"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
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
                                   value="{{ old('username', $user->username) }}"
                                   name="username"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                   placeholder="name@example.com"
                            >

                            @error('username')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- password -->
                        <div class="col-span-1">
                            <label class="font-semibold text-sm" for="password">
                                پسوورد
                                <span class="text-red-600">*</span>
                            </label>
                            <input id="password"
                                   name="password"
                                   type="password"
                                   class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                   placeholder="در صورت تمایل رمز عبور را تغییر دهید"
                            >

                            @error('password')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- password confirmation -->
                    <div class="col-span-2">
                        <label class="font-semibold text-sm" for="password_confirmation">
                            تکرار پسسورد
                            <span class="text-red-600">*</span>
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                               class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                        >

                        @error('password_confirmation')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-3 mt-6">
                        <div class="col-span-12">
                            <button type="submit"
                                    class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full"
                            >
                                ویرایش اطلاعات
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <h5 class="text-lg font-semibold mb-4 text-red-600">حذف حساب کاربری :</h5>

                <p class="text-slate-400 mb-4">آیا می خواهید اکانت را حذف کنید؟ لطفاً دکمه «حذف» را فشار
                    دهید</p>

                <a href="{{ route('account.delete-account') }}"
                   class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">حذف</a>
            </div>
        </div>
    </div>
@endsection
