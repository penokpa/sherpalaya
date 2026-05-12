<header class="card--rounded-none image-full bg-blue-100/50 h-[80dvh] relative">
    <figure class="h-[80dvh] w-full">
        <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$trek->coverImage" fallback="default"
            loading="lazy" alt="{{ $trek->title }} cover image"/>
    </figure>
    <div class="absolute bottom-1/4 left-4 xl:left-32 transform translate-y-1/2 overflow-hidden w-[90%] md:w-[60%]"
        data-aos="fade-down" data-aos-duration="1200">
        <h1
            class="card-title mb-2 text-warning text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-bold tracking-tight text-balance leading-[1.3] opacity-90 antialiased">
            {{ $trek->title }}

        </h1>
        <h2
            class="card-title mb-2 text-blue-50 text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-semibold tracking-wide text-wrap  leading-[1.3] opacity-75">
            {{ $trek->highest_altitude }} m
        </h2>
    </div>
</header>
