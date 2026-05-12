@if ($featuredTours->count() === 4)

    <div class="bg-blue-100/10" data-aos="fade-down" data-aos-duration="1200">
        <div class="xl:mx-32 mx-4 ">
            <div class="h-14"></div>

            <div class="">
                <h5 class="text-4xl font-normal line-clamp-2 uppercase tracking-wider text-black text-center ">The Fun Corner</h5>
                <p
                    class="text-md mt-4 text-preety text-slate-800 break-all first-line:uppercase first-line:font-light">
                        {{ app()->currentLocale() == 'fr' ?$landingPageSetting->tour_activity_content_fr:$landingPageSetting->tour_activity_content_en }}
                </p>
            </div>

            <div class="h-4"></div>

            <div class="hidden lg:grid grid-cols-4  gap-2 bg-blue-100/10" data-aos="fade-down" data-aos-duration="1200">
                @foreach ($featuredTours as $featuredTour)
                    <div
                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                        <figure class="h-[28rem] w-full">
                            <img src="{{ optional($featuredTour->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                alt="{{ $featuredTour->title }} Cover Image"
                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                        </figure>
                        <a href="{{ route('show_tour', ['id'=>$featuredTour->id, 'locale'=>app()->currentLocale()]) }}">
                            <div class="card-body absolute inset-0 justify-end">
                                <div class="text-center">
                                    <h2 class="font-bold text-white text-2xl uppercase">
                                        {{ $featuredTour->title }}
                                    </h2>
                                    <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                        {{ $featuredTour->highest_altitude }}
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div id="multi-slide"
                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.5, "md":2.5 } }'
                class="relative w-full lg:hidden mt-4">
                <div class="carousel h-[28rem] rounded-none">
                    <div class="carousel-body  h-full opacity-0" data-aos="fade-down" data-aos-duration="1200">
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
                                        <div class="card-body absolute inset-0 justify-end">
                                            <div class="text-center">
                                                <h2 class="font-bold text-white text-2xl uppercase">
                                                    {{ $featuredTour->title }}
                                                </h2>
                                                <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                    {{ $featuredTour->highest_altitude }} m
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
                    <span class="size-9.5 bg-base-100 hidden items-center justify-center rounded-full shadow">
                        <span class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <!-- Next Slide -->
                <button type="button" class="carousel-next">
                    <span class="sr-only">Next</span>
                    <span class="size-9.5 bg-base-100 hidden items-center justify-center rounded-full shadow">
                        <span class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="h-14"></div>
    </div>
@endif
