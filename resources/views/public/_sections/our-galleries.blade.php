<section class="pt-12 bg-gray-100 dark:bg-[#27272A] relative overflow-hidden">
    <div class="container">
        <div class="flex justify-center">
            <div class="lg:w-2/3 space-y-5 text-center">
                <h1 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="800"> @isset($homePage->section4_title)
                        {{ $homePage->section4_title }}
                    @else
                        Galeri
                    @endisset
                </h1>
                <div class="h-0.5 bg-sky-500 w-14 mx-auto" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="800"></div>
                <p class="text-gray-400 dark:text-gray-300/60" data-aos="fade-up" data-aos-delay="300"
                    data-aos-duration="800"> {{ $homePage->section4_description }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4  md:grid-rows-2 gap-2 z-10 md:gap-6 mt-20">

            @foreach ($galleries as $key => $item)
                @if ($key == 0)
                    <div data-aos="flip-left" class="md:row-span-2 col-span-2 relative overflow-hidden group"
                        data-aos-delay="200" data-aos-duration="800">
                        <div
                            class="absolute h-full w-full transform origin-bottom transition-all duration-500 translate-y-[100%] group-hover:translate-y-0 flex items-center justify-center bg-gradient-to-t from-black to-sky-900 opacity-80 text-white p-2">
                            <h3 class="text-center">
                                {{ $item->title }}
                            </h3>
                        </div>
                        <img src="{{ $item->image }}" loading='lazy' height="100%" class="h-full w-full object-cover"
                            alt="{{ $item->title }}">
                    </div>
                @else
                    <div data-aos="flip-left" class="overflow-hidden group" data-aos-delay="200"
                        data-aos-duration="800">
                        <div
                            class="absolute h-full w-full transform origin-bottom transition-all duration-500 translate-y-[100%] group-hover:translate-y-0 flex items-center justify-center bg-gradient-to-t from-black to-sky-900 opacity-80 text-white p-2">
                            <h4 class="text-center">
                                {{ $item->title }}
                            </h4>
                        </div>
                        <img loading='lazy' src="{{ $item->image }}" height="100%" class="h-full w-full object-cover"
                            alt="{{ $item->title }}">
                    </div>
                @endif
            @endforeach


        </div>
        {{-- <div class="text-center mx-auto" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <!-- Button -->
            <a href="signup.html" class="btn bg-sky-500 text-white mt-12">Program Lainnya<i
                    class="mdi mdi-arrow-right"></i></a>
        </div> --}}
    </div>
</section>
