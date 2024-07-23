<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-mode="light" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta name="robots" content="noindex, nofollow"> --}}
    {{-- META --}}
    {!! $meta !!}
    <link rel="canonical" href="https://www.santinihongakkou.com/">
    <!-- App favicon -->
    <link rel=icon
        href="{{ $appSetting->linkedln ? asset($appSetting->linkedln) : Vite::asset('resources/images/banner.webp') }}"
        sizes="32x32" type="image/png">
    @vite(['resources/css/public/icons.scss', 'resources/css/public/tailwind.scss'])
    @yield('styles')
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K6LZ5PD8');
    </script>
    <!-- End Google Tag Manager -->
</head>


<body class="dark:bg-zinc-800">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6LZ5PD8" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('public.layout.navbar')
    @yield('content')

    @include('public.layout.footer')
    <!-- Smooth-Scroll Javascript -->
    <script src="{{ asset('dist/public') }}/assets/js/smooth-scroll.polyfills.min.js"></script>

    <script src="{{ asset('dist/public') }}/assets/js/gumshoe.polyfills.min.js"></script>

    <!-- Custom Javascript -->
    <script src="{{ asset('dist/public') }}/assets/js/app.js"></script>
    @yield('js')
</body>

</html>
