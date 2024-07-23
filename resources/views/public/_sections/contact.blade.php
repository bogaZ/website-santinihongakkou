    <!-- Contact Start -->
    <section id="contact-us" class="relative">
        <div class="container">
            <div class="flex justify-center">
                <div class="lg:w-2/3 space-y-5 text-center">
                    <!-- Section Title -->
                    <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white">
                        @isset($homePage->section7_title)
                            {{ $homePage->section7_title }}
                        @else
                            KONTAK KAMI
                        @endisset
                    </h2>
                    <div class="h-0.5 bg-sky-500 w-14 mx-auto"></div>
                    <p class="text-gray-400 dark:text-gray-300/60">{{ $homePage->section7_description }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-20">
                <div>
                    <!-- office Address -->
                    <div class="md:flex md:flex-row lg:justify-start lg:flex-col lg:text-left md:justify-between">
                        <div class="mb-6">
                            <h2 class=" text-base font-medium mb-2 dark:text-white">Alamat Perusahaan :</h2>
                            <h3 class="text-gray-400 dark:text-gray-300/60 text-sm ">{{ $appSetting->address }}
                            </h3>
                        </div>
                        @if ($appSetting->address2)
                            <div class="mb-6">
                                <h2 class=" text-base font-medium mb-2 dark:text-white">Alamat Perusahaan 2:</h2>
                                <h3 class="text-gray-400 dark:text-gray-300/60 text-sm ">{{ $appSetting->address2 }}
                                </h3>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="lg:col-span-2">
                    <!-- Contact Form -->
                    <form method="post" action="{{ route('feedback.store') }}">
                        @if (session('success'))
                            <p class="p-3 text-green-700 italic">{{ session('success') }}</p>
                        @endif
                        @csrf
                        @method('POST')
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name Input -->
                                <div>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-0 focus:border-gray-400 block w-full p-3 dark:bg-zinc-700/20 dark:border-zinc-700/50 dark:placeholder:text-gray-300/50 dark:text-gray-300/50"
                                        placeholder="@lang('home_page.contact_form.enter_your_name')">
                                    @error('name')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Email ID Input -->
                                <div>
                                    <input type="email"
                                        class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-0 focus:border-gray-400 block w-full p-3 dark:bg-zinc-700/20 dark:border-zinc-700/50 dark:placeholder:text-gray-300/50 dark:text-gray-300/50"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="@lang('home_page.contact_form.enter_your_email')">
                                    @error('email')
                                        <span class="text-red-600 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Subject Input -->
                            <div>
                                <input type="text"
                                    class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-0 focus:border-gray-400 block w-full p-3 dark:bg-zinc-700/20 dark:border-zinc-700/50 dark:placeholder:text-gray-300/50 dark:text-gray-300/50"
                                    name="subject" id="subject" value="{{ old('subject') }}"
                                    placeholder="@lang('home_page.contact_form.enter_your_subject')">
                                @error('subject')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Maessage Textarea Input -->
                            <textarea
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-0 focus:border-gray-400 block w-full p-3 dark:bg-zinc-700/20 dark:border-zinc-700/50 dark:placeholder:text-gray-300/50 dark:text-gray-300/50"
                                placeholder="@lang('home_page.contact_form.enter_your_message')" name="message" id="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                            <!-- Form Submit Button -->
                            <div class="text-right">
                                <input type="submit" id="submit" name="send" class="btn bg-sky-500 text-white"
                                    value="@lang('home_page.contact_form.send_message')">
                            </div>
                        </div>
                    </form>
                    <!--end form-->
                </div>
            </div>
        </div>
        <img loading='lazy' data-aos="fade-right" data-aos-duration="800"
            src="{{ Vite::asset('resources/images/mountant.webp') }}" alt="montain"
            class="absolute left-0 bottom-0 w-52 xl:w-auto" width="400" height="auto">
    </section>
    <!-- Contact End -->
