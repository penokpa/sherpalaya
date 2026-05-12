<header class="card--rounded-none image-full bg-blue-900 h-dvh relative">
    <figure class="h-dvh w-full">
        <x-curator-glider class="h-dvh w-full object-cover brightness-[0.70]" :media="$image" fallback="default"
             alt="{{ $title }} Image" />
    </figure>
    <div class="absolute bottom-1/4 md:bottom-1/3 left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden max-w-[80%] lg:max-w-[50%] "
        data-aos="fade-down" data-aos-duration="1200">
        <h1
            class="card-title mb-2 text-warning text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-bold tracking-wide text-balance leading-[1.3] antialiased ">
            {{ $title }}
        </h1>
        <h2
            class="card-title mb-4 text-blue-50 text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-medium tracking-wide  leading-[1.3] antialiased">
            {{ $description }}
        </h2>
        <a href="{{ $url }}" >
            <button
                class="pl-1 lg:pl-2 btn btn-primary lg:btn-lg  gap-2 rounded-xl lg:rounded-3xl ring-1 ring-blue-100 text-base hover:btn-warning tracking-wide  opacity-80 m-1">
                <span class="icon-[mdi--chevron-double-right] size-5 "></span>
                {{ __('home-carousel.explore') }}
            </button>
        </a>
    </div>
    {{-- <div class="card-body absolute inset-0 flex items-center justify-start leading-[1.1] md:leading-snug"
        data-aos="fade-down" data-aos-duration="1500">
        <div class="absolute bottom-2/4 left-4 xl:left-32 transform translate-y-1/2 ">
            <h1
                class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl uppercase font-card font-semibold tracking-tight text-wrap leading-[1.3] bg-opacity-40">
                {{ $title }}
            </h1>
            <h2
                class="card-title  mb-8 text-blue-50 text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-wide text-wrap md:w-[70%] leading-[1.3]  overflow-hidden opacity-75">
                {{ $description }}
            </h2>
            <a href="{{ $url }}">
                <button
                    class="btn btn-primary btn-lg  gap-2 rounded-full text-base hover:btn-warning tracking-wide pl-2 opacity-80">
                    <span class="icon-[mdi--chevron-double-right] size-5 "></span>
                    {{ __('home-carousel.explore') }}
                </button>
            </a>
        </div>
    </div> --}}
</header>
