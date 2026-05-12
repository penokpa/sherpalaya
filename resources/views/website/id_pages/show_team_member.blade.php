{{-- <div class="card--rounded-none image-full h-[80dvh] relative ">
            <figure class="h-[80dvh] w-full ">
                <img src="{{ asset('/photos/mountain2.jpg') }}" alt="Trekking background image"
                    class="h-[80dvh] w-full object-cover brightness-75" />
            </figure>
            <div
                class="card-body absolute bottom-1/4 left-[50%]  translate-x-[-50%] translate-y-[10%] flex flex-col items-center gap-8 ">
                <div class="overflow-hidden  justify-center" data-aos="fade-down" data-aos-duration="1200">
                    <img class="h-[28vh] w-full object-cover rounded-full" src="{{ $sherpa->profilePicture->url }}"
                        alt="picture" />
                </div>
                <div class="text-center w-full font-oswald" data-aos="fade-down" data-aos-duration="1200">
                    <h5 class="card-title mb-1 text-warning  text-2xl md:text-2xl uppercase font-semibold ">
                        {{ $sherpa->name }}
                    </h5>
                    <h5 class="card-title text-white text-sm md:text-xl lowercase font-oswald font-semisemibold ">
                        {{ $sherpa->title }}
                    </h5>
                </div>
            </div>
        </div> --}}


