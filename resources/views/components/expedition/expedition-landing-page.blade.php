<div class="bg-blue-100/50">
    <div class="card--rounded-none image-full  bg-blue-100/50 h-[80dvh]">
        <figure class="h-[80dvh] w-full">
            <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->expedition_page_cover_image_id" :fallback="asset('/photos/banner.jpg')"
                loading="lazy" />
        </figure>
        <div class="card-body ">
            <div
                class="absolute 2xl:bottom-52 xl:left-32  bottom-52 left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                <div class="">
                    <h2 class="card-title mb-2.5  text-white text-3xl md:text-6xl uppercase font-bold">
                        Expeditions
                    </h2>
                    <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold ">
                        With Sherpalaya
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <x-breadcrumb :breadcrumbs="[
        [
            'name' => 'Home',
            'url' => url('/' . app()->currentLocale() . '/home'),
        ],
        [
            'name' => 'Expedition',
        ],
    ]" />

    <div class="bg-blue-100/50">
        <div class="h-8 "></div>
        <div class="xl:mx-32 mx-4 text-left">
            <h1
                class="text-2xl lg:text-4xl  font-light  line-clamp-2 tracking-wider text-primary uppercase wrap text-pretty">
                Expedition In Nepal
            </h1>
            <p
                class="text-md mt-2 text-preety text-slate-800 lg:text-center
                 first-line:uppercase first-line:font-light">
                {!! app()->currentLocale() == 'fr'
                    ? $landingPageSetting->expedition_activity_content_fr
                    : $landingPageSetting->expedition_activity_content_en !!}
            </p>
        </div>
        <div class="h-12 "></div>
    </div>






    <div class="h-12"></div>


    <div class="xl:mx-32 mx-4">
        @foreach ($expeditionsRegion as $expeditionRegion)
            @if ($expeditionRegion->expeditions->isNotEmpty())
                <div id="region-{{ $expeditionRegion->id }}">
                    <h5 class="card-title mb-2.5 line-clamp-2 uppercase tracking-wider text-2xl text-primary font-bold">
                        {{ $expeditionRegion->name }} Region
                    </h5>
                    <div class="h-3"></div>
                    <div class="hidden md:grid md:grid-cols-3 lg:grid-cols-4  gap-3">
                        @foreach ($expeditionRegion->expeditions as $expedition)
                            <div
                                class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                <figure class="h-[25rem] max-w-sm">
                                    <img src="{{ optional($expedition->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                        alt="{{ $expedition->title }} Cover Image"
                                        class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                </figure>
                                <a href="{{ route('show_expedition', ['id'=>$expedition->id, 'locale'=>app()->currentLocale()]) }}">
                                    <div class="card-body absolute inset-0 justify-end">
                                        <div class="text-center">
                                            <h2 class="font-bold text-white text-2xl uppercase">
                                                {{ $expedition->title }}
                                            </h2>
                                            <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                {{ $expedition->highest_altitude }} m
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
                                @foreach ($expeditionRegion->expeditions as $expedition)
                                    <div class="carousel-slide max-w-sm px-1">
                                        <div
                                            class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                            <figure class="h-[28rem] max-w-sm">
                                                <img src="{{ optional($expedition->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                                    alt="{{ $expedition->title }} Cover Image"
                                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                            </figure>
                                            <a href="{{ route('show_expedition', ['id'=>$expedition->id, 'locale'=>app()->currentLocale()]) }}">
                                                <div class="card-body absolute inset-0 justify-end">
                                                    <div class="text-center">
                                                        <h2 class="font-bold text-white text-2xl uppercase">
                                                            {{ $expedition->title }}
                                                        </h2>
                                                        <h2
                                                            class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                            {{ $expedition->highest_altitude }} m
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
