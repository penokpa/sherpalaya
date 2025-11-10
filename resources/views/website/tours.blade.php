<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <div class="card--rounded-none image-full bg-blue-100/50 h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <x-curator-glider class="h-[80vh] w-full object-cover brightness-50" :media="$pageSetting->tour_page_cover_image_id ?? null" :fallback="asset('/photos/banner.jpg')"
                    loading="lazy" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        Jaw Dropping
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        Tours & Activities
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        The Journey of a Lifetime
                    </h5>
                </div>
            </div>
        </div>

        <div class="bg-blue-100/20">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/home'),
                ],
                [
                    'name' => 'Tours',
                ],
            ]" />
            <div class="h-4"></div>
            <div class="2xl:mx-32 mx-4 text-left">
                <p class="text-xl/7 text-left  text-stone-600 font-light font-body">
                    {{ $pageSetting->tour_page_content }}
                </p>
            </div>
            <div class="h-14"></div>
        </div>

        {{-- Showing <strong>{{ $tourRegion->tours->count() }}</strong> --}}
        <div class="2xl:mx-32 mx-4">
            <div class="h-4"></div>
            <nav class="sticky top-0 z-30 tabs  gap-2 md:gap-8  bg-white horizontal-scrollbar md:justify-end py-4"
                aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="tab active-tab:tab-active active-tab:font-extrabold active text-base font-medium"
                    id="tabs-center-item-all-tour" data-tab="#tabs-center-all-tour" aria-controls="tabs-center-all-tour"
                    role="tab" aria-selected="true">
                    ALL
                </button>
                @foreach ($allTours as $index => $tourCategory)
                    @if ($tourCategory->tours->count() > 0)
                        <button type="button"
                            class="tab active-tab:tab-active active-tab:font-extrabold uppercase text-nowrap text-base font-medium"
                            id="tour-tabs-center-item-{{ $tourCategory->id }}"
                            data-tab="#tour-tabs-center-{{ $tourCategory->id }}"
                            aria-controls="tour-tabs-center-{{ $tourCategory->id }}" role="tab"
                            aria-selected="false">
                            {{ $tourCategory->name }}
                        </button>
                    @endif
                @endforeach
            </nav>
            <div class="mt-8">
                <div id="tabs-center-all-tour" role="tabpanel" aria-labelledby="tabs-center-item-all-tour">
                    <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                        @foreach ($allTours as $allExpedition)
                            @foreach ($allExpedition->tours as $tour)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($tour->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $tour->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_tour', $tour->id) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center">
                                                <h2
                                                    class="font-bold text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $tour->title }}
                                                </h2>
                                                <h2
                                                    class="font-bold tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $tour->duration }}
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($allTours as $index => $tourCategory)
                    <div id="tour-tabs-center-{{ $tourCategory->id }}" role="tabpanel"
                        aria-labelledby="tour-tabs-center-item-{{ $tourCategory->id }}"
                        class="@if ($index !== -1) hidden @endif ">
                        <div class="flex flex-col md:grid md:grid-cols-2  gap-1">
                            @foreach ($tourCategory->tours as $tour)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($tour->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $tour->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_tour', $tour->id) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center">
                                                <h2
                                                    class="font-bold text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $tour->title }}
                                                </h2>
                                                <h2
                                                    class="font-bold tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $tour->duration }}
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
            <div class="h-10">




                {{-- @foreach ($tourCategories as $tourCategory)
                <div>
                    <div class="h-8"></div>
                    <h5 class="card-title mb-2.5 line-clamp-2 uppercase text-2xl md:text-3xl lg:text-center text-black font-semibold"
                        data-aos="fade-down" data-aos-duration="1200">
                        {{ $tourCategory->name }} Tours Packages
                    </h5>
                    <div class="h-4"></div>
                    <div id="type-{{ $tourCategory->id }}" class="hidden md:grid md:grid-cols-2   gap-4">
                        @foreach ($tourCategory->tours as $tour)
                            <div class="card w-full " data-aos="fade-down" data-aos-duration="1200">
                                <div>
                                    <div id="info"
                                        data-carousel='{ "loadingClasses": "opacity-0", "isInfiniteLoop": true, "slidesQty": 1 }'
                                        class="relative w-full">
                                        <div class="carousel h-60 rounded-none rounded-t-md">
                                            <div class="carousel-body h-full opacity-0">
                                                @foreach ($tour->images as $image)
                                                    <div class="carousel-slide">
                                                        <a href="{{ route('show_tour', $tour->id) }}">
                                                            <div class="bg-base-200/50 flex h-full justify-center">
                                                                <span class="self-start w-full ">
                                                                    <figure>
                                                                        <img src="{{ $image->url ?? asset('photos/P1030127.JPG') }}"
                                                                            alt="{{ $tour->title }} Cover Image"
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

                                <div class="card-body px-2 pt-2 bg-blue-100/50 ">
                                    <a href="{{ route('show_tour', $tour->id) }}">
                                        <h5
                                            class="card-title mb-1 line-clamp-2 uppercase text-lg text-blue-700 font-semibold">
                                            {{ $tour->title }}</h5>
                                    </a>
                                    <div class="justify-start flex flex-row items-center  gap-1">
                                        <span
                                            class="icon-[solar--calendar-outline] size-5 font-extrabold text-primary"></span>
                                        <span class="text-slate-800 uppercase items-center font-semibold ">
                                            {{ $tour->duration }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="bg-blue-100/60 md:hidden">
                        <div id="multi-slide"
                            data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1 } }'
                            class="relative w-full ">
                            <div class="carousel h-full rounded-none ">
                                <div class="carousel-body h-full opacity-0 ">
                                    <!-- Slide 1 -->
                                    @foreach ($tourCategory->tours as $tour)
                                        <div class="carousel-slide max-w-sm px-1">
                                            <div class="card w-full ">
                                                <a href="{{ route('show_tour', $tour->id) }}">
                                                    <figure>
                                                        <img src="{{ $tour->coverImage?->url ?? asset('photos/P1030127.JPG') }}"
                                                            alt="{{ $tour->title }} Cover Image"
                                                            class="h-[20rem] object-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-body bg-blue-100 px-2 pt-2">
                                                <a href="{{ route('show_tour', $tour->id) }}">
                                                    <h5
                                                        class="card-title mb-1 line-clamp-2 uppercase text-lg text-blue-700 font-semibold">
                                                        {{ $tour->title }}</h5>
                                                </a>
                                                <div class="justify-start flex flex-row items-center  gap-1">
                                                    <span
                                                        class="icon-[solar--calendar-outline] size-5 font-extrabold text-slate-800"></span>
                                                    <span class="text-slate-800 uppercase items-center font-semibold ">
                                                        {{ $tour->duration }}
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
                </div>
            @endforeach --}}
            </div>
            <div class="h-10"></div>
        </div>
</x-website-layout>
