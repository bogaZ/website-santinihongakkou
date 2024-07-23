<div class="flex justify-center mt-10">
    <div class="lg:w-2/3 space-y-5 text-center">
        <!-- Section Title -->
        <h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white">
            STRUKTUR ORGANISASI
        </h2>
        <div class="h-0.5 bg-sky-500 w-14 mx-auto"></div>
    </div>
</div>
<div class="flex items-start gap-6 flex-wrap justify-center mt-12">
    @foreach ($organization_structures as $item)
        <div data-aos="fade-up"
            class="lg:w-[calc(25%-1.5rem)] xl:w-[calc(20%-1.5rem)] w-[calc(50%-1.5rem)] md:w-[calc(33%-1.5rem)]">
            <img src="{{ asset($item->image) }}" width="100%" class="h-60 object-cover object-top"
                alt="santi-nihon-gakkou">
            <div class="space-y-1 mt-3 text-center">
                <h4>{{ $item->name }}</h4>
                <p>{{ $item->occupation }}</p>
            </div>
        </div>
    @endforeach

</div>
