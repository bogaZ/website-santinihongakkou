    <!-- Footer Start -->
    <section class="bg-gray-100 py-6 dark:bg-zinc-800">
        <div class="container">
            <div class="grid lg:grid-cols-3 items-center gap-6">
                <!-- Social Account Link -->
                <div class="space-x-3">
                    @isset($appSetting->facebook)
                        <a target="_blank" href="{{ $appSetting->facebook }}" aria-label="facebook"
                            class="border-2 border-gray-400 w-12 h-12 text-xl rounded-full inline-flex text-center items-center text-gray-400 dark:border-zinc-700/30 hover:text-sky-500">
                            <i class="mdi mdi-facebook m-auto"></i>
                        </a>
                    @endisset

                    @isset($appSetting->instagram)
                        <a target="_blank" href="{{ $appSetting->instagram }}" aria-label="instagram"
                            class="border-2 border-gray-400 w-12 h-12 text-xl rounded-full inline-flex text-center items-center text-gray-400 dark:border-zinc-700/30 hover:text-sky-500">
                            <i class="mdi mdi-instagram m-auto"></i>
                        </a>
                    @endisset
                    @isset($appSetting->youtube)
                        <a target="_blank" href="{{ $appSetting->youtube }}" aria-label="youtube"
                            class="border-2 border-gray-400 w-12 h-12 text-xl rounded-full inline-flex text-center items-center text-gray-400 dark:border-zinc-700/30 hover:text-sky-500">
                            <i class="mdi mdi-youtube m-auto"></i>
                        </a>
                    @endisset
                    @isset($appSetting->whatsapp)
                        <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $appSetting->whatsapp }}"
                            aria-label="whatsapp"
                            class="border-2 border-gray-400 w-12 h-12 text-xl rounded-full inline-flex text-center items-center text-gray-400 dark:border-zinc-700/30 hover:text-sky-500">
                            <i class="mdi mdi-whatsapp m-auto"></i>
                        </a>
                    @endisset
                </div>

                <!-- Contect Number -->
                @isset($appSetting->phone)
                    <div class="lg:text-center">
                        <h1 class="text-lg dark:text-gray-300/80">
                            <a target="_blank" href="tel:{{ $appSetting->phone }}"><i
                                    class="pe-7s-call text-black align-middle text-[22px] ltr:mr-2 rtl:ml-2 dark:text-white"></i>{{ $appSetting->phone }}</a>
                        </h1>
                    </div>
                @endisset

                <!-- Contect Mail -->
                @isset($appSetting->phone)
                    <div class="ltr:lg:text-right rtl:lg:text-left">
                        <h1 class="text-lg dark:text-gray-300/80">
                            <a href="mailto:abc@example.com"><i
                                    class="pe-7s-mail-open text-black align-middle text-[22px] ltr:mr-2 rtl:ml-2 dark:text-white"></i>{{ $appSetting->email }}</a>
                        </h1>
                    </div>
                @endisset
            </div>
        </div>
    </section>
    {{-- <section class="bg-gray-900 dark:bg-zinc-900/40">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="col-span-2">
                            <!-- Logo -->
                            <h1 class="text-lg uppercase text-white font-medium mb-6">Santi Nihon Gakkou</h1>

                            <p class="text-gray-400 dark:text-gray-300/60">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Laborum, in.</p>
                        </div>

                        <div>
                            <div class="text-lg text-white font-medium mb-6">Informasi</div>
                            <!-- Footer Link -->
                            <ul class="space-y-2 text-sm">
                                <li><a href="index.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">@lang('home_page.home')</a>
                                </li>
                                <li><a href="page-about.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">About us</a>
                                </li>
                                <li><a href="page-contact.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">Contact us</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="text-lg text-white font-medium mb-6">Community</div>
                            <!-- Footer Link -->
                            <ul class="space-y-2 text-sm">
                                <li><a href="page-faq.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">FAQ</a></li>
                                <li><a href="login.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">Login</a></li>
                                <li><a href="signup.html"
                                        class="text-gray-400 dark:text-gray-300/60 hover:text-gray-300">Sign Up</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="text-lg text-white mb-6">Subscribe</div>
                    <div class="text-gray-400 dark:text-gray-300/60 text-sm mb-5">In an ideal world this text wouldn’t
                        exist, a client would
                        acknowledge the importance of having web copy before the design starts.
                    </div>

                    <div class="flex bg-gray-800 rounded-lg items-center dark:bg-zinc-700/30">
                        <!-- Subscribe form -->
                        <input type="email"
                            class="border-0 focus:border-0 focus:ring-0 text-gray-50 bg-transparent w-full dark:placeholder:text-gray-300/50 placeholder:text-sm"
                            placeholder="Email" />
                        <button type="submit" class="text-xl text-gray-400 dark:text-gray-300/60 px-3">
                            <i class="pe-7s-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <footer class="bg-gray-800 dark:bg-zinc-900/60 py-5">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-6">
                <div class="col-span-2">
                    <div class="text-sm text-gray-400 dark:text-gray-300/60">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>&copy; <a href="https://www.rengganikaryasemesta.com"
                            target="_blank">Renggani Karya
                            Semesta</a></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Start -->


    {{-- <div class="fixed left-0 bottom-10 flex flex-col gap-3 z-40">

        <!-- light-dark mode button -->
        <a href="javascript: void(0);" id="mode"
            class="px-3 py-3 z-40 text-14 font-normal transition-all duration-300 ease-linear text-white bg-zinc-800 dark:bg-white rounded-r">
            <i class="mdi mdi-white-balance-sunny text-xl dark:text-zinc-800 hidden dark:block"></i>
            <i class="mdi mdi-moon-waning-crescent text-xl dark:text-zinc-800 block dark:hidden "></i>
        </a>
    </div> --}}
    <div class="fixed right-10 bottom-10 flex items-center justify-center rounded-full h-10 w-10 bg-green-600">
        <a href="https://api.whatsapp.com/send?phone={{ $appSetting->whatsapp }}" target="_blank"
            aria-label="floating whatsapp">
            <span class="mdi mdi-whatsapp text-white text-2xl"></span>
        </a>
    </div>
