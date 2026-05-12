<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <header class="card--rounded-none image-full  h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$aboutUsSetting->cover_image_id" fallback="default"
                    loading="lazy" alt="Contact Us Imange"/>
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $aboutUsSetting->title_up_fr : $aboutUsSetting->title_up_en }}
                    </h2>
                    <h1
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100">
                        {{ app()->currentLocale() == 'fr' ? $aboutUsSetting->main_title_fr : $aboutUsSetting->main_title_en }}
                    </h1>
                    <h3
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        {{ app()->currentLocale() == 'fr' ? $aboutUsSetting->title_down_fr : $aboutUsSetting->title_down_en }}
                    </h3>
                </div>
            </div>
        </header>
        <div class="bg-blue-100/20 font-oswald">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/' . app()->currentLocale() . '/home'),
                ],
                [
                    'name' => 'About Us',
                ],
            ]" />

            <article class="xl:mx-32 mx-4 ">
                <div class="h-8"></div>
                <div class="flex flex-col lg:justify-start lg:items-start">
                    <h4 class="text-3xl  font-body  font-medium uppercase tracking-normal text-black text-balance "
                        data-aos="fade-up" data-aos-duration="1200">
                        {{ app()->currentLocale() == 'fr' ? $aboutUsSetting->content_title_fr : $aboutUsSetting->content_title_en }}
                    </h4>
                    <div
                        class="text-lg/7 mt-4 text-justify text-black 
                     font-light font-body lg:w-[70%]">
                        {!! app()->currentLocale() == 'fr' ? $aboutUsSetting->content_fr : $aboutUsSetting->content_en !!}
                    </div>
                    <div class="h-10 md:h-12"></div>
                </div>
            </article>
        </div>



        {{-- Showing <strong>{{ $expeditionRegion->expeditions->count() }}</strong> --}}


        <section class=" bg-blue-100/20">
            <div class="h-10"></div>
            <div class="xl:mx-32 mx-4">
                <h4 class="text-3xl  font-body  uppercase tracking-normal text-black font-medium text-balance "
                    data-aos="flip-up" data-aos-duration="800">
                    {{ __('aboutpage.legal') }}
                </h4>
                <div class="h-8">
                </div>
                <div id="about-us-certificates"
                    class="flex flex-col sm:grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1  skeleton animate-pulse">
                    @foreach ($aboutUsSetting->certificate_images as $galleryImage)
                        <button
                            class="card cursor-pointer rounded-lg image-fullw-full relative items-end  card-side group hover:shadow border single-service hidden"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="about-us-certificates-modal"
                            data-overlay="#about-us-certificates-modal"
                            onclick="changeCarouselSlide({{ $loop->index }})">
                            <figure class="h-full w-full brightness-75 rounded-lg">
                                <x-curator-glider class="h-[30vh] w-full object-cover brightness-75" :media="$galleryImage"
                                    :fallback="asset('/photos/banner.jpg')" loading="lazy" />
                            </figure>
                        </button>
                    @endforeach
                </div>
                <div class="h-4"></div>
                <p class="text-blue-600 italic tracking-wider font-normal text-sm">
                    {{ __('aboutpage.notice') }}
                </p>
            </div>
            <div class="h-10"></div>
        </section>

        <section class="bg-blue-100/5">
            <div class="h-10"></div>
            <div class="xl:mx-32 mx-4">
                <h4 class="text-3xl  tracking-normal font-body  text-left line-clamp-2 text-black font-medium uppercase"
                    data-aos="fade-down" data-aos-duration="1200">
                    {{ __('aboutpage.faq') }}
                </h4>
                <div class="h-8"></div>
                <div class="accordion accordion-shadow shadow-md font-body" data-accordion-always-open="">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item" id="faq-{{ $faq->id }}">
                            <button
                                class="accordion-toggle inline-flex items-center gap-x-4 px-5 py-4 text-start bg-blue-100/40 font-body tracking-tight text-xl font-normal"
                                aria-controls="faq-{{ $faq->id }}-collapse" aria-expanded="false">
                                <span
                                    class="icon-[tabler--plus] accordion-item-active:hidden text-base-content size-4.5 block shrink-0"></span>
                                <span
                                    class="icon-[tabler--minus] accordion-item-active:block text-lg size-4.5 hidden shrink-0"></span>
                                {{ $faq->question }}
                            </button>
                            <div id="faq-{{ $faq->id }}-collapse"
                                class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300 bg-blue-100/40"
                                aria-labelledby="faq-{{ $faq->id }}" role="region">
                                <div class="px-5 pb-4 ">
                                    <div class=" font-light text-lg/7 tracking-wide">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="h-10"></div>
        </section>

        <x-stat-widget />

        <x-review />
        <x-whatsapp-icon />
    </div>


    @push('modals')
        <div id="about-us-certificates-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog"
            tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw] ">
                <div class="modal-content h-full max-h-[100vh] justify-center  bg-transparent backdrop-blur-sm">
                    <div class="modal-header">
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                            aria-label="Close" data-overlay="#about-us-certificates-modal">
                            <span class="icon-[tabler--x] size-6 p-0 m-0"></span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        {{-- <x-gallery :medias="$aboutUsSetting->certificate_images" :showMedia="null" /> --}}
                        {{-- $aboutUsSetting->certificate_images --}}

                        <div id="image-carousel" data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true }'
                            class="relative w-full">
                            <div class="carousel">
                                <div class="carousel-body h-full opacity-0">
                                    <!-- Slide 1 -->
                                    @foreach ($aboutUsSetting->certificate_images as $certificateImage)
                                        <div class="carousel-slide">
                                            <div class="flex h-full justify-center ">
                                                <x-curator-glider :media="$certificateImage" class="h-[90vh] w-full object-contain  "
                                                    alt="certificate" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Previous Slide -->
                            <button type="button" class="carousel-prev">
                                <span
                                    class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
                                    <span class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
                                </span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <!-- Next Slide -->
                            <button type="button" class="carousel-next">
                                <span class="sr-only">Next</span>
                                <span
                                    class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
                                    <span class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
                                </span>
                            </button>
                        </div>
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
                const allServicesDiv = document.querySelector('#about-us-certificates');
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
