@if ($featuredExpeditions->count() > 0)
    <div class="bg-blue-100/40">
        <div class="xl:mx-32 mx-4 font-card">
            <div class="h-10 md:h-20"></div>
            <article>
                <h3 class="text-3xl md:text-4xl font-oswald font-medium  line-clamp-2 uppercase tracking-wider text-black text-left md:text-left"
                    data-aos="flip-up" data-aos-duration="800">
                    Expeditions
                </h3>
                <div
                    class="text-lg/7 mt-4 text-preety text-black lg:text-justify
                     font-light font-body lg:w-[70%]">
                    {{ app()->currentLocale() == 'fr' ? $landingPageSetting->expedition_activity_content_fr : $landingPageSetting->expedition_activity_content_en }}
                </div>
                <div class="h-6 md:h-12"></div>
            </article>

            <aside class="flex flex-col md:grid grid-cols-7 gap-y-1 bg-blue-100/10 ">
                @foreach ($featuredExpeditions->slice(0, 4) as $featuredExpedition)
                    @if ($loop->index % 2 === 0)
                        {{-- First Iteration: col-span-3 on the text and col-span-4 on the image --}}
                        <div
                            class="card rounded-none px-4 col-span-3 hidden md:block group  content-center  bg-blue-100/60 min-h-[60vh]">
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <h3
                                    class="text-2xl text-balance line-clamp-2  tracking-tight font-body font-medium text-black lg:text-left  uppercase group-hover:underline  decoration-4 decoration-warning  group-hover:underline-offset-4">
                                    {{ $featuredExpedition->title }}
                                </h3>
                            </a>
                            <div class="mt-4 text-justify text-black  font-body font-light text-lg/8 line-clamp-[8] ">
                                {!! Str::words($featuredExpedition->description, 30) !!}
                            </div>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <button class="btn btn-primary btn-md pl-2 mt-6 text-base hover:btn-warning">
                                    <span class="icon-[ci--chevron-right] size-4"></span>
                                    Explore
                                </button>
                            </a>
                        </div>
                        <div
                            class="card rounded-none font-oswald image-full w-full h-full relative flex items-center card-side group hover:shadow border col-span-4 ">
                            <figure class="h-[60vh] w-full ">
                                <img src="{{ optional($featuredExpedition->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                    alt="{{ $featuredExpedition->title }} Cover Image"
                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-[60vh] w-full object-cover" />
                            </figure>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <div
                                    class="card-body absolute inset-0 justify-end md:justify-center px-2 pb-2 h-[60vh]">
                                    <div class="md:text-center " data-aos="flip-up" data-aos-duration="800">
                                        <h4
                                            class="font-bold tracking-wide font-oswald text-blue-50 text-2xl md:text-3xl uppercase group-hover:text-warning text-balance">
                                            {{ $featuredExpedition->title }}
                                        </h4>
                                        <h5
                                            class="font-bold tracking-wide font-oswald text-blue-50 uppercase line-clamp-2 text-2xl md:text-3xl group-hover:text-warning">
                                            {{ $featuredExpedition->highest_altitude }} m
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card rounded-none px-2 py-2 col-span-3  md:hidden group justify-start items-start">
                            <div class="text-justify text-black  font-body font-light text-lg/8 line-clamp-[6] ">
                                {!! Str::words($featuredExpedition->description, 30) !!}
                            </div>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <button
                                    class="btn btn-primary btn-md my-4 text-base hover:btn-warning justify-start pl-2">
                                    <span class="icon-[ci--chevron-right] size-5 "></span>
                                    Explore
                                </button>
                            </a>
                        </div>
                    @else
                        {{-- Second Iteration: col-span-4 on the text and col-span-3 on the image --}}
                        <div
                            class="card rounded-none font-oswald image-full w-full h-full relative flex items-center card-side group hover:shadow border col-span-4">
                            <figure class="h-[60vh] w-full">
                                <img src="{{ optional($featuredExpedition->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                    alt="{{ $featuredExpedition->title }} Cover Image"
                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-[60vh] w-full object-cover" />
                            </figure>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <div class="card-body absolute inset-0 justify-end md:justify-center px-2 pb-2 h-[60vh]">
                                    <div class="text-left md:text-center " data-aos="flip-up" data-aos-duration="800">
                                        <h4
                                            class="font-bold tracking-wide text-blue-50 text-2xl md:text-3xl uppercase group-hover:text-warning text-balance">
                                            {{ $featuredExpedition->title }}
                                        </h4>
                                        <h5
                                            class="font-bold tracking-wide mt-2 text-blue-50 uppercase line-clamp-2 text-2xl md:text-3xl group-hover:text-warning">
                                            {{ $featuredExpedition->highest_altitude }} m
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div
                            class="card rounded-none px-4  col-span-3 hidden md:block group justify-center content-center bg-transparent h-[60vh]">
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <h3
                                    class="text-2xl text-balance line-clamp-2  tracking-tight font-body font-medium text-black lg:text-left  uppercase group-hover:underline  decoration-4 decoration-warning  group-hover:underline-offset-4">
                                    {{ $featuredExpedition->title }}
                                </h3>
                            </a>
                            <div class="mt-4 text-justify text-black  font-body font-light text-lg/8 line-clamp-[8] ">
                                {!! Str::words($featuredExpedition->description, 30) !!}
                            </div>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <button class="btn btn-primary btn-md pl-2 mt-6 text-base hover:btn-warning">
                                    <span class="icon-[ci--chevron-right] size-4"></span>
                                    Explore
                                </button>
                            </a>
                        </div>
                        <div
                            class="card rounded-none px-2 py-2 col-span-3  md:hidden group justify-start items-start bg-blue-100">
                            <div class="text-justify text-black  font-body font-light text-lg/8 line-clamp-[6] ">
                                {!! Str::words($featuredExpedition->description, 30) !!}
                            </div>
                            <a
                                href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                <button
                                    class="btn btn-primary btn-md my-4 text-base hover:btn-warning justify-start pl-2">
                                    <span class="icon-[ci--chevron-right] size-5 "></span>
                                    Explore
                                </button>
                            </a>
                        </div>
                    @endif
                @endforeach
            </aside>

            <div class="h-1"></div>
            <aside class="hidden md:grid md:grid-cols-3 xl:grid-cols-3 md:gap-1 bg-blue-100/10 ">
                @foreach ($featuredExpeditions->slice(4, 10) as $featuredExpedition)
                    {{-- First Iteration: col-span-3 on the text and col-span-4 on the image --}}
                    <div
                        class="card rounded-none font-oswald image-full w-full h-full relative flex items-center card-side group hover:shadow border col-span-1 ">
                        <figure class="h-[60vh] w-full ">
                            <img src="{{ optional($featuredExpedition->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                alt="{{ $featuredExpedition->title }} Cover Image"
                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-[20rem] w-full object-cover" />
                        </figure>
                        <a
                            href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                            <div class="card-body absolute inset-0 justify-center md:justify-center">
                                <div class="text-center " data-aos="flip-up" data-aos-duration="800">
                                    <h4
                                        class="font-bold tracking-wide text-blue-50 text-2xl md:text-3xl uppercase group-hover:text-warning">
                                        {{ $featuredExpedition->title }}
                                    </h4>
                                    <h5
                                        class="font-bold tracking-wide text-blue-50 text-2xl md:text-3xl uppercase group-hover:text-warning">
                                        {{ $featuredExpedition->highest_altitude }} m
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </aside>

            {{-- @if ($featuredExpeditions->count() > 4) --}}
            <aside id="multi-slide"
                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.8 } }'
                class="relative w-full md:hidden">
                <div class="carousel h-[60vh] rounded-none">
                    <div class="carousel-body h-full opacity-0">
                        <!-- Slide 1 -->
                        @foreach ($featuredExpeditions->slice(4, 10) as $featuredExpedition)
                            <div class="carousel-slide px-1 max-w-sm">
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                    <figure class="h-[60vh] max-w-sm">
                                        <img src="{{ optional($featuredExpedition->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $featuredExpedition->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-[60vh] max-w-sm object-cover" />
                                    </figure>
                                    <a
                                        href="{{ route('show_expedition', ['id' => $featuredExpedition->id, 'locale' => app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center ">
                                                <h4 class="font-bold text-blue-50 text-2xl uppercase text-balance">
                                                    {{ $featuredExpedition->title }}
                                                </h4>
                                                <h5
                                                    class="font-bold tracking-normal text-blue-50 line-clamp-2 text-2xl">
                                                    {{ $featuredExpedition->highest_altitude }} m
                                                </h5>
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
            </aside>
            {{-- @endif --}}
        </div>
        <div class="h-15 md:h-20"></div>
    </div>
@endif
