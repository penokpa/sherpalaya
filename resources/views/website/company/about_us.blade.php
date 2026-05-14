@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $aboutUsSetting->cover_image_id ? Media::find($aboutUsSetting->cover_image_id) : null;
    $heroEyebrow = $locale === 'fr' ? $aboutUsSetting->title_up_fr : $aboutUsSetting->title_up_en;
    $heroTitle = $locale === 'fr' ? $aboutUsSetting->main_title_fr : $aboutUsSetting->main_title_en;
    $heroSubtitle = $locale === 'fr' ? $aboutUsSetting->title_down_fr : $aboutUsSetting->title_down_en;
    $contentTitle = $locale === 'fr' ? $aboutUsSetting->content_title_fr : $aboutUsSetting->content_title_en;
    $content = $locale === 'fr' ? $aboutUsSetting->content_fr : $aboutUsSetting->content_en;
    $certificates = $aboutUsSetting->certificate_images ?? [];
@endphp

<x-website-layout>
    <x-listing.hero
        :image="$heroImage"
        :eyebrow="$heroEyebrow ?: 'About Sherpalaya'"
        :title="$heroTitle ?: 'About Us'"
        :subtitle="$heroSubtitle"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => 'About Us'],
    ]" />

    {{-- Brand story --}}
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:py-24 lg:px-12">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                <div class="lg:col-span-1">
                    @if ($contentTitle)
                        <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                            {{ $contentTitle }}
                        </h2>
                    @endif
                </div>
                <div class="lg:col-span-2">
                    @if ($content)
                        <div class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans">
                            {!! $content !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Founders --}}
    <x-home-page.founders />

    {{-- Certificates --}}
    @if (!empty($certificates) && count($certificates) > 0)
        <section class="bg-forest text-canvas">
            <div class="mx-auto max-w-7xl px-6 py-16 lg:py-24 lg:px-12">
                <div class="mb-10">
                    <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">{{ __('aboutpage.legal') }}</p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-canvas max-w-[28ch]">
                        Recognized · registered · accredited.
                    </h2>
                </div>

                <div id="about-us-certificates"
                     class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 skeleton animate-pulse">
                    @foreach ($certificates as $i => $certificateImage)
                        <button type="button"
                                class="single-service hidden aspect-[3/4] overflow-hidden rounded-lg bg-canvas/5 ring-1 ring-canvas/15 hover:ring-canvas/40 transition group"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="about-us-certificates-modal"
                                data-overlay="#about-us-certificates-modal"
                                onclick="changeCarouselSlide({{ $i }})">
                            <x-curator-glider class="h-full w-full object-cover transition group-hover:scale-105"
                                              :media="$certificateImage"
                                              :fallback="asset('/photos/banner.jpg')" loading="lazy" />
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- FAQs --}}
    @if (!empty($faqs) && count($faqs) > 0)
        <section class="bg-canvas">
            <div class="mx-auto max-w-4xl px-6 py-16 lg:py-24 lg:px-12">
                <div class="mb-10 text-center">
                    <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">Common questions</p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                        {{ __('aboutpage.faq') }}
                    </h2>
                </div>

                <div class="accordion divide-y divide-hairline border-y border-hairline" data-accordion-always-open="">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item" id="faq-{{ $faq->id }}">
                            <button class="accordion-toggle w-full inline-flex items-center justify-between gap-4 py-5 text-left text-[17px] font-medium text-ink hover:text-forest transition"
                                    aria-controls="faq-{{ $faq->id }}-collapse" aria-expanded="false">
                                <span>{{ $faq->question }}</span>
                                <span class="icon-[tabler--plus] accordion-item-active:hidden size-5 shrink-0 text-terracotta"></span>
                                <span class="icon-[tabler--minus] accordion-item-active:block hidden size-5 shrink-0 text-terracotta"></span>
                            </button>
                            <div id="faq-{{ $faq->id }}-collapse"
                                 class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                 aria-labelledby="faq-{{ $faq->id }}" role="region">
                                <div class="pb-5 text-[15px] leading-relaxed text-ink-muted prose prose-base max-w-none">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-review />
    <x-whatsapp-icon />

    @push('modals')
        <div id="about-us-certificates-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw]">
                <div class="modal-content h-full max-h-[100vh] justify-center bg-ink/95 backdrop-blur-sm">
                    <div class="modal-header">
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 text-canvas"
                                aria-label="Close" data-overlay="#about-us-certificates-modal">
                            <span class="icon-[tabler--x] size-6"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="image-carousel" data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true }' class="relative w-full">
                            <div class="carousel">
                                <div class="carousel-body h-full opacity-0">
                                    @foreach ($certificates as $certificateImage)
                                        <div class="carousel-slide">
                                            <div class="flex h-full justify-center">
                                                <x-curator-glider :media="$certificateImage" class="h-[90vh] w-full object-contain" alt="certificate" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" class="carousel-prev">
                                <span class="size-10 bg-canvas/90 hidden lg:flex items-center justify-center rounded-full shadow">
                                    <span class="icon-[tabler--chevron-left] size-5 text-ink"></span>
                                </span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button type="button" class="carousel-next">
                                <span class="sr-only">Next</span>
                                <span class="size-10 bg-canvas/90 hidden lg:flex items-center justify-center rounded-full shadow">
                                    <span class="icon-[tabler--chevron-right] size-5 text-ink"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script>
            window.addEventListener('load', function() {
                const wrapper = document.querySelector('#about-us-certificates');
                if (!wrapper) return;
                wrapper.classList.remove('skeleton', 'animate-pulse');
                document.querySelectorAll('.single-service').forEach(el => el.classList.remove('hidden'));
            });

            function changeCarouselSlide(index) {
                const el = document.querySelector('#image-carousel');
                if (el && window.HSCarousel) new HSCarousel(el).goTo(index);
            }
        </script>
    @endpush
</x-website-layout>
