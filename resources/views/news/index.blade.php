@extends('layouts.app')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/news/news-index.css') }}">
@endpush

@section('content')
    <section class="relative md:py-24 py-16">
        <div class="container relative my-3">
            <!-- title -->
            <div class="text-2xl md:leading-normal leading-normal text-center font-semibold mb-12">
                <span>اخبار</span>
                <span>{{ $categoryName?->name }}</span>
            </div>

            <!-- filters -->
            <div class="flex justify-between items-center w-full">
                <div
                    id="myBtn"
                    class="show-modal-btn py-2 px-3 rounded-lg text-sm tracking-wide border align-middle duration-500 text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white">
                    <img height="20" width="20" src="{{ asset('assets/icons/filter-menu.png') }}" alt="فیلتر"/>
                </div>

                <!-- sorting & filtering by categoryId -->
                <form class="filter-form" action="{{ route('news.index') }}" method="GET"
                      class="flex justify-between items-center gap-2">
                    <select name="sort"
                            id="sort"
                            class="form-input w-40 py-2 px-3 h-10 text-sm rounded-lg bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                    >
                        <option
                            value=""
                            @selected(request()->query('sort') == "")
                        >
                            مرتب سازی بر اساس...
                        </option>
                        <option
                            value="newest"
                            @selected(request()->query('sort') == "newest")
                        >
                            جدیدترین
                        </option>
                        <option
                            value="most_popular"
                            @selected(request()->query('sort') == "most_popular")
                        >
                            محبوبترین
                        </option>
                        <option
                            value="most_visited"
                            @selected(request()->query('sort') == "most_visited")
                        >
                            پربیننده ترین
                        </option>
                        <option
                            value="oldest"
                            @selected(request()->query('sort') == "oldest")
                        >
                            قدیمی ترین
                        </option>
                    </select>

                    <select name="category_id"
                            id="category_id"
                            class="form-input w-40 py-2 px-3 h-10 text-sm rounded-lg bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                    >
                        <option
                            value=""
                            @if(request()->query('category_id') == "") selected @endif
                        >
                            طبقه بندی خبر...
                        </option>
                        <option
                            value="all"
                            @if(request()->query('category_id') == "all") selected @endif
                        >
                            همه
                        </option>
                        @foreach($newsCategories as $newsCategory)
                            <option
                                value="{{ $newsCategory->id }}"

                                @if(request()->query('category_id') == $newsCategory->id) selected @endif
                            >
                                {{ $newsCategory->name }}
                            </option>
                        @endforeach
                    </select>

                    {{--hidden inputs--}}
                    <input
                        name="search"
                        value="{{ request()->query('search') }}"
                        hidden
                    >
                    <input
                        name="page"
                        value="{{ request()->query('page') }}"
                        hidden
                    >

                    <button type="submit"
                            class="py-2 px-5 rounded-lg text-sm inline-block tracking-wide border align-middle duration-500 text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                    >
                        اعمال
                    </button>
                </form>

                <!-- search -->
                <div class="search-form">
                    <form action="{{ route('news.index') }}" method="GET"
                          class="flex justify-between items-center gap-3 relative">
                        <input
                            name="search"
                            value="{{ request()->query('search') }}"
                            class="form-input w-72 h-12 rounded-full pe-14 bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                            placeholder="جستجوی خبر..."
                        >

                        {{--hidden inputs--}}
                        <input
                            name="category_id"
                            value="{{ request()->query('category_id') }}"
                            hidden
                        >
                        <input
                            name="sort"
                            value="{{ request()->query('sort') }}"
                            hidden
                        >
                        <input
                            name="page"
                            value="{{ request()->query('page') }}"
                            hidden
                        >

                        <button type="submit"
                                class="w-10 h-10 absolute end-1 bottom-1/2 translate-y-1/2 flex justify-center items-center rounded-full tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white">
                            <img height="20" width="20" src="{{ asset('assets/icons/search.png') }}" alt="جستجو">
                        </button>
                    </form>
                </div>
            </div>

            <!-- news list -->
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px] mt-5">
                @forelse($newsItems as $newsItem)
                    @include('news.component.news-card')
                @empty
                    <p>خبری یافت نشد</p>
                @endforelse
            </div><!--end grid-->

            <div class="my-3">
                {{ $newsItems->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
@endsection

@section('modal-content')
    <div class="">
        <!-- search -->
        <form action="{{ route('news.index') }}" method="GET"
              class="flex justify-between items-center gap-3 relative mt-4 mb-10">
            <input
                name="search"
                value="{{ request()->query('search') }}"
                class="form-input w-full h-12 rounded-full pe-14 bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                placeholder="جستجوی خبر..."
            >

            {{--hidden inputs--}}
            <input
                name="category_id"
                value="{{ request()->query('category_id') }}"
                hidden
            >
            <input
                name="sort"
                value="{{ request()->query('sort') }}"
                hidden
            >
            <input
                name="page"
                value="{{ request()->query('page') }}"
                hidden
            >

            <button type="submit"
                    class="w-10 h-10 absolute end-1 bottom-1/2 translate-y-1/2 flex justify-center items-center rounded-full tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white">
                <img height="20" width="20" src="{{ asset('assets/icons/search.png') }}" alt="جستجو">
            </button>
        </form>

        <!-- sorting & filtering by categoryId -->
        <form action="{{ route('news.index') }}" method="GET"
              class="flex flex-col justify-between items-center gap-5">
            <select name="sort"
                    id="sort"
                    class="form-input w-full py-2 px-3 h-10 text-sm rounded-lg bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
            >
                <option
                    value=""
                    @selected(request()->query('sort') == "")
                >
                    مرتب سازی بر اساس...
                </option>
                <option
                    value="newest"
                    @selected(request()->query('sort') == "newest")
                >
                    جدیدترین
                </option>
                <option
                    value="most_popular"
                    @selected(request()->query('sort') == "most_popular")
                >
                    محبوبترین
                </option>
                <option
                    value="most_visited"
                    @selected(request()->query('sort') == "most_visited")
                >
                    پربیننده ترین
                </option>
                <option
                    value="oldest"
                    @selected(request()->query('sort') == "oldest")
                >
                    قدیمی ترین
                </option>
            </select>

            <select name="category_id"
                    id="category_id"
                    class="form-input w-full py-2 px-3 h-10 text-sm rounded-lg bg-transparent dark:bg-slate-900 dark:text-slate-200 outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
            >
                <option
                    value=""
                    @if(request()->query('category_id') == "") selected @endif
                >
                    طبقه بندی خبر...
                </option>
                <option
                    value="all"
                    @if(request()->query('category_id') == "all") selected @endif
                >
                    همه
                </option>
                @foreach($newsCategories as $newsCategory)
                    <option
                        value="{{ $newsCategory->id }}"

                        @if(request()->query('category_id') == $newsCategory->id) selected @endif
                    >
                        {{ $newsCategory->name }}
                    </option>
                @endforeach
            </select>

            {{--hidden inputs--}}
            <input
                name="search"
                value="{{ request()->query('search') }}"
                hidden
            >
            <input
                name="page"
                value="{{ request()->query('page') }}"
                hidden
            >

            <button type="submit"
                    class="py-2 px-5 w-full rounded-lg text-sm inline-block tracking-wide border align-middle duration-500 text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
            >
                اعمال
            </button>
        </form>
    </div>
@endsection
