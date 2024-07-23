    <!-- Service Start -->
    <section class="relative overflow-hidden">
        <div class="container mb-20">
            <div class="flex justify-center mx-5">
                <div class="lg:w-2/3 space-y-5 text-center">
                    <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white">
                        @isset($homePage->section1_title)
                            {{ $homePage->section1_title }}
                        @else
                            Kelebihan Kami
                        @endisset </h2>
                    <div class="h-0.5 bg-sky-500 w-14 mx-auto"></div>
                    <p class="text-gray-400 dark:text-gray-300/60" data-aos="fade-up">
                        {{ $homePage->section1_description }}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-16 mt-12">
                <!-- Services Card 1 -->
                @foreach ($homePage->features as $key => $item)
                    <div data-aos="fade-right" data-aos-delay="{{ $key * 500 }}"
                        class="space-y-6 p-4 text-center group hover:-translate-y-2 transition-all duration-300">
                        <div
                            class="w-16 h-16 leading-loose rounded-full text-4xl text-sky-500 block mx-auto text-center items-center shadow-lg bg-white group-hover:bg-sky-500 group-hover:text-white dark:bg-zinc-900/50">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h3 class="text-lg font-medium dark:text-white">{{ $item->title }}</h3>
                        <p class=" text-gray-400 dark:text-gray-300/60">{{ $item->short_content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <img loading='lazy' data-aos="fade-up" data-aos-delay="200" data-aos-duration="500"
            src="{{ Vite::asset('resources/images/mountant.webp') }}" alt="montain" class="absolute right-0"
            width="400" height="auto">
        <img loading='lazy' data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000"
            src="{{ Vite::asset('resources/images/plane.webp') }}" alt="plane"
            class="absolute bottom-20 right-0 lg:right-10" width="100" height="auto">
    </section>
    <!-- Service End -->
