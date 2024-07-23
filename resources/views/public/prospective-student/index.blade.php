@extends('public.layout.app')
@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
    @include('public._sections.banner', ['banner' => $banner])
    <!-- Service Start -->
    <section class="relative overflow-hidden">
        <div class="container">

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('prospective-students.store', ['program' => $program->slug]) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('post')
                @csrf
                @if (session('success'))
                    <div class="bg-green-600 text-white p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                <!-- Data Diri -->
                @include('public.prospective-student._sections.personal-form')
                {{-- DATA FAMILY --}}
                @include('public.prospective-student._sections.family-form')
                @include('public.prospective-student._sections.education-form')
                <div class="mt-6">
                    <button class="btn bg-sky-500 text-white" type="submit">
                        Simpan & Daftar
                    </button>
                </div>
            </form>

        </div>
    </section>
@endsection
@section('js')
    @vite('resources/js/public/prospective-students.js')
@endsection
