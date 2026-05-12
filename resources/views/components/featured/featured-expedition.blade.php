{{-- @php
    $featuredExpeditions = $expeditions->where('is_featured', true);
@endphp

@if ($featuredExpeditions->isNotEmpty())
    <div class="bg-blue-100/50">
        <div class="h-10 "></div>
        <div class="xl:mx-32 mx-4 ">
            <h5 class="text-5xl font-light text-left line-clamp-2 tracking-wider text-black">Expeditions
            </h5>
            <h3 class="text-3xl tracking-widest text-accent "> With Sherpalaya</h3>
            <p
                class="text-md  mt-2 text-preety text-slate-800 text-balance md:text-wrap md:text-justify first-line:uppercase first-line:tracking-widest first-line:font-light ">
                    {{ $landingPageSetting->expedition_activity_content }}
            </p>

            <div id="multi-slide" data-carousel='{ "loadingClasses": "opacity-0", "slidesQty": { "xs": 1.1, "lg": 4 } }'
                class="relative w-full mt-2">
                <div class="carousel h-[28rem] rounded-none ">
                    <div class="carousel-body h-[28rem] opacity-0 gap-4">
                        <!-- Slide 1 -->
                        @foreach ($featuredExpeditions as $featuredExpedition)
                            <div class="carousel-slide">
                                <div class="bg-base-200/50 flex h-[28rem] justify-center ">
                                    <span class="self-start text-lg">
                                        <div class="bg-base-300/60 flex h-[28rem] justify-center ">
                                            <span class="self-start text-2xl sm:text-4xl">
                                                <div
                                                    class="card rounded-none  image-full  w-full relative flex items-center  card-side group hover:shadow border ">
                                                    <figure class="h-[28rem] w-full">
                                                        <img src="{{ $featuredExpedition->featureImage->url ?? asset('photos/mountain3.jpg') }}"
                                                            alt="{{ $featuredExpedition->title }} Cover Image"
                                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                                    </figure>
                                                    <a href="{{ route('show_trek', $featuredExpedition->id) }}">
                                                        <div class="card-body absolute inset-0 justify-end  ">
                                                            <div class="text-left backdrop-blur-md ">
                                                                <h2 class="font-bold text-white  text-xl">
                                                                    {{ $featuredExpedition->title }}
                                                                </h2>
                                                                <h2
                                                                    class="font-bold tracking-normal text-white line-clamp-2  text-xl">
                                                                    {{ $featuredExpedition->highest_altitude }} m
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($featuredExpeditions->count() > 4)
                    <!-- Previous Slide -->
                    <button type="button" class="carousel-prev">
                        <span class="size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow">
                            <span class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <!-- Next Slide -->
                    <button type="button" class="carousel-next">
                        <span class="sr-only">Next</span>
                        <span class="size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow">
                            <span class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
                        </span>
                    </button>
                @endif
            </div>
        </div>

        <div class="h-10 "></div>
    </div>
@endif --}}



{{-- <x-featured.expedition.one-item /> --}}
<x-featured.expedition.two-item />
{{-- <x-featured.expedition.three-item />
<x-featured.expedition.four-item />
<x-featured.expedition.more-item /> --}}
