{{-- <script defer>
    let isReadMoreShown = false;

    function toggleReadMore() {
        let shortTrekDescription = document.getElementById("short-service-description");
        if (isReadMoreShown) {
            shortTrekDescription.classList.remove("hidden");
        } else {
            shortTrekDescription.classList.add("hidden");
        }
        isReadMoreShown = !isReadMoreShown;
    }
</script> --}}

<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        {{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[80vh]">
            <figure class="h-[80vh] w-full">
                <img src="{{ $service->coverImage?->url ?? '/photos/banner.jpg' }}" alt="Trekking background image"
                    class="h-[80vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start font-oswald">
                <div class="absolute bottom-1/4 left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap md:w-[70%] leading-[1.3]  overflow-hidden opacity-75">
                        {{ ' ' . $service->title }} 
                    </h2>
                </div>
            </div>
        </div> --}}

        <div class="card--rounded-none image-full bg-blue-100/50 h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <img src="{{ $service->coverImage?->url ?? '/photos/banner.jpg' }}" alt="Trekking background image"
                    class="h-[80vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start font-oswald">
                <div class="absolute bottom-1/4 left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-white text-4xl sm:text-5xl lg:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap md:w-[70%] leading-[1.3]  overflow-hidden opacity-75">
                        {{ $service->title }}

                    </h2>
                </div>
            </div>
        </div>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/home'),
            ],
            [
                'name' => 'Service',
                'url' => url('/services'),
            ],
            [
                'name' => $service->title,
            ],
        ]" />

        <x-booking.mobile-booking-section :bookingFor="$service" />


        <div class="mx-4 2xl:mx-32 mt-4">
            {{-- description  --}}

            <div class="card sm:w-full md:px-8 shadow-sm shadow-slate-300 bg-blue-50/10">
                <div class="card-body text-center text-black px-2 tracking-wide font-light text-lg/7 font-body">
                    <p>
                        {{ $service->description }}
                    </p>
                </div>
            </div>


            <div class="h-10"></div>
            <div class="flex flex-col md:grid md:grid-cols-2 xl:grid-cols-3 gap-4">
                <div class="col-span-2">
                    <div class="bg-blue-100/5">
                        @if (!empty($service->destinations))
                            <div class="card 2xl:max-w-full rounded-none bg-transparent ">

                                <div class="card-header  pb-4  px-2" data-aos="fade-down" data-aos-duration="1200">
                                    <h5
                                        class="card-title  text-center uppercase text-3xl text-black font-semibold tracking-tight">
                                        Service Station
                                    </h5>
                                </div>
                                <div class="h-4"></div>
                                <div class="sm:grid sm:grid-cols-2 md:grid-cols-2 flex flex-col gap-2 w-full md:px-2">
                                    @foreach ($service->destinations as $destination)
                                        <div class="card w-full bg-blue-100/30 at-a-glimpse my-2 ">
                                            {{-- @if (!empty($destination->destinationImages) && $destination->destinationImages->isNotEmpty()) --}}
                                            <div>
                                                <div id="limited-destiinations-images"
                                                    data-carousel='{ "loadingClasses": "opacity-0", "isInfiniteLoop": true, "slidesQty": 1 }'
                                                    class="relative w-full">
                                                    <div class="carousel h-44 rounded-none rounded-t-md">
                                                        <div class="carousel-body h-full opacity-0">
                                                            @foreach ($destination->destinationImages as $destinationImage)
                                                                <div class="carousel-slide">
                                                                    <div
                                                                        class="bg-base-200/50 flex h-full justify-center">
                                                                        <span class="self-start w-full">
                                                                            <figure>
                                                                                <img src="{{ $destinationImage?->url ?? asset('/photos/banner.jpg') }}"
                                                                                    alt="{{ $destination->name }} Cover Image"
                                                                                    class="h-44 object-cover brightness-75" />
                                                                            </figure>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- Previous and Next buttons -->
                                                    <div
                                                        class="carousel-info absolute bottom-3 start-[88%] inline-flex -translate-x-[50%] justify-center rounded-lg text-white px-3">
                                                        <span class="carousel-info-current me-0">0</span>
                                                        /
                                                        <span class="carousel-info-total ms-0">0</span>
                                                        <button type="button" class="carousel-prev">
                                                            <span
                                                                class="size-9.5 text-white flex items-center justify-center rounded-full shadow">
                                                                <span
                                                                    class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                                                            </span>
                                                            <span class="sr-only">Previous</span>
                                                        </button>
                                                        <button type="button" class="carousel-next">
                                                            <span class="sr-only">Next</span>
                                                            <span
                                                                class="size-9.5 text-white flex items-center justify-center rounded-full shadow ">
                                                                <span
                                                                    class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180 "></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @endif --}}

                                            <div class="card-body px-2 pt-2 bg-transparent">
                                                <h5 class="card-title mb-1 line-clamp-2 uppercase text-lg text-black  ">
                                                    {{ $destination->name }}
                                                </h5>

                                                <div class="justify-start flex flex-col items-start gap-2">
                                                    <p
                                                        class="text-black uppercase items-center badge tracking-wider badge-warning  px-1 py-0 text-xs">
                                                        {{ $destination->region->name }} Region
                                                    </p>
                                                    <p class="text-black tracking-wide font-body text-lg/6 font-light">
                                                        {{ Str::words($destination->description, 50) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="h-6">

                                </div>
                            </div>
                        @endif
                    </div>

                    <x-show-service.service-gallery :service="$service" />
                </div>

                <div class="w-full hidden xl:block">
                    <div class="sticky top-32">
                        <x-booking.booking-section :bookingFor="$service" />
                    </div>
                </div>
            </div>
            <x-show-recommendation :recommendFor="$service" />
            <div class="h-10"></div>
        </div>
    </div>
</x-website-layout>
