<x-website-layout>
    <div class="bg-blue-100/10 font-oswald">
        <div class="card--rounded-none image-full  h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <x-curator-glider class="h-[80vh] w-full object-cover brightness-50" :media="$aboutUsSetting->cover_image_id" :fallback="asset('/photos/banner.jpg')"
                    loading="lazy" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        {{__('aboutpage.title-up')}}
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        {{__('aboutpage.title-main')}}
                     </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        {{__('aboutpage.title-down')}}
                    </h5>
                </div>
            </div>
        </div>
        <div class="bg-blue-100/20 font-oswald">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/home'),
                ],
                [
                    'name' => 'AboutUs',
                ],
            ]" />

            <div class="2xl:mx-32 mx-4 ">
                <div class="h-8"></div>
                <div class="lg:px-8 flex flex-col lg:justify-center lg:items-center">
                    <h5 class="text-3xl md:text-4xl font-body  font-medium uppercase tracking-normal text-black text-left lg:text-center"
                        data-aos="fade-down" data-aos-duration="1200">
                        {{__('aboutpage.heading')}}
                    </h5>
                    <div
                        class="text-xl/7 mt-6 text-preety text-black text-left lg:text-center
                             font-light font-body lg:w-[80%] tracking-wide">
                        {!! $aboutUsSetting->content !!}
                    </div>
                    <div class="h-10 md:h-12"></div>
                </div>
            </div>
        </div>

        <x-stat-widget />


        {{-- Showing <strong>{{ $expeditionRegion->expeditions->count() }}</strong> --}}
        <div class="2xl:mx-32 mx-4">
            <div class="h-10"></div>
            <div class="bg-blue-100/5">
                <div class="card-header   px-0">
                    <h5 class="text-3xl md:text-4xl font-body  uppercase tracking-normal text-black font-medium text-left "
                        data-aos="flip-up" data-aos-duration="800">
                        {{__('aboutpage.legal')}}
                    </h5>
                    <div class="h-8">
                    </div>
                    <div id="all-services" class="flex flex-col sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-1  skeleton animate-pulse">
                        @foreach ($aboutUsSetting->certificate_images as $galleryImage)
                            <button
                                class="card cursor-pointer rounded-none image-fullw-full relative items-end  card-side group hover:shadow border single-service hidden"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="service-gallery-modal"
                                data-overlay="#service-gallery-modal" onclick="changeCarouselSlide({{ $loop->index }})">
                                <figure class="h-full w-full brightness-90">
                                    <x-curator-glider class="h-[40vh] w-full object-cover brightness-50"
                                        :media="$galleryImage" :fallback="asset('/photos/banner.jpg')" loading="lazy" />
                                </figure>
                            </button>
                        @endforeach
                    </div>
                    <div class="h-10"></div>
                    <p class="text-warning italic tracking-wider font-normal text-sm">
                        {{__('aboutpage.notice')}}

                    </p>

                </div>
            </div>




            <div class="h-10"></div>
            <h1 class="text-3xl md:text-4xl tracking-normal font-body  text-left line-clamp-2 text-black font-medium uppercase"
                data-aos="fade-down" data-aos-duration="1200">
                {{__('aboutpage.faq')}}
            </h1>
            <div class="h-8"></div>
            <div class="accordion accordion-shadow shadow-md font-body">
                @foreach ($faqs as $index => $faq)
                    <div class="accordion-item {{ $index == 0 ? 'active' : '' }}" id="faq-{{ $faq->id }}">
                        <button
                            class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start bg-blue-100/40 font-body tracking-tight text-xl font-normal"
                            aria-controls="faq-{{ $faq->id }}-collapse" aria-expanded="true">
                            <span
                                class="icon-[tabler--plus] accordion-item-active:hidden text-base-content size-4.5 block shrink-0"></span>
                            <span
                                class="icon-[tabler--minus] accordion-item-active:block text-lg size-4.5 hidden shrink-0"></span>
                            {{ $faq->question }}
                        </button>
                        <div id="faq-{{ $faq->id }}-collapse"
                            class="accordion-content w-full overflow-hidden transition-[height] duration-300 bg-blue-100/40"
                            aria-labelledby="faq-{{ $faq->id }}" role="region">
                            <div class="px-5 pb-4 ">
                                <p class=" font-light text-lg/7 tracking-wide">
                                    {{ $faq->answer }}
                                    {!! $faq->answer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="h-10"></div>
        </div>

        <x-review />
    </div>


    @push('modals')
        <div id="service-gallery-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw] ">
                <div class="modal-content h-full max-h-[100vh] justify-center  bg-transparent backdrop-blur-sm">
                    <div class="modal-header">
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#service-gallery-modal">
                            <span class="icon-[tabler--x] size-6 p-0 m-0"></span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        {{-- <x-gallery :medias="$aboutUsSetting->certificate_images" :showMedia="null" /> --}}
                        {{-- $aboutUsSetting->certificate_images --}}
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endpush


    @push('scripts')
        <script>
            window.addEventListener('load', function() {
                const allServicesDiv = document.querySelector('#all-services');
                const singleServiceCollection = document.querySelectorAll('.single-service');
                allServicesDiv.classList.remove('skeleton');
                allServicesDiv.classList.remove('animate-pulse');

                singleServiceCollection.forEach(singleAward => {
                    singleAward.classList.remove('hidden');
                });
            });

            function changeCarouselSlide(index) {
                const carousel = new HSCarousel(document.querySelector('#image-carousel'))
                carousel.goTo(index)
            }
        </script>
    @endpush
</x-website-layout>
