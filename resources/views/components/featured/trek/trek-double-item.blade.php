@if ($featuredTreks->count() === 2)

    <div class="bg-blue-100/60" data-aos="fade-down" data-aos-duration="1200">
        <div class="xl:mx-32 mx-4 ">
            <div class="h-14"></div>


            <div class="hidden lg:grid grid-cols-3  gap-2 bg-blue-100/10">
                <div class="col-span-1 ">
                    <h5 class="text-3xl font-light line-clamp-2 tracking-wider text-black lg:text-right ">Trek</h5>
                    <h3 class="text-3xl tracking-wider text-accent lg:text-right ">With Sherpalaya</h3>
                    <p
                        class="text-md mt-2 text-preety text-slate-800 lg:text-right lg:text-wrap
                         first-line:uppercase first-line:font-light">
                        {{ app()->currentLocale() == 'fr' ? $landingPageSetting->trek_activity_content_fr : $landingPageSetting->trek_activity_content_en }}
                    </p>
                    <div class="h-4"></div>

                </div>

                @foreach ($featuredTreks as $featuredTrek)
                    <div
                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                        <figure class="h-[28rem] w-full">
                            <img src="{{ optional($featuredTrek->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                alt="{{ $featuredTrek->title }} Cover Image"
                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                        </figure>
                        <a href="{{ route('show_trek', ['id'=>$featuredTrek->id, 'locale'=>app()->currentLocale()]) }}">
                            <div class="card-body absolute inset-0 justify-end">
                                <div class="text-center">
                                    <h2 class="font-bold text-white text-2xl uppercase">
                                        {{ $featuredTrek->title }}
                                    </h2>
                                    <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                        {{ $featuredTrek->highest_altitude }} m
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>


            <div class="lg:hidden">
                <h5 class="text-4xl font-light line-clamp-2 tracking-wider text-black text-left ">Treks</h5>
                <h3 class="text-3xl tracking-widest text-accent text-left ">With Sherpalaya</h3>
                <p
                    class="text-md mt-2 text-preety text-slate-800 text-balance md:text-wrap
                        md:text-justify first-line:uppercase first-line:tracking-widest first-line:font-light pr-2">
                    For those seeking the ultimate challenge, Sherpalaya’s expedition services offer unparalleled
                    support and expertise. Whether it’s climbing Everest or venturing to the lesser-known peaks,
                    Sherpalaya
                    handles every detail, from permits to logistics. With our experienced Sherpa team by your side,
                    we
                    transform daunting treks into achievable milestones, ensuring a fulfilling and transformative
                    adventure.
                </p>
                <div class="h-4"></div>
                <div id="multi-slide"
                    data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.5, "md":2 } }'
                    class="relative w-full ">
                    <div class="carousel h-[28rem] rounded-none">
                        <div class="carousel-body  h-full opacity-0">
                            <!-- Slide 1 -->
                            @foreach ($featuredTreks as $featuredTrek)
                                <div class="carousel-slide">
                                    <div class="bg-base-200/50 flex h-full justify-center p-1">
                                        <span class="self-center text-lg">
                                            <div
                                                class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                                <figure class="h-[28rem] w-full">
                                                    <img src="{{ optional($featuredTrek->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                                        alt="{{ $featuredTrek->title }} Cover Image"
                                                        class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                                </figure>
                                                <a href="{{ route('show_trek', ['id'=>$featuredTrek->id, 'locale'=>app()->currentLocale()]) }}">
                                                    <div class="card-body absolute inset-0 justify-end">
                                                        <div class="text-center">
                                                            <h2 class="font-bold text-white text-2xl uppercase">
                                                                {{ $featuredTrek->title }}
                                                            </h2>
                                                            <h2
                                                                class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                                                {{ $featuredTrek->highest_altitude }} m
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
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

        </div>
        <div class="h-14"></div>
    </div>
@endif
