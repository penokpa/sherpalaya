<div class="bg-blue-100/10">
    <div class="card--rounded-none image-full  bg-blue-100/50 h-[80dvh]">
        <figure class="h-[80dvh] w-full">
            <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->trek_page_cover_image_id" :fallback="asset('/photos/banner.jpg')"
                loading="lazy" />
        </figure>
        <div class="card-body relative">
            <div
                class="absolute lg:bottom-96 xl:left-32  bottom-20 left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                <div class="">
                    {{-- <h5 class="card-title mb-2.5 text-warning text-2xl md:text-5xl uppercase font-extrabold ">
                        Explore
                    </h5> --}}
                    <h2 class="card-title mb-2.5  text-white text-3xl md:text-6xl uppercase font-bold">
                        {{-- {{ $trek->title }} --}}
                        Peaks
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
            'name' => 'Trekking',
        ],
    ]" />
    <div class="bg-blue-100/50">

        <div class="h-8 "></div>
        <div class="xl:mx-32 mx-4 text-left">
            <h1
                class="text-2xl lg:text-4xl  font-light  line-clamp-2 tracking-wider text-primary uppercase wrap text-pretty">
                Trekking Adventure In Nepal
            </h1>
            <p
                class="text-md text-left  mt-2  text-blue-600 first-line:uppercase first-line:tracking-widest first-line:font-light ">
                For those seeking the ultimate challenge, Sherpalaya’s expedition services offer unparalleled support
                and
                expertise. Whether it’s climbing Everest or venturing to the lesser-known treks, Sherpalaya handles
                every
                detail, from permits to logistics. With our experienced Sherpa team by your side, we transform daunting
                Trek into achievable milestones, ensuring a fulfilling and transformative adventure. </p>
        </div>
        <div class="h-12 "></div>
    </div>






    <div class="h-12"></div>


    <div class="xl:mx-32 mx-4">
        @foreach ($treksRegion as $trekRegion)
            @if ($trekRegion->treks->isNotEmpty())
                <div id="region-{{ $trekRegion->id }}">
                    <h5 class="card-title mb-2.5 line-clamp-2 uppercase tracking-wider text-2xl text-primary font-bold">
                        {{ $trekRegion->name }} Region
                    </h5>
                    <div class="h-3"></div>
                    <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 flex-col gap-4">
                        @foreach ($trekRegion->treks as $trek)
                            <div class="card w-full ">
                                <div>
                                    <div id="info"
                                        data-carousel='{ "loadingClasses": "opacity-0", "isInfiniteLoop": true, "slidesQty": 1 }'
                                        class="relative w-full">
                                        <div class="carousel h-full rounded-none rounded-t-md">
                                            <div class="carousel-body h-full opacity-0">
                                                @foreach ($trek->images as $image)
                                                    <div class="carousel-slide">
                                                        <a href="{{ route('show_trek', ['id'=>$trek->id, 'locale'=>app()->currentLocale()]) }}">
                                                            <div class="bg-base-200/50 flex h-full justify-center">
                                                                <span class="self-start w-full ">
                                                                    <figure>
                                                                        <img src="{{ $image->url ?? asset('photos/P1030127.JPG') }}"
                                                                            alt="{{ $trek->title }} Cover Image"
                                                                            class="h-72 object-cover" />
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

                                <div class="card-body px-2 pt-2 bg-blue-100/30 ">
                                    <a href="{{ route('show_trek', ['id'=>$trek->id, 'locale'=>app()->currentLocale()]) }}">
                                        <h5
                                            class="card-title mb-2.5 line-clamp-2 uppercase text-lg text-primary font-semibold">
                                            {{ $trek->title }}</h5>
                                    </a>
                                    <div class="justify-start flex flex-row items-center  gap-2">
                                        <span
                                            class="icon-[solar--calendar-outline] size-5 font-extrabold text-primary"></span>
                                        {{-- <span class="text-primary font-font-extralight	 uppercase items-center px-2"> Duration : </span> --}}
                                        <span class="text-primary uppercase items-center font-extrabold ">
                                            {{ $trek->duration . ' days' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="h-4"></div>
                </div>


                {{-- @if ($trekRegion->treks->count() > 1) --}}
                <div class="bg-blue-100/20 md:hidden">
                    <div id="multi-slide"
                        data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1 } }'
                        class="relative w-full ">
                        <div class="carousel h-full rounded-none ">
                            <div class="carousel-body h-full opacity-0 ">
                                <!-- Slide 1 -->
                                @foreach ($trekRegion->treks as $trek)
                                    <div class="carousel-slide  bg-blue-100">
                                        <div class="card w-full ">
                                            <a href="{{ route('show_trek', ['id'=>$trek->id, 'locale'=>app()->currentLocale()]) }}">
                                                <img src="{{ $trek->coverImage->url ?? asset('photos/P1030127.JPG') }}"
                                                    alt="{{ $trek->title }} Cover Image"
                                                    class="h-[20rem] object-cover" />
                                            </a>
                                        </div>
                                        <div class="card-body bg-blue-100/30 ">
                                            <a href="{{ route('show_trek', ['id'=>$trek->id, 'locale'=>app()->currentLocale()]) }}">
                                                <h5
                                                    class="card-title mb-2.5 line-clamp-2 uppercase text-lg text-primary font-normal">
                                                    {{ $trek->title }}</h5>
                                            </a>
                                            <div class="justify-start flex flex-row items-center  gap-2">
                                                <span
                                                    class="icon-[solar--calendar-outline] size-5 font-extrabold text-primary"></span>
                                                {{-- <span class="text-primary font-font-extralight	 uppercase items-center px-2"> Duration : </span> --}}
                                                <span class="text-primary uppercase items-center font-extrabold ">
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
                {{-- @endif --}}
                <div class="h-14"></div>
            @endif
        @endforeach
    </div>
    <div class="h-12"></div>
</div>
