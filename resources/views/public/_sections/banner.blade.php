    <!-- Home Start -->
    <section class="lg:pb-40 lg:pt-56 py-32">
        <div class="overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover"
                @isset($banner)
                    src="{{ $banner?->image_desktop == 'default' ? Vite::asset('resources/images/banner.webp') : asset($banner?->image_desktop) }}"
                    @else
                    src="{{ Vite::asset('resources/images/banner.webp') }}"
                    @endisset
                alt="build your website image">
            <div
                class="absolute inset-0 w-full h-full bg-gradient-to-t md:bg-gradient-to-r from-black to-sky-900/60 opacity-70">
            </div>
        </div>
        <div class="container">
            <div class="flex justify-center">
                <div class="lg:w-2/3 text-center relative">
                    <div class="space-y-6 mb-10">
                        <!-- Home Page Title -->
                        <h1 class="text-white md:text-[32px] lg:text-[46px] leading-[64px] capitalize ">
                            @isset($banner)
                                {{ $banner->title }}
                            @else
                                Santi Nihon Gakkou
                            @endisset
                        </h1>
                        @isset($banner->description)
                            <p class="text-gray-300/80">
                                {{ $banner->description }}
                            </p>
                        @endisset

                        <!-- Video Modal Outline Button -->
                        @isset($banner->button_label)
                            <a href="https://api.whatsapp.com/send?phone={{ $appSetting->whatsapp }}" target="_blank"
                                class="btn border text-sky-500 border-sky-500 hover:bg-sky-500 shadow-lg shadow-sky-900 hover:text-white">
                                {{ $banner->button_label }}
                            </a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <img src="{{ Vite::asset('resources/images/bg-pattern.webp') }}" alt="bg-pattern" class="block dark:hidden">
            <img src="{{ Vite::asset('resources/images/bg-pattern-dark.webp') }}" alt="bg-pattern"
                class="hidden dark:block">
        </div>
    </section>
    <!-- Home Start -->
