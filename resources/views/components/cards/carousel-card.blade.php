{{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[100vh]">
    <figure class="h-[100vh] w-full">
        <img src="{{ $image?->url ?? asset('/photos/banner.jpg') }}" alt=""
            class="h-[100vh] w-full object-cover brightness-60">
    </figure>
    <div class="card-body relative">
        <div
            class="absolute 2xl:bottom-52 xl:left-44  bottom-40 left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
            <div class="">
                <h5 class="card-title mb-2.5 text-warning text-3xl md:text-4xl uppercase font-extrabold ">
                    Explore
                </h5>
                <h2 class="card-title mb-2.5  text-white text-4xl md:text-5xl uppercase font-bold">
                    {{ $title }}
                </h2>
                <h5 class="card-title mb-2.5 text-warning text-3xl md:text-4xl uppercase font-extrabold ">
                    With Sherpalaya
                </h5>
                <a href="{{ $url }}">
                    <button class="btn btn-primary  text-white">
                        Explore
                        <span class="icon-[tabler--circle-arrow-right-filled] size-4"></span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div> --}}



{{-- <div class="card--rounded-none image-full bg-blue-100/50 h-[100vh] relative">
    <figure class="h-[100vh] w-full">
        <x-curator-glider class="h-[100vh] w-full object-cover brightness-50" :media="$image" :fallback="asset('/photos/banner.jpg')"
            loading="lazy" />
    </figure>
    <div class="card-body absolute inset-0 flex items-center justify-start leading-[1.1] md:leading-snug"
        data-aos="fade-down" data-aos-duration="1500">
        <div class="absolute bottom-1/2 left-4 lg:left-16 2xl:left-32 transform translate-y-1/2 "> --}}
{{-- <h5
                class="card-title mb-2 text-blue-50 text-7xl  uppercase font-oswald  font-normal tracking-wider opacity-75 text-wrap md:w-[90%]">
                {{ $title }}

            </h5>
            <h2
                class="card-title mb-2 text-warning  text-8xl  font-card font-semibold tracking-tight leading-[1.3]  overflow-hidden opacity-75">
                {{$description}}
            </h2> --}}

{{-- <button
                    class="btn btn-primary btn-md gap-2 text-base hover:btn-warning tracking-tighter pl-2 opacity-80">
                    <span class="icon-[mdi--chevron-double-right] size-5 "></span>
                    View
                </button> --}}
{{--
    height: 2.875rem /* 46px */;
    min-height: 2.875rem /* 46px */;
    padding-left: 1.25rem /* 20px */;
    padding-right: 1.25rem /* 20px */;
    font-size: 1.125rem /* 18px */;
    line-height: 1.5rem /* 24px */;
                 --}}
{{-- <a href="{{ $url }}" class="btn btn-primary hover:btn-warning h-20 min-h-20 px-8 text-[2rem] rounded-full opacity-75">
                    Go
                    <span class="icon-[mdi--chevron-double-right] size-[1.25em]"></span>
                </a> --}}

{{-- <h5 class="card-title flex gap-2 mb-2  text-lg/7 items-center  text-black capitalize font-medium font-body">
                <span
                    class="{{ $icon }} accordion-item-active:rotate-90 size-6 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                <p> {{ $detail->type->getLabel() }}</p>
            </h5> --}}
{{-- </div>
    </div>
</div> --}}





<div class="card--rounded-none image-full bg-blue-100/50 h-[100vh] relative">
    <figure class="h-[100vh] w-full">
        <x-curator-glider class="h-[100vh] w-full object-cover brightness-50" :media="$image" :fallback="asset('/photos/banner.jpg')"
            loading="lazy" />
    </figure>
    <div class="card-body absolute inset-0 flex items-center justify-start leading-[1.1] md:leading-snug"
        data-aos="fade-down" data-aos-duration="1500">
        <div class="absolute bottom-2/4 left-4 lg:left-16   2xl:left-32 transform translate-y-1/2 ">
            {{-- <h5
                class="card-title mb-2 text-blue-50 text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                Conquer
            </h5> --}}
            <h2
                class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap md:w-[70%] leading-[1.3]  overflow-hidden opacity-75">
                {{ $title }}
            </h2>
            <h5
                class="card-title  mb-8 text-blue-50 text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-wide text-wrap md:w-[70%] leading-[1.3]  overflow-hidden opacity-75">
                {{ $description }}
            </h5>
            {{-- <h5
                class="card-title  mb-8 text-blue-50 text-2xl  font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                With Sherpalaya
            </h5> --}}

            <a href="{{ $url }}">
                <button
                    class="btn btn-primary btn-lg  gap-2 rounded-full text-base hover:btn-warning tracking-wide pl-2 opacity-80">
                    <span class="icon-[mdi--chevron-double-right] size-5 "></span>
                    {{__('home-carousel.explore')}}
                </button>
            </a>
            {{-- <h5 class="card-title flex gap-2 mb-2  text-lg/7 items-center  text-black capitalize font-medium font-body">
                <span
                    class="{{ $icon }} accordion-item-active:rotate-90 size-6 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                <p> {{ $detail->type->getLabel() }}</p>
            </h5> --}}
        </div>
    </div>
</div>
