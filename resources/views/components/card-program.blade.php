@props(['item', 'key'])
<div data-aos="flip-left" data-aos-delay="{{ $key * 200 }}" data-aos-duration="800">
    <div class="transition-all ease-in-out duration-300 hover:-translate-y-4">
        <img loading='lazy' src="{{ asset($item->image) }}" class="mb-4 h-36 object-cover w-full rounded-lg"
            alt="Blog img-1">
        <h3 class="mb-2 text-lg">
            <a href="{{ route('programs.show', ['slug' => $item->slug]) }}"
                class="hover:text-sky-500 dark:text-white">{{ $item->title }}
            </a>
        </h3>

        <p class="text-gray-400 dark:text-gray-300/60 text-sm line-clamp-2">
            {{ $item->short_content }}</p>

        <div class="mt-4">
            <a href="{{ route('programs.show', ['slug' => $item->slug]) }}" class="text-sky-500">
                Lebih lanjut <i class="mdi mdi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
