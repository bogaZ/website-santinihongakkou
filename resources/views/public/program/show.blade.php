@extends('public.layout.app')
@section('styles')
    @vite('resources/css/public/tinymce.scss')
@endsection
@section('content')
    @include('public._sections.banner', ['banner' => $banner])
    <!-- Service Start -->
    <section class="relative overflow-hidden">
        <div class="container mb-20">
            <div class="grid grid-cols-3 gap-6   items-start">
                <article class="col-span-3 md:col-span-2 bg-white shadow-lg p-5 relative">

                    <div class="mce-container pb-12"> {!! $program->content !!}</div>
                    <a href="{{ route('prospective-students.index', ['program' => $program->slug]) }}"
                        class="btn absolute bottom-5 left-5 bg-sky-500 text-white mt-12">
                        Daftar
                    </a>
                </article>
                <article class=" col-span-3 md:col-span-1">
                    <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white">Program Terbaru</h2>
                    <div class="grid grid-cols-2 gap-5 md:grid-cols-1 mt-5">
                        @foreach ($programs as $key => $item)
                            <x-card-program :key="$key" :item="$item" />
                        @endforeach
                    </div>

                </article>
            </div>
        </div>
        <img loading='lazy' data-aos="fade-up" data-aos-delay="200" data-aos-duration="500"
            src="{{ Vite::asset('resources/images/mountant.webp') }}" alt="montain" class="absolute right-0" width="400"
            height="auto">
        <img loading='lazy' data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000"
            src="{{ Vite::asset('resources/images/plane.webp') }}" alt="plane"
            class="absolute bottom-20 right-0 lg:right-10" width="100" height="auto">
    </section>
@endsection
@section('js')
    @vite('resources/js/public/aos-animation.js')
@endsection
