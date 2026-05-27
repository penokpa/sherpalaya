@props([
    'image' => null,        // Curator Media or URL
    'fallback' => 'photos/basecamp.JPG',
    'eyebrow' => null,
    'title',
    'altitude' => null,
    'duration' => null,
    'difficulty' => null,
    'season' => null,
    'price' => null,        // formatted "$1,400" — shown as "From $X / person"
])

@php
    $imageUrl = is_string($image) ? $image : (is_object($image) ? optional($image)->url : null);
    $imageUrl = $imageUrl ?: asset($fallback);
    $difficultyLabel = $difficulty instanceof \BackedEnum ? $difficulty->value : $difficulty;
@endphp

<header class="relative isolate w-full overflow-hidden h-[70vh] min-h-[480px] lg:h-[78vh]">
    <img src="{{ $imageUrl }}" alt="{{ $title }}"
         loading="eager" decoding="async" fetchpriority="high"
         class="absolute inset-0 h-full w-full object-cover" />
    {{-- Layered gradients for legibility regardless of photo brightness --}}
    <div class="absolute inset-0 bg-gradient-to-b from-ink/30 via-ink/15 to-ink/80"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-ink/60 via-ink/25 to-transparent md:via-ink/10"></div>

    <div class="relative z-10 flex h-full items-end pb-14 md:pb-16
                [text-shadow:0_2px_12px_rgba(0,0,0,0.45)]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-12">
            @if ($eyebrow)
                <p class="mb-4 text-[12px] font-semibold uppercase tracking-[0.18em] text-white/95">
                    {{ $eyebrow }}
                </p>
            @endif
            <h1 class="font-display text-[clamp(2.2rem,5vw,4.5rem)] font-medium leading-[1.05] tracking-tighter-display text-white max-w-[24ch]
                       [text-shadow:0_3px_24px_rgba(0,0,0,0.55)]">
                {{ $title }}
            </h1>
            @if ($price && str_starts_with((string) $price, '$'))
                <p class="mt-5 text-white/95 text-[15px] [text-shadow:0_2px_12px_rgba(0,0,0,0.55)]">
                    From <span class="font-semibold text-white text-lg">{{ $price }}</span>
                    <span class="text-white/75">/ person</span>
                </p>
            @elseif ($price)
                <p class="mt-5 text-white/95 text-[15px] font-semibold [text-shadow:0_2px_12px_rgba(0,0,0,0.55)]">
                    {{ $price }}
                </p>
            @endif

            {{-- Quick facts strip --}}
            @if ($altitude || $duration || $difficultyLabel || $season)
                <ul class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 text-white">
                    @if ($altitude)
                        <li class="inline-flex items-center gap-2 text-[14px]">
                            <span class="icon-[tabler--mountain] size-5 text-terracotta-100"></span>
                            <span class="font-medium">{{ number_format((int) $altitude) }} m</span>
                        </li>
                    @endif
                    @if ($duration)
                        <li class="inline-flex items-center gap-2 text-[14px]">
                            <span class="icon-[tabler--clock] size-5 text-terracotta-100"></span>
                            <span class="font-medium">{{ $duration }}</span>
                        </li>
                    @endif
                    @if ($difficultyLabel)
                        <li class="inline-flex items-center gap-2 text-[14px] capitalize">
                            <span class="icon-[tabler--flame] size-5 text-terracotta-100"></span>
                            <span class="font-medium">{{ str_replace('_', ' ', $difficultyLabel) }}</span>
                        </li>
                    @endif
                    @if ($season)
                        <li class="inline-flex items-center gap-2 text-[14px]">
                            <span class="icon-[tabler--calendar] size-5 text-terracotta-100"></span>
                            <span class="font-medium">{{ $season }}</span>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</header>
