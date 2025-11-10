@if ($featuredExpeditions->count() > 4)

    <div class="bg-blue-100/60">
        <div class="2xl:mx-32 mx-4 ">
            <div class="h-14"></div>
            <div class="">
                <h5 class="text-4xl font-light line-clamp-2 tracking-wider text-black md:text-center ">Expedition</h5>
                {{-- <h3 class="text-3xl tracking-widest text-accent text-center ">With Sherpalaya</h3> --}}
                <p
                    class="text-md mt-2 text-preety text-slate-800 text-balance md:text-wrap
                        md:text-center first-line:uppercase first-line:tracking-widest first-line:font-light">
                    {{ $landingPageSetting->expedition_activity_content }}
                </p>
            </div>
            <div class="h-4"></div>
            <div id="multi-slide"
                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.8, "md": 2.5, "lg": 3.1, "xl": 3.5 } }'
                class="relative w-full">
                <div class="carousel h-[28rem] rounded-none">
                    <div class="carousel-body h-full opacity-0">
                        <!-- Slide 1 -->
                        @foreach ($featuredExpeditions as $featuredExpedition)
                            <div class="carousel-slide px-1 max-w-sm">
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                    <figure class="h-[28rem] max-w-sm">
                                        <img src="{{ optional($featuredExpedition->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $featuredExpedition->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                    </figure>
                                    <a href="{{ route('show_expedition', $featuredExpedition->id) }}">
                                        <div class="card-body absolute inset-0 justify-end">
                                            <div class="text-center">
                                                <h2 class="font-bold text-white text-2xl uppercase">
                                                    {{ $featuredExpedition->title }}
                                                </h2>
                                                <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                    {{ $featuredExpedition->highest_altitude }} m
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
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
        <div class="h-14"></div>
    </div>
@endif
