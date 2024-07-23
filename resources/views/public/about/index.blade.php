@extends('public.layout.app')
@section('styles')
@endsection
@section('content')
    @include('public._sections.banner', ['banner' => $aboutpage->banner])
    <!-- Service Start -->
    <section class="relative overflow-hidden">
        <div class="container mb-20">
            @include('public.about._sections.visi-dan-misi')
            @include('public.about._sections.legality')
            @include('public.about._sections.organizational-structure')
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
