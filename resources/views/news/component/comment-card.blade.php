<div>
    <div class="mt-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('assets/images/client/01.jpg') }}"
                     class="size-11 rounded-full shadow" alt="">

                <div class="ms-3 flex-1">
                    @if($comment?->user_id == null && $comment?->admin_id == null)
                        @if($comment->name)
                            <div class="text-md font-semibold hover:text-indigo-600 duration-500">
                                <span>کاربر</span>
                                <span>:</span>
                                <span>
                                {{ $comment->name }}
                            </span>
                            </div>
                        @else
                            <p class="text-md font-semibold hover:text-indigo-600 duration-500">
                                ناشناس
                            </p>
                        @endif
                    @else
                        <div class="text-md font-semibold hover:text-indigo-600 duration-500">
                            <span>
                                {{ $comment->user_id != null ? "کاربر" : "ادمین" }}
                            </span>
                            <span>:</span>
                            <span>
                                {{ $comment->user_id != null ? getFullName($comment->user_id, null) : getFullName(null, $adminId = $comment->admin_id) }}
                            </span>
                        </div>
                    @endif

                    <p class="text-sm text-slate-400">{{ $comment->created_at->toJalali()->format('H:s Y/m/d') }}</p>
                </div>
            </div>

            @if(request()->has('commentId'))
                <a href="{{ route('news.show', ['newsId'=> $news->id ]) }}"
                   id="show-comment-form-{{$comment->id}}"
                   class="text-slate-400 hover:text-indigo-600 duration-500 ms-5 cursor-pointer">
                    بستن
                </a>
            @else
                <a href="{{ route('news.show',['newsId'=> $news->id,'commentId' => $comment->id ]) }}"
                   id="show-comment-form-{{$comment->id}}"
                   class="text-slate-400 hover:text-indigo-600 duration-500 ms-5 cursor-pointer">
                    پاسخ
                </a>
            @endif
        </div>
        <div
            class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
            <p class="text-slate-400 italic">{{ $comment->comment_text }}</p>
        </div>
    </div>

    @if(request()->has('commentId') && request()->query('commentId') == $comment->id)
        <form id="reply-comment-form-{{$comment->id}}"
              class="reply-comment-form mt-8 bg-white p-4 rounded-lg"
              action="{{ route('news.comment-reply-post', ['newsId' =>  $news->id, 'commentId' =>  $comment->id]) }}"
              method="POST">
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

                        @error("name")
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

                        @error("email")
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

                        <input
                            name="comment_id"
                            value="{{ $comment->id }}"
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

                            @error("comment_text")
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
    @endif

    <div class="ms-8">
        @foreach($comment->comments as $comment)
            @include('news.component.comment-card')
        @endforeach
    </div>
</div>
