@if (!empty($recommendations) && collect($recommendations)->flatten()->isNotEmpty())
    <div class="bg-transparent">
        <div class="h-8"></div>
        <h5 class="card-title text-center" data-aos="fade-down" data-aos-duration="1200">
            <span class="uppercase font-medium text-3xl text-black rounded-full">
                REcommended
            </span>
        </h5>
        <div class="h-8"></div>
        @foreach ($recommendations as $key => $recommendationDatas)
            <div class="bg-blue-100/20 font-body">
                @if ($recommendationDatas->isNotEmpty())
                    @if ($recommendationDatas->count() === 1)
                        <div>
                            <div class=" md:gap-8 flex flex-col gap-2 bg-blue-100/10 ">
                                @foreach ($recommendationDatas as $recommendation)
                                    <div
                                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                        <figure class="h-[30rem] w-full">
                                            <img src="{{ $recommendation->coverImage }}"
                                                alt="{{ $recommendation->title }} Cover Image"
                                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                        </figure>
                                        <a href="{{ $recommendation->url }}">
                                            <div class="card-body absolute inset-0 justify-center ">
                                                <div class="text-center">
                                                    <h2 class="font-semibold text-blue-50 text-3xl uppercase group-hover:text-warning">
                                                        {{ $recommendation->title }}
                                                    </h2>
                                                    <h2
                                                        class="font-semibold tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                        {{ $recommendation->duration }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="h-2"></div>
                        </div>
                    @elseif ($recommendationDatas->count() === 2)
                        <div class="bg-blue-100/60">
                            <div class="lg:grid grid-cols-2  flex flex-col gap-2 bg-blue-100/10 ">
                                @foreach ($recommendationDatas as $recommendation)
                                    <div
                                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                        <figure class="h-[20rem] w-full">
                                            <img src="{{ $recommendation->coverImage }}"
                                                alt="{{ $recommendation->title }} Cover Image"
                                                class="transition-transform brightness-50 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                        </figure>
                                        <a href="{{ $recommendation->url }}">
                                            <div class="card-body absolute inset-0 justify-center">
                                                <div class="text-center">
                                                    <h2 class="font-semibold text-blue-50 text-2xl uppercase group-hover:text-warning">
                                                        {{ $recommendation->title }}
                                                    </h2>
                                                    <h2
                                                        class="font-semibold tracking-normal text-blue-50 line-clamp-2 text-2xl group-hover:text-warning">
                                                        {{ $recommendation->duration }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="h-2"></div>
                        </div>
                    @elseif ($recommendationDatas->count() === 3)
                        <div class="bg-blue-100/60">

                            <div class="hidden lg:grid grid-cols-3  gap-2 bg-blue-100/10 lg:">
                                @foreach ($recommendationDatas as $recommendation)
                                    <div
                                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                        <figure class="h-[20rem] w-full">
                                            <img src="{{ $recommendation->coverImage }}"
                                                alt="{{ $recommendation->title }} Cover Image"
                                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                        </figure>
                                        <a href="{{ $recommendation->url }}">
                                            <div class="card-body absolute inset-0 justify-center">
                                                <div class="text-center">
                                                    <h2 class="font-normal text-blue-50 text-2xl uppercase group-hover:text-warning">
                                                        {{ $recommendation->title }}
                                                    </h2>
                                                    <h2
                                                        class="font-normal tracking-normal text-blue-50 line-clamp-2 text-2xl group-hover:text-warning">
                                                        {{ $recommendation->duration }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div id="multi-slide"
                                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.8, "md": 2.5, "lg": 3.8 } }'
                                class="relative w-full lg:hidden">
                                <div class="carousel h-[28rem] rounded-none">
                                    <div class="carousel-body h-full opacity-0">
                                        <!-- Slide 1 -->
                                        @foreach ($recommendationDatas as $recommendation)
                                            <div class="carousel-slide px-1 max-w-sm">
                                                <div
                                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                                    <figure class="h-[28rem] max-w-sm">
                                                        <img src="{{ $recommendation->coverImage }}"
                                                            alt="{{ $recommendation->title }} Cover Image"
                                                            class="transition-transform duration-500 group-hover:scale-110 h-44 object-cover brightness-75" />
                                                    </figure>
                                                    <a href="{{ $recommendation->url }}">
                                                        <div class="card-body absolute inset-0 justify-center max-w-sm">
                                                            <div class="text-center">
                                                                <h2 class="font-semibold text-blue-50 text-2xl uppercase group-hover:text-warning">
                                                                    {{ $recommendation->title }}
                                                                </h2>
                                                                <h2
                                                                    class="font-semibold tracking-normal text-blue-50 line-clamp-2 text-2xl group-hover:text-warning">
                                                                    {{ $recommendation->duration }}
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
                            <div class="h-2"></div>
                        </div>

                        {{-- >4 --}}
                    @elseif ($recommendationDatas->count() > 3)
                        <div class="bg-blue-100/10">
                            <div id="multi-slide"
                                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true, "slidesQty": { "xs": 1.1, "sm": 1.8, "md": 2.5, "lg": 3.8 } }'
                                class="relative w-full">
                                <div class="carousel h-[28rem] rounded-none">
                                    <div class="carousel-body h-full opacity-0">
                                        <!-- Slide 1 -->
                                        @foreach ($recommendationDatas as $recommendation)
                                            <div class="carousel-slide px-1 max-w-sm">
                                                <div
                                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
                                                    <figure class="h-[28rem] max-w-sm">
                                                        <img src="{{ $recommendation->coverImage }}"
                                                            alt="{{ $recommendation->title }} Cover Image"
                                                            class="transition-transform duration-500 group-hover:scale-110 h-44 object-cover brightness-75" />
                                                    </figure>
                                                    <a href="{{ $recommendation->url }}">
                                                        <div class="card-body absolute inset-0 justify-center max-w-sm">
                                                            <div class="text-center">
                                                                <h2 class="font-semibold text-blue-50 text-2xl uppercase group-hover:text-warning">
                                                                    {{ $recommendation->title }}
                                                                </h2>
                                                                <h2
                                                                    class="font-semibold tracking-normal text-blue-50 line-clamp-2 text-2xl group-hover:text-warning">
                                                                    {{ $recommendation->duration }}
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
                                        class="hidden md:flex size-9.5 bg-base-100  items-center justify-center rounded-full shadow bg-opacity-80 ">
                                        <span
                                            class="hidden md:flex icon-[tabler--chevron-left] size-8 text-black cursor-pointer rtl:rotate-180"></span>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <!-- Next Slide -->
                                <button type="button" class="carousel-next">
                                    <span class="sr-only">Next</span>
                                    <span
                                        class=" hidden md:flex size-9.5 bg-base-100  items-center justify-center rounded-full shadow bg-opacity-80">

                                        <span
                                            class="hidden md:flex icon-[tabler--chevron-right] size-8 text-black cursor-pointer rtl:rotate-180"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="h-2"></div>
                        </div>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
    <div class="h-2"></div>
@endif
