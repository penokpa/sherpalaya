@props(['item'])

@php
    $images = $item->images ?? collect();
    $modalId = 'gallery-modal-' . strtolower(class_basename($item)) . '-' . $item->id;
@endphp

@if ($images->isNotEmpty())
    <section id="gallery" class="scroll-mt-28">
        <header class="mb-7">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('show-page.gallery') }}
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                Moments from the trail
            </h2>
        </header>

        <div class="grid grid-cols-2 gap-2 md:gap-3 md:grid-cols-3">
            @foreach ($images->take(9) as $idx => $image)
                <button type="button"
                    aria-haspopup="dialog" aria-expanded="false"
                    aria-controls="{{ $modalId }}"
                    data-overlay="#{{ $modalId }}"
                    onclick="window.openDetailGallery_{{ $item->id }}({{ $idx }})"
                    class="group relative aspect-[4/3] overflow-hidden rounded-lg ring-1 ring-ink/10 transition hover:ring-ink/30">
                    <img loading="lazy" decoding="async"
                         src="{{ $image->url }}"
                         alt="Gallery image"
                         class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                    <span class="absolute inset-0 bg-gradient-to-t from-ink/20 via-transparent to-transparent opacity-0 transition group-hover:opacity-100"></span>
                </button>
            @endforeach
        </div>

        @push('modals')
            <div id="{{ $modalId }}" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog" tabindex="-1">
                <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw]">
                    <div class="modal-content h-full max-h-[100vh] justify-center bg-transparent backdrop-blur-md">
                        <div class="modal-header">
                            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 z-10 text-white" aria-label="Close" data-overlay="#{{ $modalId }}">
                                <span class="icon-[tabler--x] size-6"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <x-gallery :medias="$item->images" :showMedia="null" />
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        @endpush

        @push('scripts')
            <script>
                window.openDetailGallery_{{ $item->id }} = function (index) {
                    const el = document.querySelector('#image-carousel');
                    if (el && typeof HSCarousel !== 'undefined') {
                        const carousel = new HSCarousel(el);
                        carousel.goTo(index);
                    }
                };
            </script>
        @endpush
    </section>
@endif
