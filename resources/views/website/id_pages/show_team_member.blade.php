@php
    $locale = app()->currentLocale();
    $sherpaTitle = is_string($sherpa->title) ? $sherpa->title : ($sherpa->getTranslation('title', $locale) ?? $sherpa->getTranslation('title', 'en'));
@endphp

<x-website-layout :seoData="$seoData">

    {{-- Editorial-style hero: large portrait left, name + title right --}}
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 pt-12 lg:pt-16 lg:px-12">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-12 items-center">
                <div class="lg:col-span-5">
                    <div class="aspect-[3/4] overflow-hidden rounded-2xl bg-hairline ring-1 ring-hairline">
                        <img loading="eager" decoding="async"
                             src="{{ $sherpa->profilePicture->url ?? asset('photos/P1030127.JPG') }}"
                             alt="{{ $sherpa->name }}"
                             class="h-full w-full object-cover" />
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <p class="text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">{{ $sherpaTitle }}</p>
                    <h1 class="mt-3 font-display text-4xl md:text-5xl lg:text-6xl font-medium leading-[1.05] tracking-tighter-display text-ink">
                        {{ $sherpa->name }}
                    </h1>

                    @if (count($sherpa->language ?? []) > 0)
                        <div class="mt-6 flex flex-wrap gap-2">
                            @foreach ($sherpa->language as $lang)
                                <span class="inline-flex items-center rounded-full border border-hairline bg-surface px-3.5 py-1.5 text-[12px] font-medium text-ink-muted uppercase tracking-wide">
                                    {{ $lang }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.our-team'), 'url' => url('/' . $locale . '/our-team')],
        ['name' => $sherpa->name],
    ]" />

    {{-- Bio --}}
    @if ($sherpa->description)
        <section class="bg-canvas">
            <div class="mx-auto max-w-4xl px-6 py-12 lg:py-16 lg:px-12">
                <article class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans">
                    {!! $sherpa->description !!}
                </article>
            </div>
        </section>
    @endif

    {{-- Expeditions table --}}
    @if (count($sherpa->expeditions) > 0)
        <section class="bg-forest text-canvas">
            <div class="mx-auto max-w-7xl px-6 py-16 lg:py-20 lg:px-12">
                <div class="mb-8 flex items-end justify-between gap-4">
                    <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-canvas">{{ __('footer.expeditions') }}</h2>
                    <p class="text-[12px] uppercase tracking-[0.16em] text-canvas/60">{{ count($sherpa->expeditions) }} summits</p>
                </div>
                <div class="overflow-x-auto rounded-xl ring-1 ring-canvas/10">
                    <table class="w-full text-left text-canvas">
                        <thead class="text-[11px] uppercase tracking-[0.14em] text-canvas/70 bg-canvas/5">
                            <tr>
                                <th class="px-5 py-4 font-semibold">{{ __('team.exped-table') }}</th>
                                <th class="px-5 py-4 font-semibold">{{ __('team.altitude') }}</th>
                                <th class="px-5 py-4 font-semibold">{{ __('team.count') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-[14px] divide-y divide-canvas/10">
                            @foreach ($sherpa->expeditions as $expedition)
                                <tr class="hover:bg-canvas/5">
                                    <td class="px-5 py-3.5 whitespace-nowrap">{{ $expedition->title }}</td>
                                    <td class="px-5 py-3.5 text-canvas/80">{{ $expedition->highest_altitude }} m</td>
                                    <td class="px-5 py-3.5">
                                        <span class="inline-flex items-center rounded-full bg-terracotta/15 text-terracotta-100 px-2.5 py-0.5 text-[11px] font-semibold">
                                            ×{{ $expedition->pivot?->count ?? 1 }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    {{-- Treks + Tours tables --}}
    @if (count($sherpa->treks) > 0 || count($sherpa->tours) > 0)
        <section class="bg-canvas">
            <div class="mx-auto max-w-7xl px-6 py-16 lg:py-20 lg:px-12">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                    @if (count($sherpa->treks) > 0)
                        <div>
                            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink mb-6">{{ __('footer.treks') }}</h2>
                            <div class="overflow-x-auto rounded-xl ring-1 ring-hairline">
                                <table class="w-full text-left text-ink">
                                    <thead class="text-[11px] uppercase tracking-[0.14em] text-ink-muted bg-canvas">
                                        <tr>
                                            <th class="px-5 py-4 font-semibold">{{ __('team.trek-table') }}</th>
                                            <th class="px-5 py-4 font-semibold">{{ __('team.altitude') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-[14px] bg-surface divide-y divide-hairline">
                                        @foreach ($sherpa->treks as $trek)
                                            <tr>
                                                <td class="px-5 py-3.5 whitespace-nowrap">{{ $trek->title }}</td>
                                                <td class="px-5 py-3.5 text-ink-muted">{{ $trek->highest_altitude }} m</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    @if (count($sherpa->tours) > 0)
                        <div>
                            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink mb-6">{{ __('footer.activities') }}</h2>
                            <div class="overflow-x-auto rounded-xl ring-1 ring-hairline">
                                <table class="w-full text-left text-ink">
                                    <thead class="text-[11px] uppercase tracking-[0.14em] text-ink-muted bg-canvas">
                                        <tr>
                                            <th class="px-5 py-4 font-semibold">{{ __('team.activity-table') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-[14px] bg-surface divide-y divide-hairline">
                                        @foreach ($sherpa->tours as $tour)
                                            <tr>
                                                <td class="px-5 py-3.5">{{ $tour->title }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Experience --}}
    @if (count($sherpa->experience ?? []) > 0)
        <section class="bg-canvas">
            <div class="mx-auto max-w-4xl px-6 pb-16 lg:pb-20 lg:px-12">
                <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink mb-6">{{ __('team.experiences') }}</h2>
                <ul class="space-y-3 text-[15px] text-ink/85 leading-relaxed">
                    @foreach ($sherpa->experience as $exp)
                        <li class="flex gap-3">
                            <span class="icon-[tabler--check] size-5 mt-0.5 text-terracotta shrink-0"></span>
                            <span>{{ $exp }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Awards --}}
    @if ($sherpa->awardsAndCertificates->count() > 0)
        <section class="bg-canvas">
            <div class="mx-auto max-w-7xl px-6 pb-20 lg:px-12">
                <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink mb-6">{{ __('team.awards') }}</h2>
                <div id="all-awards" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 skeleton animate-pulse min-h-52">
                    @foreach ($sherpa->awardsAndCertificates as $i => $award)
                        <button type="button"
                                class="single-award hidden group aspect-[3/4] overflow-hidden rounded-lg bg-hairline"
                                aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="award-modal"
                                data-overlay="#award-modal"
                                onclick="changeCarouselSlide({{ $i }})">
                            <img loading="lazy" decoding="async" src="{{ $award->url }}" alt="Award"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-whatsapp-icon />

    @push('modals')
        <div id="award-modal" class="overlay modal overlay-open:opacity-100 hidden p-0" role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100 max-w-[100vw]">
                <div class="modal-content h-full max-h-[100vh] justify-center bg-ink/95 backdrop-blur-md">
                    <div class="modal-header">
                        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 text-canvas"
                                aria-label="Close" data-overlay="#award-modal">
                            <span class="icon-[tabler--x] size-6"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="image-carousel" data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true }' class="relative w-full">
                            <div class="carousel">
                                <div class="carousel-body h-full opacity-0">
                                    @foreach ($sherpa->awardsAndCertificates as $award)
                                        <div class="carousel-slide">
                                            <div class="flex h-full justify-center">
                                                <img loading="lazy" decoding="async" src="{{ $award->url }}"
                                                     class="h-[90vh] w-full object-contain" alt="award" />
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
                const wrapper = document.querySelector('#all-awards');
                if (!wrapper) return;
                wrapper.classList.remove('skeleton', 'animate-pulse');
                document.querySelectorAll('.single-award').forEach(el => el.classList.remove('hidden'));
            });

            function changeCarouselSlide(index) {
                const el = document.querySelector('#image-carousel');
                if (el && window.HSCarousel) new HSCarousel(el).goTo(index);
            }
        </script>
    @endpush
</x-website-layout>
