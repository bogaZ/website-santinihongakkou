    <!-- Work Process Start -->
    <section class="bg-gray-100 dark:bg-zinc-900/30 relative overflow-hidden">
        <div class="container mb-10">
            <div class="flex justify-center">
                <div class="lg:w-2/3 space-y-5 text-center">
                    <!-- Section Title -->
                    <h1 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white" data-aos="fade-up"
                        data-aos-delay="200" data-aos-duration="1000">
                        @isset($homePage->section6_title)
                            {{ $homePage->section6_title }}
                        @else
                            CARA KERJA
                        @endisset
                    </h1>
                    <div class="h-0.5 bg-sky-500 w-14 mx-auto" data-aos="fade-right" data-aos-delay="300"
                        data-aos-duration="1000"></div>
                    <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                        class="text-gray-400 dark:text-gray-300/60">{{ $homePage->section6_description }}
                    </p>
                </div>
            </div>

            <!-- Work Process Icons -->
            <div class="lg:grid grid-cols-2 gap-5 mt-12 hidden">
                <div class="relative">
                    <div
                        class="w-10 h-10 text-[36px] text-center items-center flex absolute text-white bg-sky-500 rounded-full z-10 top-[80px] ltr:right-40 rtl:left-40 ltr:rotate-0 rtl:rotate-180">
                        <i class="pe-7s-angle-right mx-auto"></i>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="w-10 h-10 text-[36px] text-center items-center flex absolute text-white bg-sky-500 rounded-full z-10 top-[80px] ltr:left-40 rtl:right-40 ltr:rotate-0 rtl:rotate-180">
                        <i class="pe-7s-angle-right mx-auto"></i>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 gap-5 mt-12">
                <!-- Work Process Part 1 -->
                <div class="relative " data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                    <div class="text-center space-y-2">
                        <i class="{{ $homePage->workProcess?->step1_icon }} text-sky-500 text-5xl"></i>
                        <h4 class="pt-3 text-lg font-medium dark:text-white">{{ $homePage->workProcess?->step1_title }}
                        </h4>
                        <p class="text-gray-400 dark:text-gray-300/60">{{ $homePage->workProcess?->step1_description }}
                        </p>
                    </div>
                    <div
                        class="before:content-[''] before:absolute before:hidden before:border before:border-dashed before:border-gray-300 before:w-2/3 ltr:before:-right-32 rtl:before:-left-32 before:top-[50px] before:lg:block before:dark:border-zinc-700/50">
                    </div>
                </div>

                <!-- Work Process Part 2 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="text-center space-y-2">
                        <i class="{{ $homePage->workProcess?->step2_icon }} text-sky-500 text-5xl"></i>
                        <h4 class="pt-3 text-lg font-medium dark:text-white">{{ $homePage->workProcess?->step2_title }}
                        </h4>
                        <p class="text-gray-400 dark:text-gray-300/60">{{ $homePage->workProcess?->step2_description }}
                        </p>
                    </div>
                    <div
                        class="before:content-[''] before:absolute before:hidden before:border before:border-dashed before:border-gray-300 before:w-2/3 ltr:before:-right-32 rtl:before:-left-32 before:top-[50px] before:lg:block before:dark:border-zinc-700/50">
                    </div>
                </div>

                <!-- Work Process Part 3 -->
                <div class="relative" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                    <div class="text-center space-y-2">
                        <i class="{{ $homePage->workProcess?->step3_icon }} text-sky-500 text-5xl"></i>
                        <h4 class="pt-3 text-lg font-medium dark:text-white">{{ $homePage->workProcess?->step3_title }}
                        </h4>
                        <p class="text-gray-400 dark:text-gray-300/60">{{ $homePage->workProcess?->step3_description }}
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <img data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000"
            src="{{ Vite::asset('resources/images/Japan-rafiki.svg') }}" alt="plane"
            class="absolute bottom-0 left-0 w-32 lg:w-40" width="170" height="auto">
    </section>
    <!-- Work Process end -->
