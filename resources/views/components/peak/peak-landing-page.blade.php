<div class="bg-blue-100/50">
    <div class="card--rounded-none image-full  bg-blue-100/50 h-[80vh]">
        <figure class="h-[80vh] w-full">
            <img src="{{ $peak->coverImage?->url ?? '/photos/banner.jpg' }}" alt="Trekking background image"
                class="h-[80vh] w-full object-cover brightness-50" />
        </figure>
        <div class="card-body relative">
            <div
                class="absolute 2xl:bottom-52 2xl:left-32  bottom-40 left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                <div class="">
                    {{-- <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold ">
                        Explore
                    </h5> --}}
                    <h2 class="card-title mb-2.5  text-white text-3xl md:text-6xl uppercase font-bold">
                        {{-- {{ $peak->title }} --}}
                        Peaks
                    </h2>
                    <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold ">
                        With Sherpalaya
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-100/50">
        <div class="h-8 "></div>
        <div class="2xl:mx-32 mx-4 text-left">
            <h1
                class="text-2xl lg:text-4xl  font-light  line-clamp-2 tracking-wider text-primary uppercase wrap text-pretty">
                Peaks In Nepal
            </h1>
            <p
                class="text-md text-left  mt-2  text-blue-600 first-line:uppercase first-line:tracking-widest first-line:font-light ">
                For those seeking the ultimate challenge, Sherpalaya’s peak services offer unparalleled support
                and
                expertise. Whether it’s climbing Everest or venturing to the lesser-known peaks, Sherpalaya
                handles
                every
                detail, from permits to logistics. With our experienced Sherpa team by your side, we transform daunting
                Trek into achievable milestones, ensuring a fulfilling and transformative adventure. </p>
        </div>
        <div class="h-12 "></div>
    </div>




    <x-breadcrumb :breadcrumbs="[
        [
            'name' => 'Home',
            'url' => url('/home'),
        ],
        [
            'name' => 'Expedition',
        ],
    ]" />

    <div class="h-8"></div>


    {{-- Showing <strong>{{ $peakRegion->peaks->count() }}</strong> --}}
    <div class="2xl:mx-32 mx-4">
        @foreach ($peaksRegion as $peakRegion)
            @if ($peakRegion->peaks->isNotEmpty())
                <div id="region-{{ $peakRegion->id }}">
                    <h5 class="card-title mb-2.5 line-clamp-2 uppercase text-2xl text-primary font-bold">
                        {{ $peakRegion->name }} Region Peaks
                    </h5>
                    <div class="h-4"></div>
                    <div class="hidden md:grid md:grid-cols-3 lg:grid-cols-4  gap-3">
                        @foreach ($peakRegion->peaks as $peak)
                            <div
                                class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                <figure class="h-[25rem] max-w-sm">
                                    <img src="{{ optional($peak->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                        alt="{{ $peak->title }} Cover Image"
                                        class="transition-transform brightness-75 h-[25rem] duration-500 group-hover:scale-110  max-w-sm object-cover" />
                                </figure>
                                <a href="{{ route('show_peak', $peak->id) }}">
                                    <div class="card-body absolute inset-0 justify-end">
                                        <div class="text-center">
                                            <h2 class="font-bold text-white text-2xl uppercase">
                                                {{ $peak->title }}
                                            </h2>
                                            <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                {{ $peak->highest_altitude }} m
                                            </h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="h-4"></div>
                </div>
                <div class="bg-blue-100/60 md:hidden">
                    <div id="multi-slide"
                        data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1 } }'
                        class="relative w-full ">
                        <div class="carousel h-full rounded-none ">
                            <div class="carousel-body h-full opacity-0 ">
                                <!-- Slide 1 -->
                                @foreach ($peakRegion->peaks as $peak)
                                    <div class="carousel-slide max-w-sm px-1">
                                        <div
                                            class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                            <figure class="h-[28rem] max-w-sm">
                                                <img src="{{ optional($peak->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                                    alt="{{ $peak->title }} Cover Image"
                                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                            </figure>
                                            <a href="{{ route('show_peak', $peak->id) }}">
                                                <div class="card-body absolute inset-0 justify-end">
                                                    <div class="text-center">
                                                        <h2 class="font-bold text-white text-2xl uppercase">
                                                            {{ $peak->title }}
                                                        </h2>
                                                        <h2
                                                            class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                            {{ $peak->highest_altitude }} m
                                                        </h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Previous Slide -->
                    <button type="button" class="carousel-prev">
                        <span
                            class="hidden md:flex icon-[tabler--chevron-left] size-8 text-white cursor-pointer rtl:rotate-180"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <!-- Next Slide -->
                    <button type="button" class="carousel-next">
                        <span class="sr-only">Next</span>
                        <span
                            class="hidden md:flex icon-[tabler--chevron-right] size-8 text-white cursor-pointer rtl:rotate-180"></span>
                    </button>
                </div>
                <div class="h-14"></div>
            @endif
        @endforeach
    </div>
    <div class="h-12"></div>
</div>
