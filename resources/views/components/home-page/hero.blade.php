@php
    use App\Settings\LandingPageSetting;
    use App\Models\Media;

    $landingPageSetting = app(LandingPageSetting::class);
    $locale = app()->getLocale() === 'fr' ? 'fr' : 'en';
    $title = $landingPageSetting->{'homepage_title_' . $locale} ?? null;
    $description = $landingPageSetting->{'homepage_description_' . $locale} ?? null;

    // Hero image: prefer the parallax image setting, fall back to a packaged photo
    $heroMediaId = $landingPageSetting->parallax_image_id;
    $heroMedia = $heroMediaId ? Media::find($heroMediaId) : null;
    $heroUrl = $heroMedia?->url ?? asset('photos/basecamp.JPG');
@endphp

<section class="relative isolate -mt-px h-[100svh] min-h-[600px] w-full overflow-hidden">
    {{-- Image --}}
    <img
        src="{{ $heroUrl }}"
        alt="{{ $title ?? 'Sherpalaya — Himalayan trekking and expeditions' }}"
        loading="eager" decoding="async" fetchpriority="high"
        class="absolute inset-0 h-full w-full object-cover"
    />

    {{-- Gradient overlay for legibility --}}
    <div class="absolute inset-0 bg-gradient-to-b from-ink/10 via-transparent to-ink/70"></div>

    {{-- Content --}}
    <div class="relative z-10 flex h-full items-end pb-24 md:items-center md:pb-0">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-12">
            <p class="mb-4 text-[12px] font-semibold uppercase tracking-[0.18em] text-white/85">
                {{ __('home.eyebrow') }}
            </p>
            <h1 class="font-display text-[clamp(2.4rem,5.5vw,4.75rem)] font-medium leading-[1.05] tracking-tighter-display text-white max-w-[18ch]">
                {{ $title ?? __('home.default_headline') }}
            </h1>
            @if ($description)
                <p class="mt-6 max-w-[52ch] text-base md:text-lg leading-relaxed text-white/90">
                    {{ $description }}
                </p>
            @endif
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ url('/' . app()->currentLocale() . '/contact') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-terracotta px-7 py-3.5 text-[15px] font-medium text-white transition hover:bg-terracotta-hover">
                    {{ __('home.cta_plan') }}
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
                <a href="{{ url('/' . app()->currentLocale() . '/treks') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-7 py-3.5 text-[15px] font-medium text-white backdrop-blur transition hover:bg-white/20">
                    {{ __('home.cta_browse') }}
                </a>
            </div>
        </div>
    </div>
</section>
