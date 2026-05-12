{{-- @php
    $featuredPeaks = $peaks->where('is_featured', true);
@endphp
<div class="bg-blue-100/30">
    @if ($featuredPeaks->isNotEmpty())
        <div class="2xl:mx-44 mx-4 ">
            <div>
                <div class="h-10"></div>
                <h3 class="text-4xl  tracking-widest text-center ">Peaks</h3>
                <p
                    class="text-md mt-2 text-slate-600 text-preety text-balance md:text-wrap md:text-center first-line:uppercase first-line:tracking-widest tracking-wide ">
                    {{ app()->currentLocale() == 'fr' ?$landingPageSetting->peak_activity_content_fr:$landingPageSetting->peak_activity_content_en }}
                </p>
            </div>
            <div class="">
                @if ($peaks->where('is_featured', true)->count() > 1)
                    <div class="h-6">
                    </div>
                    <div id="horizontal-thumbnails" data-carousel='{ "loadingClasses": "opacity-0" }'
                        class="relative w-full ">
                        <div class="carousel rounded-none">
                            <div class="carousel-body h-[75vh] opacity-0 rounded-none">
                                @foreach ($peaks->where('is_featured', true) as $featuredPeak)
                                    <!-- Slide 1 -->
                                    <div class="carousel-slide rounded-none">
                                        <div
                                            class="card--rounded-none image-full h-4/5 w-full relative flex items-center justify-end card-side group hover:shadow border-none">
                                            <figure class="h-full w-full">
                                                <img src="{{ $featuredPeak->featureImage->url ?? asset('photos/mountain1.jpg') }}"
                                                    alt="{{ $featuredPeak->title }} Cover Image"
                                                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75" />
                                            </figure>
                                            <a href="{{ route('show_peak', $featuredPeak->id) }}">
                                                <div class="card-body absolute inset-0 flex items-center justify-end ">
                                                    <div class="text-center">
                                                        <h2
                                                            class="font-bold text-white bg-gradient-to-r from-white to-white bg-clip-text uppercase text-4xl">
                                                            {{ $featuredPeak->title }}
                                                        </h2>
                                                        <h2
                                                            class=" tracking-normal text-white line-clamp-2 bg-gradient-to-r from-white to-white bg-clip-text text-transparent font-black text-4xl">
                                                            {{ $featuredPeak->highest_altitude }}m
                                                        </h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div
                                class="carousel-pagination  absolute bottom-0 end-0 start-0 z-[1] h-1/5 flex justify-center gap-0 overflow-x-auto ">
                                @foreach ($peaks->where('is_featured', true) as $featuredPeak)
                                    <img src="{{ $featuredPeak->featureImage->url ?? asset('photos/DSCF4385.JPG') }}"
                                        alt="{{ $featuredPeak->title }} Cover Image"
                                        class="carousel-pagination-item carousel-active:opacity-100 object-cover object-top opacity-50">
                                @endforeach
                            </div>
                            <!-- Previous Slide -->
                            <button type="button" class="carousel-prev">
                                <span class="mb-15" aria-hidden="true">
                                    <span
                                        class="icon-[tabler--chevron-left] size-8 text-white cursor-pointer rtl:rotate-180 hidden md:flex"></span>
                                </span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <!-- Next Slide -->
                            <button type="button" class="carousel-next">
                                <span class="sr-only">Next</span>
                                <span class="mb-15" aria-hidden="true">
                                    <span
                                        class="icon-[tabler--chevron-right] size-8 text-white cursor-pointer rtl:rotate-180 hidden md:flex "></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="h-16">

                    </div>
                @elseif($peaks->where('is_featured', true)->count() === 1)
                    <div class="h-8">
                    </div>
                    @foreach ($peaks->where('is_featured', true) as $featuredPeak)
                        <div
                            class="card--rounded-none image-full h-[30rem] w-full relative flex items-center justify-end card-side group hover:shadow border-none">
                            <figure class="h-full w-full">
                                <img src="{{ $featuredPeak->featureImage->url ?? asset('photos/DSCF4385.JPG') }}"
                                    alt="{{ $featuredPeak->title }} Cover Image"
                                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75" />
                            </figure>
                            <a href="{{ route('show_peak', $featuredPeak->id) }}">
                                <div class="card-body absolute inset-0 flex items-center justify-end ">
                                    <div class="text-center">
                                        <h2
                                            class="font-bold text-white bg-gradient-to-r from-white to-white bg-clip-text text-4xl uppercase">
                                            {{ $featuredPeak->title }}
                                        </h2>
                                        <h2
                                            class=" tracking-normal text-white line-clamp-2 bg-gradient-to-r from-white to-white bg-clip-text text-transparent font-black text-4xl">
                                            {{ $featuredPeak->highest_altitude }}m
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="h-16 ">
                    </div>
                @endif
            </div>
        </div>
    @endif
</div> --}}




