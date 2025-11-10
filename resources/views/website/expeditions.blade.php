<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <div class="card--rounded-none image-full  h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <x-curator-glider class="h-[80vh] w-full object-cover brightness-50" :media="$pageSetting->expedition_page_cover_image_id ?? null" :fallback="asset('/photos/banner.jpg')"
                    loading="lazy" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        Conquer New Heights
                    </h5>
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        Epic Expeditions 
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        Guided by Experience, Inspired by Nature
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
                    'name' => 'Expedition',
                ],
            ]" />
            <div class="h-10">
            </div>
            <div class="2xl:mx-32 mx-4 text-left">
                <p class="text-left  mt-2  text-stone-600  font-body text-xl/7 font-light">
                    {{ $pageSetting->expedition_page_content }}
                </p>
            </div>
            <div class="h-10"></div>
        </div>

        <div class="2xl:mx-32 mx-4">
            <div class="h-4"></div>
            <nav class="sticky top-0 z-30 tabs  bg-white horizontal-scrollbar md:justify-end py-4 gap-2 md:gap-16"
                aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="tab active-tab:tab-active active-tab:font-extrabold active text-base  font-medium "
                    id="expedition-tabs-center-item-all" data-tab="#expedition-tabs-center-all"
                    aria-controls="expedition-tabs-center-all" role="tab" aria-selected="true">
                    ALL
                </button>
                @foreach ($allExpeditions as $index => $expeditionCategory)
                    @if ($expeditionCategory->expeditions->count() > 0)
                        <button type="button"
                            class="tab active-tab:tab-active active-tab:font-extrabold uppercase text-nowrap text-base  font-medium "
                            id="expedition-tabs-center-item-{{ $expeditionCategory->id }}"
                            data-tab="#expedition-tabs-center-{{ $expeditionCategory->id }}"
                            aria-controls="expedition-tabs-center-{{ $expeditionCategory->id }}" role="tab"
                            aria-selected="false">
                            {{ $expeditionCategory->name }}
                        </button>
                    @endif
                @endforeach
            </nav>
            <div class="h-10"></div>
            <div class="bg-white">
                <div id="expedition-tabs-center-all" role="tabpanel" aria-labelledby="expedition-tabs-center-item-all">
                    <div class="flex flex-col md:grid md:grid-cols-2 gap-2">
                        @foreach ($allExpeditions as $allExpedition)
                            @foreach ($allExpedition->expeditions as $expedition)
                                {{-- <div class="w-[70%] flex md:justify-center md:items-center"></div> --}}
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($expedition->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $expedition->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_expedition', $expedition->id) }}">
                                        <div class="card-body absolute inset-0 justify-center ">
                                            <div class="font-oswald tracking-wide font-normal text-center">
                                                <h2 class=" text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $expedition->title }}
                                                </h2>
                                                <h2 class="text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $expedition->highest_altitude }} m
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($allExpeditions as $index => $expeditionCategory)
                    <div id="expedition-tabs-center-{{ $expeditionCategory->id }}" role="tabpanel"
                        aria-labelledby="expedition-tabs-center-item-{{ $expeditionCategory->id }}"
                        class="@if ($index !== -1) hidden @endif ">
                        <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                            @foreach ($expeditionCategory->expeditions as $expedition)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($expedition->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $expedition->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_expedition', $expedition->id) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="font-oswald tracking-wide font-normal text-center">
                                                <h2 class=" text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                    {{ $expedition->title }}
                                                </h2>
                                                <h2
                                                    class=" text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $expedition->highest_altitude }} m
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
            </div>


            {{-- old exp --}}

            {{-- @foreach ($allExpeditions as $expeditionRegion)
                @if ($expeditionRegion->expeditions->isNotEmpty())
                    <div id="region-{{ $expeditionRegion->id }}">
                        <h5 class="card-title mb-2.5 line-clamp-2 uppercase text-2xl md:text-3xl text-black text-left "
                            >
                            {{ $expeditionRegion->name }}
                        </h5>
                        <div class="h-4"></div>
                        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-2  gap-3">
                            @foreach ($expeditionRegion->expeditions as $expedition)
                                <div class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border "
                                    >
                                    <figure class="h-[20rem] w-full">
                                        <img src="{{ optional($expedition->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $expedition->title }} Cover Image"
                                            class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a href="{{ route('show_expedition', $expedition->id) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center" >
                                                <h2 class="font-bold text-blue-50 text-3xl uppercase">
                                                    {{ $expedition->title }}
                                                </h2>
                                                <h2
                                                    class="font-bold tracking-normal text-blue-50 line-clamp-2 text-3xl">
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
                                                        class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                                </figure>
                                                <a href="{{ route('show_expedition', $expedition->id) }}">
                                                    <div class="card-body absolute inset-0 justify-center">
                                                        <div class="text-center">
                                                            <h2 class="font-bold text-blue-50 text-2xl uppercase">
                                                                {{ $expedition->title }}
                                                            </h2>
                                                            <h2
                                                                class="font-bold tracking-normal text-blue-50 line-clamp-2 text-2xl">
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
                                class="hidden md:flex icon-[tabler--chevron-left] size-8 text-blue-50 cursor-pointer rtl:rotate-180"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <!-- Next Slide -->
                        <button type="button" class="carousel-next">
                            <span class="sr-only">Next</span>
                            <span
                                class="hidden md:flex icon-[tabler--chevron-right] size-8 text-blue-50 cursor-pointer rtl:rotate-180"></span>
                        </button>
                    </div>
                    <div class="h-14"></div>
                @endif
            @endforeach --}}



            <div class="h-12"></div>
        </div>
    </div>
</x-website-layout>
