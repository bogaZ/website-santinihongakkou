    <!-- Web Info Start -->
    <section class="py-28">
        <div class="overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-black to-sky-300 w-full h-full">
            </div>
        </div>
        <div class="container">
            <div class="lg:flex justify-center">
                <div class="lg:w-7/12 text-center relative">
                    <h2 class="text-white" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                        @isset($homePage->section2_title)
                            {{ $homePage->section2_title }}
                        @else
                            Gapai
                            Mimpimu Bersama Kami
                        @endisset
                    </h2>
                    <p class="pt-3 text-gray-300/80" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                        {{ $homePage->section2_description }}
                    </p>
                    <!-- Button -->
                    <a href="https://api.whatsapp.com/send?phone={{ $appSetting->whatsapp }}" target="_blank"
                        class="btn bg-white text-black mt-8 mb-5" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="1500">{{ $homePage->section2_btn_label }}</a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <img loading='lazy' src="{{ Vite::asset('resources/images/bg-pattern.webp') }}" alt="bg-pattern"
                class="block dark:hidden">
            <img loading='lazy' src="{{ Vite::asset('resources/images/bg-pattern-dark.webp') }}" alt="bg-pattern"
                class="hidden dark:block">
        </div>
    </section>
    <!-- Web Info End -->