<div class="bg-blue-100/10">
    <div class="xl:mx-32 mx-4 font-oswald">
        <div class="h-10 md:h-20"></div>
        <div class=" " data-aos="fade-down" data-aos-duration="1200">
            <h5
                class="text-4xl md:text-6xl uppercase line-clamp-2 tracking-wider  text-left md:text-center text-slate-800">
                Peaks
            </h5>
            {{-- <h3 class="text-3xl tracking-wider text-accent lg:text-center ">With Sherpalaya</h3> --}}
            <p
                class="text-xl md:hidden font-light mt-2 text-preety text-slate-800 lg:text-center
                 tracking-wide">
                {{ app()->currentLocale() == 'fr' ?$landingPageSetting->peak_activity_content_fr:$landingPageSetting->peak_activity_content_en }}
            </p>
            <div class="h-12"></div>
        </div>
        @if ($featuredPeaks->count() > 0)
            <div class="flex flex-col md:grid grid-cols-2 gap-0 bg-blue-100/10" data-aos="fade-down"
                data-aos-duration="1200">
                @foreach ($featuredPeaks as $featuredPeak)
                    @if ($loop->index % 2 === 0)
                        <div
                            class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border-none">
                            <figure class="h-[28rem] w-full">
                                <img src="{{ optional($featuredPeak->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                    alt="{{ $featuredPeak->title }} Cover Image"
                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                            </figure>
                            <a href="{{ route('show_peak', $featuredPeak->id) }}">
                                <div class="card-body absolute inset-0 justify-end">
                                    <div class="text-center">
                                        <h2 class="font-bold text-white text-3xl uppercase ">
                                            {{ $featuredPeak->title }}
                                        </h2>
                                        <h2 class="font-bold tracking-normal text-white line-clamp-2 text-3xl">
                                            {{ $featuredPeak->highest_altitude }} m
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div
                            class="card rounded-none w-full relative hidden md:flex items-center card-side group hover:shadow border-none ">
                            <div class=" mx-4">
                                <h5
                                    class="text-2xl  line-clamp-2 tracking-wider text-slate-800 md:text-left uppercase underline">
                                    {{ $featuredPeak->title }}</h5>
                                <p
                                    class="text-xl  mt-2 font-light text-slate-800 text-preety break-all first-line:uppercase tracking-wider line-clamp-[15]">
                                    {{ strip_tags($featuredPeak->description) }}

                                </p>
                                <div class="h-4"></div>
                            </div>
                        </div>
                    @else
                        {{-- Second Iteration:  on the text and  on the image --}}
                        <div
                            class="card rounded-none  w-full relative  items-center card-side group hover:shadow border-none hidden md:flex">
                            <div class=" mx-4">
                                <h5
                                    class="relative text-2xl font-light line-clamp-2 tracking-wider text-black md:text-left ">
                                    {{ $featuredPeak->title }}

                                </h5>
                                <p
                                    class="text-md mt-2 text-preety text-slate-800 break-all first-line:uppercase tracking-wide line-clamp-[14]">
                                    {{ strip_tags($featuredPeak->description) }}

                                </p>
                                <div class="h-4"></div>
                            </div>
                        </div>
                        <div
                            class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border-none">
                            <figure class="h-[28rem] w-full">
                                <img src="{{ optional($featuredPeak->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                    alt="{{ $featuredPeak->title }} Cover Image"
                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                            </figure>
                            <a href="{{ route('show_peak', $featuredPeak->id) }}">
                                <div class="card-body absolute inset-0 justify-end">
                                    <div class="text-center">
                                        <h2 class="font-bold text-white text-3xl uppercase">
                                            {{ $featuredPeak->title }}
                                        </h2>
                                        <h2 class="font-bold tracking-normal text-white line-clamp-2 text-3xl">
                                            {{ $featuredPeak->highest_altitude }} m
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    {{-- Add height between iterations except for the last one --}}
                    @unless ($loop->last)
                        <div class="col-span-2 h- "></div>
                    @endunless
                @endforeach
            </div>
        @endif
    </div>
    <div class="h-10 md:h-20"></div>
</div>
