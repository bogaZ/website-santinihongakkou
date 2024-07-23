<div class="grid md:grid-cols-2 gap-6">
    <div class="space-y-5">
        <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white">
            {{ $aboutpage->section1_title }}
        </h2>
        <div class="h-0.5 bg-sky-500 w-14"></div>
        <p class="text-gray-400 dark:text-gray-300/60" data-aos="fade-up">
            {!! nl2br($aboutpage->section1_description) !!}
        </p>
    </div>
    <div>
        <div class="rounded-lg overflow-hidden shadow-lg">
            <img src="{{ $aboutpage->section1_image != 'default' ? asset($aboutpage->section1_image) : Vite::asset('resources/images/banner.webp') }}"
                alt="visi dan misi">
        </div>
    </div>
</div>
