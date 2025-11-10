
<div class="card--rounded-none image-full bg-blue-100/50 h-[80vh] relative">
    <figure class="h-[80vh] w-full">
        <x-curator-glider class="h-[80vh] w-full object-cover brightness-50" :media="$pageSetting->peak_page_cover_image_id" :fallback="asset('/photos/banner.jpg')"
            loading="lazy" />
    </figure>
    <div class="card-body absolute inset-0 flex items-center justify-start">
        <div class="absolute bottom-1/4 left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden" data-aos="fade-down" data-aos-duration="1200">
            <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold" >
                Explore
            </h5>
            <h2 class="card-title mb-2.5 text-white text-3xl md:text-6xl uppercase font-bold">
                {{ $peak->title }}
            </h2>
            <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold">
                With Sherpalaya
            </h5>
        </div>
    </div>
</div>
