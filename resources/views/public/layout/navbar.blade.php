<!-- Navbar Start -->
<div class="navbar-custom" id="navbar">
    <nav>
        <div class="lg:container flex flex-wrap items-center">

            <!-- Main Logo -->
            <a href="/" class="flex lg:ml-0 ml-8">
                <span
                    class="self-center text-xl font-poppins font-bold tracking-widest whitespace-nowrap uppercase text-white">

                    @if ($appSetting->linkedln)
                        <img src="{{ asset($appSetting->icon) }}" alt="logo" class="js-logo-mobile xl:hidden"
                            width="120px" height="auto">
                        <img src="{{ asset($appSetting->linkedln) }}" alt="logo"
                            class="js-logo-desktop hidden xl:block" width="60px" height="auto">
                    @else
                        SNK
                    @endif
                </span>
            </a>

            <div class="flex items-center lg:order-2 items-center ml-auto lg:mr-0 mr-8">
                <!-- Navbar Button -->
                <a href="https://api.whatsapp.com/send?phone={{ $appSetting->whatsapp }}" target="_blank"
                    class="btn hidden xl:flex gap-2 bg-sky-500 text-white rounded-full translate-y-0">
                    Hubungi Kami
                </a>
                <!-- Navbar Collapse Manu Button -->
                <button data-collapse="menu-collapse" type="button"
                    class="inline-flex items-center ml-3 text-sm text-white lg:hidden" aria-controls="menu-collapse"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <i class="mdi mdi-menu text-2xl"></i>
                </button>
            </div>

            <!-- Navbar Manu -->
            <div class="justify-between items-center w-full lg:w-auto lg:flex hidden lg:order-1 ltr:lg:ml-14 rtl:lg:mr-14 rtl:mr-0 ltr:ml-0"
                id="menu-collapse">
                <ul class="navbar-nav lg:h-auto h-[290px] lg:overflow-visible overflow-y-scroll lg:ml-0 ml-8"
                    id="navbar-navlist">

                    <li class="{{ request()->is('/#home') ? 'active' : '' }}">
                        <a data-scroll href="/#home" class="nav-item">{{ $appSetting->navbarSection->label_home }}</a>
                    </li>
                    <li class="{{ request()->is('about') ? 'active' : '' }}">
                        <a data-scroll href="/about"
                            class="nav-item">{{ $appSetting->navbarSection->label_about_us }}</a>
                    </li>
                    <li class="{{ request()->is('programs*') ? 'active' : '' }}">
                        <div class="dropdown">
                            <a href="#" class="nav-item dropdown-toggle" id="navbarDropdownOneButton"
                                data-dropdown-toggle="navbarDropdownOne"
                                aria-current="page">{{ $appSetting->navbarSection->label_our_program }}<i
                                    class="mdi mdi-chevron-down"></i></a>
                            <div id="navbarDropdownOne" class="dropdown-menu">
                                @foreach ($appSetting->navbarSection?->navbarSectionPrograms as $item)
                                    <a href="{{ route('programs.show', ['slug' => $item->slug]) }}"
                                        class="dropdown-item">{{ $item->title }}</a>
                                @endforeach
                                <a href="{{ route('programs.index') }}" class="dropdown-item">Program Lainnya</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a data-scroll href="/#contact-us"
                            class="nav-item">{{ $appSetting->navbarSection->label_our_contact }}</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>
<!-- Navbar End -->
