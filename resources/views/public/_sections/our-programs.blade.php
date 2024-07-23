<section class="pt-12 bg-gray-50 dark:bg-[#27272A] relative overflow-hidden" id="our-programs">
    <div class="container">
        <div class="flex justify-center">
            <div class="lg:w-2/3 space-y-5 text-center">
                <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="800"> @isset($homePage->section3_title)
                        {{ $homePage->section3_title }}
                    @else
                        PROGRAM KAMI
                    @endisset
                </h2>
                <div class="h-0.5 bg-sky-500 w-14 mx-auto" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="800"></div>
                <p class="text-gray-400 dark:text-gray-300/60" data-aos="fade-up" data-aos-delay="300"
                    data-aos-duration="800">{{ $homePage->section3_description }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-20">

            @forelse ($homePage->programs as $key => $item)
                <x-card-program :key="$key" :item="$item" />
            @empty
                <p class="text-center italic">Data tidak ditemukan...</p>
            @endforelse

        </div>
        <div class="text-center mx-auto" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <!-- Button -->
            <a href="{{ route('programs.index') }}"
                class="btn bg-sky-500 text-white mt-12">{{ $homePage->section3_btn_label }}<i
                    class="mdi mdi-arrow-right"></i></a>
        </div>
    </div>
    <img data-aos="fade-left" data-aos-delay="200" data-aos-duration="800"
        src="{{ Vite::asset('resources/images/Japan-cuate.svg') }}" alt="plane"
        class="absolute bottom-0 right-0 w-28 lg:w-40" width="170" height="auto">
</section>
