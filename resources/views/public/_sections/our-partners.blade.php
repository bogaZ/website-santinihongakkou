<section class="pt-12 bg-gray-50 dark:bg-[#27272A] relative overflow-hidden">
    <div class="container">
        <div class="flex justify-center">
            <div class="lg:w-2/3 space-y-5 text-center">
                <h1 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="800">
                    @isset($homePage->section5_title)
                        {{ $homePage->section5_title }}
                    @else
                        Mitra Kami
                    @endisset
                </h1>
                <div class="h-0.5 bg-sky-500 w-14 mx-auto" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="800"></div>
                <p class="text-gray-400 dark:text-gray-300/60" data-aos="fade-up" data-aos-delay="300"
                    data-aos-duration="800"> {{ $homePage->section5_description }}
                </p>
            </div>
        </div>

        <div class="mt-20 md:w-3/5 mx-auto overflow-hidden animate-scroll-container">
            <div class="flex gap-6 mt-3 animate-scroll w-max items-start"
                data-speed="{{ env('PARTNERS_ANIMATION_SPEED', 'medium') }}">
                @foreach ($partnerships as $item)
                    <a href="{{ $item->link }}" target="_blank" aria-label="visit partnert website"
                        class="flex flex-col gap-2 justify-start items-center group w-32">
                        <div
                            class="w-20 h-20 bg-white shadow-lg group-hover:scale-105 transition-all duration-500 rounded-full overflow-hidden flex items-center justify-center">
                            <img loading='lazy' src="{{ asset($item->image) }}" alt="{{ $item->title }}" width="100%"
                                height="auto">
                        </div>
                        <p class="text-center">{{ $item->title }}</p>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
