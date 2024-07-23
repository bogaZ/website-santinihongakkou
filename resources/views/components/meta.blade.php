<meta name="description"
    content="{{ $description ? $description : 'Lembaga Pelatihan Kerja ke Jepang No 1 di Indonesia' }}">
<meta name="keywords"
    content="lembaga pelatihan kerja ,jepang ,lpk ,banyuwangi ,pelatihan kerja ,website lpk ,lembaga pelatihan ,lembaga pelatihan adalah ,pelatihan lpk ,program lembaga pelatihan kerja ,www lpk ,kerja pelatihan ,program kerja pelatihan ,program pelatihan kerja ,tempat pelatihan kerja ,badan pelatihan kerja ,lembaga pelatihan kerja pemerintah ,lembaga pelatihan tenaga kerja ,lembaga pendidikan kerja ,pelatihan kerja pemerintah ,program kerja lembaga pelatihan kerja ,program pelatihan kerja pemerintah ,banyu wangi,{{ $keywords }}">
<meta name="author" content="{{ $author }}">
<meta name="title" content="Santi Nihon Gakkou {{ $title ? ' - ' . $title : ' LPK No 1 di Indonesia' }}">
<title>
    Santi Nihon Gakkou{{ $title ? ' - ' . $title : ' LPK No 1 di Indonesia' }}
</title>
<!-- OG Meta Tags -->
<meta property="og:title" content="Santi Nihon Gakkou {{ $title ? ' - ' . $title : ' LPK No 1 di Indonesia' }}">
<meta property="og:description"
    content="{{ $description ? $description : 'Lembaga Pelatihan Kerja ke Jepang No 1 di Indonesia' }}">
<meta property="og:image" content="{{ $image ? $image : Vite::asset('resources/images/banner.webp') }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Santi Nihon Gakkou">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="{{ $image ? $image : Vite::asset('resources/images/banner.webp') }}">
<meta name="twitter:title" content="Santi Nihon Gakkou {{ $title ? ' - ' . $title : ' LPK No 1 di Indonesia' }}">
<meta name="twitter:description"
    content="{{ $description ? $description : 'Lembaga Pelatihan Kerja ke Jepang No 1 di Indonesia' }}">
<meta name="twitter:image" content="{{ $image ? $image : Vite::asset('resources/images/banner.webp') }}">
<meta name="twitter:url" content="{{ $image ? $image : Vite::asset('resources/images/banner.webp') }}">
<meta name="twitter:site" content="@santinihongakkou">
