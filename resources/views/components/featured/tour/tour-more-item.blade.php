{{-- @if ($featuredTours->count() > 3)
    <div class="bg-blue-100/40">
        <div class="xl:mx-32 mx-4 ">
            <div class="h-10 md:h-20"></div>
            <div class="flex flex-col md:justify-center md:items-center ">
                <h4 class=" text-3xl md:text-4xl font-medium font-body line-clamp-2 uppercase tracking-normal text-black text-left md:text-center  "
                    data-aos="fade-down" data-aos-duration="1200">
                    The Fun Corner </h4>
                <p
                    class="text-lg/7 mt-4 text-black text-left md:text-center
                     font-light font-body  lg:w-[80%]">
                    {{ app()->currentLocale() == 'fr' ?$landingPageSetting->tour_activity_content_fr:$landingPageSetting->tour_activity_content_en }}
                </p>
                <div class="h-6 md:h-12"></div>
            </div>
            <div id="multi-slide"
                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.8, "md": 2.5, "lg": 3.8 } }'
                class="relative w-full">
                <div class="carousel h-[28rem] rounded-none">
                    <div class="carousel-body h-full opacity-0">
                        <!-- Slide 1 -->
                        @foreach ($featuredTours as $featuredTour)
                            <div class="carousel-slide px-1 max-w-sm">
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                    <figure class="h-[28rem] max-w-sm">
                                        <img src="{{ optional($featuredTour->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $featuredTour->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full max-w-sm object-cover" />
                                    </figure>
                                    <a href="{{ route('show_tour', ['id'=>$featuredTour->id, 'locale'=>app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center max-w-sm">
                                            <div class="text-center">
                                                <h2
                                                    class="font-normal tracking-wide text-blue-50 text-2xl uppercase group-hover:text-warning">
                                                    {{ $featuredTour->title }}
                                                </h2>
                                                <h2
                                                    class="font-normal tracking-wide text-blue-50 line-clamp-2 text-2xl group-hover:text-warning">
                                                    {{ $featuredTour->highest_altitude }}
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
                        class="size-9.5 hidden md:flex bg-base-100 bg-opacity-70  items-center justify-center rounded-full shadow">
                        <span
                            class=" icon-[tabler--chevron-left] size-6 text-black cursor-pointer rtl:rotate-180"></span>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <!-- Next Slide -->
                <button type="button" class="carousel-next">
                    <span class="sr-only">Next</span>
                    <span
                        class="size-9.5 hidden md:flex bg-base-100 bg-opacity-70  items-center justify-center rounded-full shadow">
                        <span
                            class=" icon-[tabler--chevron-right] size-6 text-black cursor-pointer rtl:rotate-180"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="h-20"></div>
    </div>
@endif --}}

@if ($featuredTours->count() > 0)
    <div class="bg-blue-100/30 font-body">
        <div class="h-20"></div>
        <div class="xl:mx-32 mx-4 ">
            <article class="flex flex-col md:justify-start md:items-start ">
                <h3 class=" text-3xl md:text-4xl font-medium font-oswald line-clamp-2 uppercase tracking-normal text-black text-left md:text-center  "
                    data-aos="fade-down" data-aos-duration="1200">
                    {{ __('featured.tours') }}
                </h3>
                <div
                    class="text-lg/7 mt-4 text-preety text-black lg:text-justify
                     font-light font-body lg:w-[70%]">
                    {{ app()->currentLocale() == 'fr' ? $landingPageSetting->tour_activity_content_fr : $landingPageSetting->tour_activity_content_en }}
                </div>
                <div class="h-6 md:h-12"></div>
            </article>
            <aside class="flex flex-col md:grid grid-cols-2 gap-2">
                @foreach ($featuredTours as $featuredTour)
                    <div
                        class="card group xl:card-side sm:max-w-full rounded-md xl:h-[50vh] shadow-sm  shadow-blue-50 ">
                        <a class="xl:w-1/2 "
                            href="{{ route('show_tour', ['id' => $featuredTour->id, 'locale' => app()->currentLocale()]) }}">
                            <figure>
                                <img src="{{ optional($featuredTour->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                    alt="{{ $featuredTour->title }} Cover Image"
                                    class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-[50vh] object-cover" />
                            </figure>
                        </a>
                        <div class="card-body xl:w-1/2 px-2 md:px-4 bg-blue-100/80  justify-center content-center">
                            <a
                                href="{{ route('show_tour', ['id' => $featuredTour->id, 'locale' => app()->currentLocale()]) }}">
                                <h4
                                    class="text-xl  text-balance line-clamp-2  tracking-wide font-body font-semibold text-black lg:text-left  uppercase group-hover:text-warning  decoration-2 decoration-warning   group-hover:underline-offset-4">
                                    {{ $featuredTour->title }}
                                </h4>
                            </a>
                            <div class=" mt-2 text-justify text-black font-body font-light text-lg/7 lg:text-base/7 line-clamp-[5] ">
                                {!! Str::words($featuredTour->description, 30) !!}
                            </div>
                            <a
                                href="{{ route('show_tour', ['id' => $featuredTour->id, 'locale' => app()->currentLocale()]) }}">
                                <button class="btn btn-primary btn-md pl-2 mt-6 text-sm hover:btn-warning">
                                    <span class="icon-[ci--chevron-right] size-4"></span>
                                    Explore
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </aside>
        </div>
        <div class="h-20"></div>
    </div>
@endif
