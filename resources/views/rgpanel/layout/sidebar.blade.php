<div class="app-sidebar">
    <div class="logo">
        <a href="/" class="logo-icon"><span class="logo-text">RGPanel</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{ auth()->user()->name }}<br><span
                        class="user-state-info">@lang('menu.active')</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">


            <li class="{{ request()->routeIs('rgpanel.index') ? 'active-page' : '' }}">
                <a href="{{ route('rgpanel.index', ['locale' => app()->getLocale()]) }}"><i
                        class="material-icons-two-tone">dashboard</i>@lang('menu.dashboard')</a>
            </li>

            @can('read banner')
                <li class="{{ request()->routeIs('rgpanel.banners.*') ? 'active-page' : '' }}"><a
                        href="{{ route('rgpanel.banners.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">collections_bookmark</i>@lang('menu.banners')</a></li>
            @endcan
            @can('read gallery')
                <li class="{{ request()->routeIs('rgpanel.galleries.*') ? 'active-page' : '' }}"> <a
                        href="{{ route('rgpanel.galleries.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">photo</i>@lang('menu.galleries')</a></li>
            @endcan
            @if (Module::isEnabled('Program'))
                @can('read program')
                    <li class="{{ request()->routeIs('rgpanel.programs.*') ? 'active-page' : '' }}"> <a
                            href="{{ route('rgpanel.programs.index', ['locale' => app()->getLocale()]) }}"><i
                                class="material-icons-two-tone">work</i>@lang('program::wording.programs')</a></li>
                @endcan
            @endif
            @can('read user')
                <li class="{{ request()->routeIs('rgpanel.users.*') ? 'active-page' : '' }}">
                    <a href="{{ route('rgpanel.users.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">manage_accounts</i>@lang('menu.users')</a>
                </li>
            @endcan
            @can('read organization structure')
                <li class="{{ request()->routeIs('rgpanel.organization-structures.*') ? 'active-page' : '' }}">
                    <a href="{{ route('rgpanel.organization-structures.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">assignment_ind</i>Organization Structures</a>
                </li>
            @endcan
            @can('read prospective student')
                <li class="{{ request()->routeIs('rgpanel.prospective-students.*') ? 'active-page' : '' }}">
                    <a href="{{ route('rgpanel.prospective-students.index', ['locale' => app()->getLocale()]) }}"><i
                            class="material-icons-two-tone">how_to_reg</i>@lang('menu.prospective_students')</a>
                </li>
            @endcan
            @if (Module::isEnabled('Feature'))
                @can('read feature')
                    <li class="{{ request()->routeIs('rgpanel.features.*') ? 'active-page' : '' }}"> <a
                            href="{{ route('rgpanel.features.index', ['locale' => app()->getLocale()]) }}"><i
                                class="material-icons-two-tone">featured_play_list</i>@lang('feature::wording.features')</a></li>
                @endcan
            @endif
            @if (Module::isEnabled('Partnership'))
                @can('read partnership')
                    <li class="{{ request()->routeIs('rgpanel.partnerships.*') ? 'active-page' : '' }}"> <a
                            href="{{ route('rgpanel.partnerships.index', ['locale' => app()->getLocale()]) }}"><i
                                class="material-icons-two-tone">handshake</i>@lang('partnership::wording.partnerships')</a></li>
                @endcan
            @endif
            @if (Module::isEnabled('Feedback'))
                @can('read feedback')
                    <li class="{{ request()->routeIs('rgpanel.feedback.*') ? 'active-page' : '' }}"> <a
                            href="{{ route('rgpanel.feedbacks.index', ['locale' => app()->getLocale()]) }}"><i
                                class="material-icons-two-tone">live_help</i>@lang('feedback::wording.feedbacks')</a></li>
                @endcan
            @endif
            @if (Module::isEnabled('AppSetting'))
                @can('read app settings')
                    <li class="{{ request()->routeIs('rgpanel.app-settings.*') ? 'active-page' : '' }}"> <a
                            href="{{ route('rgpanel.app-settings.index', ['locale' => app()->getLocale()]) }}"><i
                                class="material-icons-two-tone">settings</i>@lang('menu.app_settings')</a></li>
                @endcan
            @endif
            <li class="{{ request()->routeIs('rgpanel.pages.*') ? 'active-page' : '' }}">
                <a href="#"><i class="material-icons-two-tone">pages</i>@lang('menu.pages')<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    @if (Module::isEnabled('HomePage'))
                        @can('read home page')
                            <li><a class="{{ request()->routeIs('rgpanel.pages.home-page.*') ? 'active' : '' }}"
                                    href="{{ route('rgpanel.pages.home-page.index', ['locale' => app()->getLocale()]) }}">@lang('menu.home_page')</a>
                            </li>
                        @endcan
                    @endif
                    @if (Module::isEnabled('ProgramPage'))
                        @can('read program page')
                            <li><a class="{{ request()->routeIs('rgpanel.pages.program-page.*') ? 'active' : '' }}"
                                    href="{{ route('rgpanel.pages.program-page.index', ['locale' => app()->getLocale()]) }}">@lang('Program Page')</a>
                            </li>
                        @endcan
                    @endif
                    @if (Module::isEnabled('AboutPage'))
                        @can('read about page')
                            <li><a class="{{ request()->routeIs('rgpanel.pages.about-page.*') ? 'active' : '' }}"
                                    href="{{ route('rgpanel.pages.about-page.index', ['locale' => app()->getLocale()]) }}">@lang('About Page')</a>
                            </li>
                        @endcan
                    @endif
                </ul>
            </li>
            <li> <a href="{{ route('rgpanel.logout', ['locale' => app()->getLocale()]) }}"><i
                        class="material-icons-two-tone">logout</i>@lang('menu.log_out')</a></li>

        </ul>
    </div>
</div>
