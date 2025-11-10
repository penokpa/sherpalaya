<div class="bg-blue-100/50">

    <div class="card--rounded-none image-full  bg-blue-100/50 h-[80vh]">
        <figure class="h-[80vh] w-full">
            <img src="{{ $trek->coverImage?->url ?? '/photos/banner.jpg' }}" alt="Trekking background image"
                class="h-[80vh] w-full object-cover brightness-50" />
        </figure>
        <div class="card-body relative">
            <div
                class="absolute 2xl:bottom-52 2xl:left-32  bottom-40 left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                <div class=" max-w-[92%] 2xl:max-w-[100%]">
                    <h5 class="card-title mb-2.5 text-warning text-2xl md:text-4xl uppercase font-extrabold ">
                        Our
                    </h5>
                    <h2 class="card-title mb-2.5  text-white text-3xl md:text-5xl uppercase font-bold">
                        {{-- {{ $trek->title }} --}}
                        Services
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="h-8 "></div>
    <div class="2xl:mx-32 mx-4 text-left">
        <h1
            class="text-2xl lg:text-5xl  font-light  line-clamp-2 tracking-wider text-primary uppercase wrap text-pretty">
            Our Services In Nepal
        </h1>
        {{-- <h3 class="text-3xl tracking-widest text-primary "> With Sherpalaya</h3> --}}
        <p
            class="text-md text-left  mt-2  text-blue-600 first-line:uppercase first-line:tracking-widest first-line:font-light ">
            For those seeking the ultimate challenge, Sherpalaya’s expedition services offer unparalleled support and
            expertise. Whether it’s climbing Everest or venturing to the lesser-known peaks, Sherpalaya handles every
            detail, from permits to logistics. With our experienced Sherpa team by your side, we transform daunting
            service into achievable milestones, ensuring a fulfilling and transformative adventure. </p>
    </div>
    <div class="h-12 "></div>






    <x-breadcrumb :breadcrumbs="[
        [
            'name' => 'Home',
            'url' => url('/home'),
        ],
        [
            'name' => 'Services',
        ],
    ]" />

    <div class="h-12"></div>


    {{-- Showing <strong>{{ $serviceDestination->services->count() }}</strong> --}}
    <div class="2xl:mx-32 mx-4">

        @foreach ($servicesRegion as $serviceRegion)
            @if (!empty($serviceRegion->name))
                <h5 class="card-title mb-2.5 line-clamp-2 uppercase text-xl text-primary font-bold">
                    {{ $serviceRegion->name }} Region
                </h5>
                <div class="hidden md:grid md:grid-cols-3 lg:grid-cols-4  gap-4">
                    @foreach ($services as $service)
                        <div class="card w-full">
                            <a href="{{ route('show_service', $service->id) }}">

                                <figure>
                                    <img src="{{ $service->coverImage?->url ?? asset('photos/P1030127.JPG') }}"
                                        alt="{{ $service->title }} Cover Image" class="h-60 object-cover" />
                                </figure>
                            </a>
                            <div class="card-body px-2 pt-2 bg-blue-100">
                                <a href="{{ route('show_service', $service->id) }}">
                                    <h5
                                        class="card-title mb-2.5 line-clamp-2 uppercase text-lg text-primary font-normal">
                                        {{ $service->title }}</h5>
                                </a>
                                <div class="justify-start flex flex-col  gap-2">
                                    <span class="text-accent capitalize items-center font-normal line-clamp-4">
                                        {{ $service->description }}
                                    </span>
                                    <div class="flex">
                                        @if (!empty($service->location['lat']) && !empty($service->location['lng']))
                                            <a href="https://maps.google.com/?q={{ $service->location['lat'] }},{{ $service->location['lng'] }}"
                                                target="_blank" rel="noopener noreferrer">
                                                <p class="text-primary">
                                                    Location: {{ $service->location['lat'] }},
                                                    {{ $service->location['lng'] }}
                                                </p>
                                            </a>
                                        @else
                                            <p class="text-slate-500 italic">Location not available</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="h-4"></div> --}}
                <div class="bg-blue-100/60 md:hidden">
                    <div id="multi-slide"
                        data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1 } }'
                        class="relative w-full ">
                        <div class="carousel h-full rounded-none ">
                            <div class="carousel-body h-full opacity-0 ">
                                <!-- Slide 1 -->
                                @foreach ($services as $service)
                                    <div class="carousel-slide max-w-sm px-1">
                                        <div class="card w-full ">
                                            <a href="{{ route('show_service', $service->id) }}">
                                                <figure>
                                                    <img src="{{ $service->coverImage->url ?? asset('photos/P1030127.JPG') }}"
                                                        alt="{{ $service->title }} Cover Image"
                                                        class="h-[20rem] object-cover" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="card-body bg-blue-100/30 ">
                                            <a href="{{ route('show_service',  $service->id) }}">
                                                <h5
                                                    class="card-title mb-2.5 line-clamp-2 uppercase text-lg text-primary font-normal">
                                                    {{ $service->title }}</h5>
                                            </a>
                                            <div class="justify-start flex flex-col  gap-2">
                                                <span
                                                    class="text-accent capitalize items-center font-normal line-clamp-4">
                                                    {{ $service->description }}
                                                </span>
                                                <div class="flex">
                                                    @if (!empty($service->location['lat']) && !empty($service->location['lng']))
                                                        <a href="https://maps.google.com/?q={{ $service->location['lat'] }},{{ $service->location['lng'] }}"
                                                            target="_blank" rel="noopener noreferrer">
                                                            <p class="text-primary">
                                                                Location: {{ $service->location['lat'] }},
                                                                {{ $service->location['lng'] }}
                                                            </p>
                                                        </a>
                                                    @else
                                                        <p class="text-slate-500 italic">Location not available</p>
                                                    @endif
                                                </div>
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
                <div class="h-10"></div>
            @endif
        @endforeach
    </div>


    <div class="h-12"></div>


    <div class="h-20">

    </div>
</div>
