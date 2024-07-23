@extends('public.layout.app')
@section('styles')
@endsection
@section('content')
    @include('public._sections.banner', ['banner' => $programpage->banner])
    <!-- Service Start -->
    <section class="relative overflow-hidden">
        <div class="container mb-20">
            <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-20">
                @forelse ($programs as $key => $item)
                    <x-card-program :key="$key" :item="$item" />
                @empty
                    <p class="text-center italic">Data tidak ditemukan...</p>
                @endforelse

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
