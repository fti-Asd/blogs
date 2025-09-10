<div
    class="blog relative text-sm rounded-md shadow dark:shadow-gray-800 dark:hover:bg-gray-700 overflow-hidden cursor-pointer hover:bg-gray-50">
    <img src="{{ asset('assets/images/blog/01.jpg') }}" alt="تصویر خبر">

    <div class="p-6 flex flex-col justify-between h-14">
        <div class="">
            <div class="mb-2 text-gray-500">
                <span>دسته بندی:</span>
                <span>{{ $newsItem->newsCategory->name }}</span>
            </div>

            <a href="{{ route('news.show', $newsItem->id) }}"
               class="title text-md font-medium hover:text-indigo-600 duration-500 ease-in-out"
            >
                {{ mb_substr($newsItem->title,0,50,'utf-8')."..." }}
            </a>

            <p class="text-slate-400 mt-3">دنباله عبارتی از در حال حاضر به طوری که بسیاری از مبارزات و
                {{ mb_substr($newsItem->abstract, 0, 50,'utf-8')."..." }}
            </p>
        </div>

        <div class="flex justify-between items-center mt-4">
            <a href="{{ route('news.show', $newsItem->id) }}"
               class="relative inline-block tracking-wide align-middle text-sm text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">
                بیشتر بخوانید
                <i class="uil uil-arrow-left"></i>
            </a>

            <p class="text-gray-500">{{ getShamsiDate($newsItem->created_at) }}</p>
        </div>
    </div>
</div>
