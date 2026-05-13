@props([
    'image' => null,        // Curator Media or URL string
    'fallback' => 'photos/basecamp.JPG',
    'eyebrow' => null,      // tiny uppercase label
    'title' => null,        // main heading
    'subtitle' => null,     // optional descriptor below title
    'count' => null,        // optional "23 trips" line
])

@php
    $imageUrl = is_string($image) ? $image : (is_object($image) ? optional($image)->url : null);
    $imageUrl = $imageUrl ?: asset($fallback);
@endphp

<section class="relative isolate w-full overflow-hidden h-[55vh] min-h-[380px] lg:h-[60vh]">
    <img src="{{ $imageUrl }}" alt="{{ $title }}"
         loading="eager" decoding="async" fetchpriority="high"
         class="absolute inset-0 h-full w-full object-cover" />
    <div class="absolute inset-0 bg-gradient-to-b from-ink/30 via-ink/20 to-ink/70"></div>

    <div class="relative z-10 flex h-full items-end pb-12 md:items-center md:pb-0">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-12">
            @if ($eyebrow)
                <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-white/85">
                    {{ $eyebrow }}
                </p>
            @endif
            @if ($title)
                <h1 class="font-display text-[clamp(2.2rem,4.5vw,4rem)] font-medium leading-[1.05] tracking-tighter-display text-white max-w-[22ch]">
                    {{ $title }}
                </h1>
            @endif
            @if ($subtitle)
                <p class="mt-4 max-w-[60ch] text-base md:text-lg leading-relaxed text-white/90">
                    {{ $subtitle }}
                </p>
            @endif
            @if ($count !== null)
                <p class="mt-5 text-[12px] font-semibold uppercase tracking-[0.18em] text-white/75">
                    {{ $count }}
                </p>
            @endif
        </div>
    </div>
</section>
