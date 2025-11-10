<x-website-layout>
    {{-- <x-trek.trek-landing-page /> --}}
    <div class="bg-blue-100/10 font-body">
        <div class="card--rounded-none image-full bg-blue-100/50 h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <x-curator-glider class="h-[80vh] w-full object-cover brightness-50" :media="$pageSetting->trek_page_cover_image_id ?? null" :fallback="asset('/photos/banner.jpg')"
                    loading="lazy" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        Unforgettable
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        Trekking Adventure
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        Every Step Counts
                    </h5>
                </div>
            </div>
        </div>

        <div class="bg-blue-100/30">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/home'),
                ],
                [
                    'name' => 'Treks',
                ],
            ]" />
            <div class="h-4 "></div>
            <div class="2xl:mx-32 mx-4 text-left">
                <p class="text-md text-left  mt-2  text-stone-600 font-body text-xl/7 font-light ">
                    {{ $pageSetting->trek_page_content }}
                </p>
            </div>
            <div class="h-12 "></div>
        </div>

        <div class="h-12"></div>
        <div class="2xl:mx-32 mx-4">
            <div class="h-4"></div>
            <nav class="sticky top-0 z-30 tabs bg-white horizontal-scrollbar md:justify-end py-4 md:gap-8 gap-2"
                aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="tab active-tab:tab-active active-tab:font-extrabold active text-base font-medium "
                    id="tabs-center-item-all" data-tab="#trek-tabs-center-all" aria-controls="trek-tabs-center-all"
                    role="tab" aria-selected="true">
                    ALL
                </button>
                @foreach ($allTreks as $index => $trekCategory)
                    @if ($trekCategory->treks->count() > 0)
                        <button type="button"
                            class="tab active-tab:tab-active active-tab:font-extrabold uppercase text-nowrap text-base font-medium "
                            id="trek-tabs-center-item-{{ $trekCategory->id }}"
                            data-tab="#trek-tabs-center-{{ $trekCategory->id }}"
                            aria-controls="trek-tabs-center-{{ $trekCategory->id }}" role="tab"
                            aria-selected="false">
                            {{ $trekCategory->name }}
                        </button>
                    @endif
                @endforeach
            </nav>
            <div class="mt-8">
                <div id="trek-tabs-center-all" role="tabpanel" aria-labelledby="tabs-center-item-all">
                    <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                        @foreach ($allTreks as $allTrek)
                            @foreach ($allTrek->treks as $catTrek)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($catTrek->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $catTrek->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_trek', $catTrek->id) }}">
                                        <div class="card-body absolute inset-0 justify-center group ">
                                            <div class="text-center font-oswald tracking-wide font-normal ">
                                                <h2 class=" text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $catTrek->title }}
                                                </h2>
                                                <h2
                                                    class=" text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $catTrek->highest_altitude }} m
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($allTreks as $index => $trekCategory)
                    <div id="trek-tabs-center-{{ $trekCategory->id }}" role="tabpanel"
                        aria-labelledby="trek-tabs-center-item-{{ $trekCategory->id }}"
                        class="@if ($index !== -1) hidden @endif ">
                        <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                            @foreach ($trekCategory->treks as $trek)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($trek->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $trek->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_trek', $trek->id) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center font-oswald tracking-wide font-normal">
                                                <h2 class=" text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $trek->title }}
                                                </h2>
                                                <h2
                                                    class=" tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $trek->highest_altitude }} m
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Showing <strong>{{ $trekRegion->treks->count() }}</strong> --}}
        {{-- <div class="2xl:mx-32 mx-4">
            @foreach ($treksRegion as $trekRegion)
                @if ($trekRegion->treks->isNotEmpty())
                    <div id="region-{{ $trekRegion->id }}">
                        <h5 class="card-title mb-2.5 line-clamp-2 uppercase text-2xl md:text-center md:text-3xl text-black  "
                            data-aos="fade-down" data-aos-duration="1200">
                            {{ $trekRegion->name }} Region Packages
                        </h5>
                        <div class="h-4 md:h-8"></div>
                        <div class="hidden md:grid md:grid-cols-2   flex-col gap-14">
                            @foreach ($trekRegion->treks as $trek)
                                <div class="card w-full " data-aos="fade-down" data-aos-duration="1200">
                                    <div>
                                        <div id="info"
                                            data-carousel='{ "loadingClasses": "opacity-0", "isInfiniteLoop": true, "slidesQty": 1 }'
                                            class="relative w-full">
                                            <div class="carousel h-full rounded-none rounded-t-md">
                                                <div class="carousel-body h-full opacity-0">
                                                    @foreach ($trek->images as $image)
                                                        <div class="carousel-slide">
                                                            <a href="{{ route('show_trek', $trek->id) }}">
                                                                <div class="bg-base-200/50 flex h-full justify-center">
                                                                    <span class="self-start w-full ">
                                                                        <figure>
                                                                            <img src="{{ $image->url ?? asset('photos/P1030127.JPG') }}"
                                                                                alt="{{ $trek->title }} Cover Image"
                                                                                class="h-60 object-cover" />
                                                                        </figure>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Previous Slide -->

                                            <div
                                                class="carousel-info absolute bottom-3 start-[85%] inline-flex -translate-x-[50%] justify-center rounded-lg text-white px-4">
                                                <span class="carousel-info-current me-1">0</span>
                                                /
                                                <span class="carousel-info-total ms-1">0</span>

                                                <button type="button" class="carousel-prev">
                                                    <span
                                                        class="size-9.5 text-white flex items-center justify-center rounded-full shadow">
                                                        <span
                                                            class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                                                    </span>
                                                    <span class="sr-only">Previous</span>
                                                </button>
                                                <!-- Next Slide -->
                                                <button type="button" class="carousel-next">
                                                    <span class="sr-only">Next</span>
                                                    <span
                                                        class="size-9.5 text-white flex items-center justify-center rounded-full shadow">
                                                        <span
                                                            class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body px-2 pt-2 bg-blue-100/50 group">
                                        <a href="{{ route('show_trek', $trek->id) }}">
                                            <h5
                                                class="card-title mb-1 line-clamp-2 uppercase text-lg tracking-normal text-stone-700 font-semibold group-hover:underline group-hover:text-warning">
                                                {{ $trek->title }}</h5>
                                        </a>
                                        <div class="justify-start flex flex-row items-center  gap-2 text-stone-700">
                                            <span class="icon-[solar--calendar-outline] size-5 font-extrabold "></span>
                                            <span class=" uppercase items-center font-semibold tracking-wide">
                                                {{ $trek->duration . ' days' }}
                                            </span>
                                        </div>
                                    </div>
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
                                    @foreach ($trekRegion->treks as $trek)
                                        <div class="carousel-slide full ">
                                            <div class="card w-full ">
                                                <a href="{{ route('show_trek', $trek->id) }}">
                                                    <figure>
                                                        <img src="{{ $trek->coverImage->url ?? asset('photos/P1030127.JPG') }}"
                                                            alt="{{ $trek->title }} Cover Image"
                                                            class="h-[20rem] object-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-body bg-blue-100 px-2">
                                                <a href="{{ route('show_trek', $trek->id) }}">
                                                    <h5
                                                        class="card-title mb-1 line-clamp-2 uppercase text-lg text-blue-800 font-semibold">
                                                        {{ $trek->title }}</h5>
                                                </a>
                                                <div class="justify-start flex flex-row items-center  gap-2">
                                                    <span
                                                        class="icon-[solar--calendar-outline] size-5 font-extrabold text-slate-800"></span>
                                                    <span class="text-slate-800 uppercase font-semibold ">
                                                        {{ $trek->duration . ' days' }}
                                                    </span>
                                                </div>
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
        </div> --}}
        <div class="h-12"></div>
    </div>

</x-website-layout>
