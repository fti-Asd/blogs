@extends('layouts.app')

@section('content')
    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative pb-16 flex flex-col justify-center items-center">
            <h3 class="md:text-3xl text-2xl text-center md:leading-normal leading-normal font-semibold mb-6">طبقه‌بندی
                اخبار</h3>
            <div class="flex flex-wrap justify-center items-center gap-3">
                @forelse($newsCategories as $newsCategory)
                    <a href="{{ route('news.index', ['category_id' => $newsCategory->id]) }}" class="group relative rounded-md shadow-md dark:shadow-gray-800 overflow-hidden w-60">
                        <img src="{{ asset('assets/images/food/blog/f1.jpg') }}"
                             class="group-hover:scale-105 duration-500 ease-in-out" alt="">
                        <div class="absolute inset-0 bg-slate-900/60"></div>

                        <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center">
                            <p class="text-white font-semibold text-xl mb-0">{{ $newsCategory->name }}</p>
                        </div>
                    </a>
                @empty
                    <p>
                        طبقه بندی خبری یافت نشد!
                    </p>
                @endforelse
            </div>
        </div><!--end container-->

        <div class="container relative my-4">
            <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal text-center font-semibold mb-6">
                آخرین اخبار
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px] mt-5">
                @forelse($newsItems as $newsItem)
                    @include('news.component.news-card')
                @empty
                    <p>خبری یافت نشد</p>
                @endforelse
            </div><!--end grid-->
        </div>
        <!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