<x-website-layout :seoData="$seoData">
    <div class="bg-blue-50 font-body">
        <header>
            <div style="background-image: url('{{ asset('/photos/qualitymount1.png') }}');"
                class="bg-cover bg-center w-full  object-top font-body ">
                <div class="card-body flex flex-col items-center justify-center gap-8 backdrop-blur-md h-[80dvh]">
                    <div class="overflow-hidden  justify-center" data-aos="fade-down" data-aos-duration="1200">
                        <img class="h-[28vh] w-[30vw] object-cover object-center rounded-2xl border-white border-4"
                            src="{{ $sherpa->profilePicture->url }}" alt="picture" />
                    </div>
                    <div class="text-center w-full font-card" data-aos="fade-down" data-aos-duration="1200">
                        <h1
                            class="card-title mb-1 text-warning  tracking-wider text-2xl md:text-2xl uppercase font-semibold text-balance">
                            {{ $sherpa->name }}
                        </h1>
                        <h2
                            class="card-title text-white text-sm md:text-xl capitalize  font-normal tracking-wide text-balance">
                            {{ $sherpa->title }}
                        </h2>
                    </div>
                </div>
            </div>
        </header>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/' . app()->currentLocale() . '/home'),
            ],
            [
                'name' => 'Our Team',
                'url' => url('/' . app()->currentLocale() . '/our-team'),
            ],
            [
                'name' => $sherpa->name,
            ],
        ]" />


        <section class="mx-4 xl:mx-32">
            <div class="h-4"></div>
            <div
                class="text-lg/8 mt-6 text-justify text-black  md:mx-8 lg:mx-16  xl:mx-28
                         font-light font-body tracking-normal ">
                {!! $sherpa->description !!}
            </div>
            <div class="h-10"></div>
        </section>

        <section class="bg-blue-100/20">
            <div class="mx-4 xl:mx-32">
                @if (count($sherpa->language) > 0)
                    <article class="md:mx-8 lg:mx-16 xl:mx-28 ">
                        <div class="h-10"></div>
                        <div class="">
                            <h3 class="card-title font-semibold uppercase text-2xl text-black tracking-wide mx-0 text-left"
                                data-aos="fade-up" data-aos-duration="1200">
                                {{ __('team.languages') }}
                            </h3>
                            <div class="h-4"></div>
                            @foreach ($sherpa->language as $lang)
                                <p class="text-black uppercase items-center badge badge-warning  px-1 py-0 text-xs">
                                    {{ $lang }}
                                </p>
                            @endforeach
                        </div>
                        <div class="h-10"></div>
                    </article>
                @endif
            </div>
        </section>
        {{-- <div class="my-1 text-pretty text-black font-light font-body text-lg/7">
                {!! $sherpa->description !!}
            </div> --}}

        <main class="bg-blue-100/10">
            <div class="mx-4 xl:mx-32">
                @if (count($sherpa->expeditions) > 0)
                    <div class="h-10"></div>
                    <h3 class="card-title font-semibold uppercase text-2xl  text-black tracking-wide mx-0 text-left md:mx-8 lg:mx-16 xl:mx-28"
                        data-aos="fade-down" data-aos-duration="1200">
                        {{ __('footer.expeditions') }}
                    </h3>
                    <div class="h-4"></div>
                    <div class="overflow-x-scroll horizontal-scrollbar md:mx-8 lg:mx-16 xl:mx-28">
                        <table class="table-striped-columns table font-body ">
                            <thead>
                                <tr class="text-2xl ">
                                    <th>{{ __('team.exped-table') }}</th>
                                    <th>{{ __('team.altitude') }}</th>
                                    <th>{{ __('team.count') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sherpa->expeditions as $expedition)
                                    <tr class="font-light">
                                        <td class="text-nowrap">{{ $expedition->title }}</td>
                                        <td>{{ $expedition->highest_altitude }} M</td>
                                        <td>
                                            <span class="badge badge-soft badge-success text-xs">
                                                {{ $expedition->pivot?->count ?? '1' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="h-10"></div>
                @endif
            </div>
        </main>
        <main class="bg-blue-100/10">
            <div class="mx-4 xl:mx-32">
                @if (count($sherpa->treks) > 0)
                    <div class="h-10"></div>
                    <h3 class="card-title font-semibold uppercase text-2xl  text-black tracking-wide mx-0 text-left md:mx-8 lg:mx-16 xl:mx-28"
                        data-aos="fade-down" data-aos-duration="1200">
                        {{ __('footer.treks') }}
                    </h3>
                    <div class="h-4"></div>
                    <div class="md:mx-8 lg:mx-16 xl:mx-28">
                        <table class="table-striped-columns table font-body">
                            <thead>
                                <tr class="text-2xl">
                                    <th>{{ __('team.trek-table') }}</th>
                                    <th>{{ __('team.altitude') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sherpa->treks as $trek)
                                    <tr class="font-light">
                                        <td class="text-nowrap">{{ $trek->title }}</td>
                                        <td>{{ $trek->highest_altitude }} M</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="h-10"></div>
                @endif
            </div>
        </main>
        <main class="bg-blue-100/10">
            <div class="mx-4 xl:mx-32">
                @if (count($sherpa->tours) > 0)
                    <div class="h-10"></div>

                    <h3 class="card-title font-semibold uppercase text-2xl  text-black tracking-wide mx-0 text-left md:mx-8 lg:mx-16 xl:mx-28"
                        data-aos="fade-down" data-aos-duration="1200">
                        {{ __('footer.activities') }}
                    </h3>
                    <div class="h-4"></div>

                    <div class="md:mx-8 lg:mx-16 xl:mx-28">
                        <table class="table-striped-columns table font-body">
                            <thead>
                                <tr class="text-2xl">
                                    <th>{{ __('team.activity-table') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sherpa->tours as $tour)
                                    <tr class="font-light">
                                        <td class="text-nowrap">{{ $tour->title }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="h-10"></div>
                @endif
            </div>
        </main>


        {{-- $sherpa->experience  --}}

        <section class="bg-blue-100/20">
            <div class="mx-4 xl:mx-32">
                @if (count($sherpa->experience) > 0)
                    <div class="h-10"></div>

                    <div class=" md:mx-8 lg:mx-16  xl:mx-28">
                        <div class="mx-2">
                            <h4 class="card-title font-semibold uppercase text-2xl  text-black tracking-wide mx-0 text-left "
                                data-aos="fade-down" data-aos-duration="1200">
                                {{ __('team.experiences') }}
                            </h4>
                            <div class="h-4"></div>
                            <ul class="list-inside list-disc tracking-wide">
                                @foreach ($sherpa->experience as $exp)
                                    <li class="mb-2 tracking-wide font-light">{{ $exp }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="h-10"></div>
                @endif
            </div>
        </section>

        <section class="bg-blue-100/10">
            <div class="mx-4 xl:mx-32">
                <div class="col-span-2 md:mx-8 lg:mx-16 xl:mx-28">
                    <div class="h-10"></div>

                    @if ($sherpa->awardsAndCertificates->count() > 0)
                        <h5 class="card-title font-bold uppercase text-2xl text-black tracking-normal mx-0 text-left"
                            data-aos="fade-up" data-aos-duration="1200">
                            {{ __('team.awards') }}
                        </h5>
                        <div class="h-10"></div>
                        <div class="card-actions   sm:grid grid-cols-2 lg:grid-cols-3 flex flex-col gap-2 md:gap-4 mb-0 skeleton animate-pulse min-h-52"
                            id="all-awards">
                            @foreach ($sherpa->awardsAndCertificates as $awardAndCertificate)
                                <button type="button"
                                    class="w-full h-full uppercase single-award hidden group hover:shadow"
                                    aria-haspopup="dialog" aria-expanded="false" aria-controls="award-modal"
                                    data-overlay="#award-modal" onclick="changeCarouselSlide({{ $loop->index }})">
                                    <img class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105 brightness-75"
                                        src="{{ $awardAndCertificate->url }}" alt="Award And Certificate" loading="lazy"/>
                                </button>
                            @endforeach
                        </div>
                    @endif
                    <div class="h-10"></div>

                </div>
            </div>
        </section>


        <div class="h-10"></div>
        <x-whatsapp-icon />


        @push('modals')
            <div id="award-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog"
                tabindex="-1">
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
                                                    <img src="{{ $award->url }}"
                                                        class="h-[90vh] w-full object-contain  " alt="game" />
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
