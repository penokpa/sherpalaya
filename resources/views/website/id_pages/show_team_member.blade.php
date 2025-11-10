<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <div class="card--rounded-none image-full   h-[60vh]">
            <figure class="h-[60vh] w-full">
                <img src="{{ asset('/photos/mountain2.jpg') }}" alt="Trekking background image"
                    class="h-[60vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body absolute bottom-1/2 xl:left-28 left-0 flex flex-row items-center gap-4">
                <div class="overflow-hidden border-none " data-aos="fade-down" data-aos-duration="1200">
                    <figure class="w-full ">
                        <img class="h-28 lg:h-52 object-cover rounded-full" src="{{ $sherpa->profilePicture->url }}"
                            alt="picture" />
                    </figure>
                </div>
                <div class="" data-aos="fade-down" data-aos-duration="1200">
                    <h5 class=" card-title mb-1 text-warning text-xl md:text-2xl lowercase font-oswald font-normal ">
                        {{ $sherpa->title }}
                    </h5>
                    <h5 class=" card-title  text-white text-2xl md:text-4xl uppercase font-normal ">
                        {{ $sherpa->name }}
                    </h5>
                </div>
            </div>
        </div>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/home'),
            ],
            [
                'name' => 'Our Sherpas',
                'url' => url('/sherpas'),
            ],
            [
                'name' => $sherpa->name,
            ],
        ]" />


        <div class="mx-4 2xl:mx-32">
            <div class="h-4"></div>
            <p class="my-1  text-pretty text-stone-700 text-center font-body text-xl/7">
                {{ $sherpa->description }}
            </p>
            <div class="h-8"></div>
            <h5 class="card-title font-normal uppercase text-4xl text-black tracking-wide mx-0 text-center"
                data-aos="fade-down" data-aos-duration="1200">
                Experience
            </h5>
            <div class="card-body w-full px-0 pt-2 flex justify-center items-center mb-4">
                @php
                    $sherpaExperienceData = [
                        'treks' => $sherpa->treks->pluck('title'),
                        'expeditions' => $sherpa->expeditions->pluck('title'),
                        'tours' => $sherpa->tours->pluck('title'),
                    ];
                @endphp
                <div class="text-preety overflow-hidden text-center md:w-[70%] my-2">
                    @foreach ($sherpaExperienceData as $category => $experiences)
                        @foreach ($experiences as $experience)
                            <span
                                class="badge badge-primary badge-outline  mx-1 my-1 py-4 text-nowrap tracking-wider text-preety text-xl font-light ">
                                {{ $experience }}
                            </span>
                        @endforeach
                    @endforeach
                </div>
                <div class="h-8"></div>
            </div>
            <div class="w-full col-span-2">
                @if ($sherpa->awardsAndCertificates->count() > 0)
                    <h5 class="card-title font-normal uppercase text-4xl text-black tracking-normal mx-0 text-center"
                        data-aos="fade-down" data-aos-duration="1200">
                        Awards & Certificates
                    </h5>
                    <div class="h-8"></div>
                    <div class="card-actions  sm:grid grid-cols-2 lg:grid-cols-3 flex flex-col gap-2 md:gap-4 mb-0 skeleton animate-pulse min-h-52"
                        id="all-awards">
                        @foreach ($sherpa->awardsAndCertificates as $awardAndCertificate)
                            <button type="button"
                                class="w-full h-full uppercase single-award hidden group hover:shadow"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="award-modal"
                                data-overlay="#award-modal" onclick="changeCarouselSlide({{ $loop->index }})">
                                <img class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105 brightness-90"
                                    src="{{ $awardAndCertificate->url }}" alt="headphone" />
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>





        <div class="h-20"></div>




        @push('modals')
            <div id="award-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog" tabindex="-1">
                <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw] ">
                    <div class="modal-content h-full max-h-[100vh] justify-center  bg-transparent backdrop-blur-lg">
                        <div class="modal-header">
                            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                                aria-label="Close" data-overlay="#award-modal">
                                <span class="icon-[tabler--x] size-6 p-0 m-0 text-warning"></span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div id="image-carousel"
                                data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true }'
                                class="relative w-full">
                                <div class="carousel">
                                    <div class="carousel-body h-full opacity-0">
                                        <!-- Slide 1 -->
                                        @foreach ($sherpa->awardsAndCertificates as $award)
                                            <div class="carousel-slide">
                                                <div class="flex h-full justify-center ">
                                                    <img src="{{ $award->url }}" class="h-[90vh] w-full object-contain  "
                                                        alt="game" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Previous Slide -->
                                <button type="button" class="carousel-prev">
                                    <span
                                        class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
                                        <span
                                            class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <!-- Next Slide -->
                                <button type="button" class="carousel-next">
                                    <span class="sr-only">Next</span>
                                    <span
                                        class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
                                        <span
                                            class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-soft btn-secondary"
                                    data-overlay="#award-modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endpush

        @push('scripts')
            <script>
                window.addEventListener('load', function() {
                    const awardsAndCertificatesDiv = document.querySelector('#all-awards');
                    const singleAwardCollection = document.querySelectorAll('.single-award');
                    awardsAndCertificatesDiv.classList.remove('skeleton');
                    awardsAndCertificatesDiv.classList.remove('animate-pulse');

                    singleAwardCollection.forEach(singleAward => {
                        singleAward.classList.remove('hidden');
                    });
                });

                function changeCarouselSlide(index) {
                    const carousel = new HSCarousel(document.querySelector('#image-carousel'))
                    carousel.goTo(index)
                }
            </script>
        @endpush

    </div>
</x-website-layout>
