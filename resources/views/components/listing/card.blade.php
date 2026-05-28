@props([
    'href',
    'image' => null,        // Media object or URL string
    'fallback' => 'photos/basecamp.JPG',
    'eyebrow' => null,      // region / category — small uppercase
    'title',
    'duration' => null,     // e.g. "14 Days"
    'altitude' => null,     // e.g. "5,545" (m suffix added automatically)
    'difficulty' => null,   // enum or string
    'cta' => null,          // optional CTA label override (default: 'View details')
    'badge' => null,        // optional ribbon e.g. "Bestseller"
])

@php
    $imageUrl = is_string($image) ? $image : (is_object($image) ? optional($image)->url : null);
    $imageUrl = $imageUrl ?: asset($fallback);

    $difficultyLabel = $difficulty instanceof \BackedEnum ? $difficulty->value : $difficulty;
    $ctaLabel = $cta ?? __('listing.view_details');
@endphp

<a href="{{ $href }}"
   class="group block overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
    <div class="relative aspect-[4/3] overflow-hidden">
        <img loading="lazy" decoding="async" src="{{ $imageUrl }}" alt="{{ $title }}"
             class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
        @if ($badge)
            <span class="absolute top-3 left-3 inline-flex items-center rounded-full bg-ink/75 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-white backdrop-blur-sm">
                {{ $badge }}
            </span>
        @endif
    </div>

    <div class="p-6">
        @if ($eyebrow)
            <p class="mb-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta">{{ $eyebrow }}</p>
        @endif
        <h3 class="font-display text-xl font-medium leading-snug tracking-tightish text-ink">{{ $title }}</h3>

        @if ($duration || $altitude || $difficultyLabel)
            <div class="mt-4 flex flex-wrap gap-x-4 gap-y-1.5 text-[13px] text-ink-muted">
                @if ($duration)
                    <span class="inline-flex items-center gap-1.5">
                        <span class="icon-[tabler--clock] size-4"></span>{{ $duration }}
                    </span>
                @endif
                @if ($altitude)
                    <span class="inline-flex items-center gap-1.5">
                        <span class="icon-[tabler--mountain] size-4"></span>{{ number_format((int) $altitude) }} m
                    </span>
                @endif
                @if ($difficultyLabel)
                    <span class="inline-flex items-center gap-1.5 capitalize">
                        <span class="icon-[tabler--flame] size-4"></span>{{ str_replace('_', ' ', $difficultyLabel) }}
                    </span>
                @endif
            </div>
        @endif

        <div class="mt-5 flex items-center justify-end">
            <span class="text-[13px] font-semibold text-forest group-hover:text-terracotta transition">
                {{ $ctaLabel }} →
            </span>
        </div>
    </div>
</a>
