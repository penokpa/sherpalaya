@props(['item'])

@php
    $tiers = \App\Services\ExpeditionTiers::forExpedition($item) ?? [];
    $locale = app()->currentLocale();
    $inquireUrl = url('/' . $locale . '/contact');
    $cols = match (count($tiers)) {
        2 => 'lg:grid-cols-2',
        3 => 'lg:grid-cols-3',
        default => 'lg:grid-cols-4',
    };
@endphp

@if (!empty($tiers))
    <section class="scroll-mt-28">
        <header class="mb-8">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                Service options
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                Choose your service tier
            </h2>
            <p class="mt-3 text-[15px] leading-relaxed text-ink-muted max-w-2xl">
                Same summit, four ways to climb it. What changes is the level of Sherpa support, oxygen allocation, and base-camp comfort. We quote each tier on inquiry.
            </p>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 {{ $cols }} gap-5">
            @foreach ($tiers as $tier)
                @php
                    $tierAccent = match ($tier['name']) {
                        'Classic' => 'from-forest/60',
                        'Premium' => 'from-forest/70',
                        'VIP'     => 'from-terracotta/70',
                        'VVIP'    => 'from-ink/80',
                        default   => 'from-ink/60',
                    };
                    $tierBadge = match ($tier['name']) {
                        'Premium' => 'Popular',
                        'VVIP'    => 'Bespoke',
                        default   => null,
                    };
                @endphp
                <article class="relative overflow-hidden rounded-2xl shadow-lg flex flex-col min-h-[420px] group">
                    {{-- Background image + tier-colored gradient overlay --}}
                    <div class="absolute inset-0">
                        <img src="{{ asset($tier['image']) }}" alt="{{ $tier['name'] }} tier"
                             class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                             loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-b {{ $tierAccent }} via-ink/70 to-ink/95"></div>
                    </div>

                    {{-- Content --}}
                    <div class="relative z-10 flex flex-col h-full p-6 text-white">
                        @if ($tierBadge)
                            <span class="self-start mb-3 inline-flex items-center rounded-full bg-white/15 backdrop-blur-sm px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.14em]">
                                {{ $tierBadge }}
                            </span>
                        @endif

                        <h3 class="font-display text-3xl font-medium leading-none tracking-tighter-display">
                            {{ $tier['name'] }}
                        </h3>

                        <p class="mt-3 text-[13px] leading-relaxed text-white/85">
                            {{ $tier['summary'] }}
                        </p>

                        <ul class="mt-5 space-y-2 text-[13px] text-white/95 flex-grow">
                            @foreach ($tier['includes'] as $line)
                                <li class="flex gap-2">
                                    <span class="icon-[tabler--check] size-4 mt-0.5 text-terracotta-100 shrink-0"></span>
                                    <span>{{ $line }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ $inquireUrl }}?tier={{ urlencode($item->title . ' - ' . $tier['name']) }}"
                           class="mt-6 inline-flex items-center justify-between gap-2 border-t border-white/20 pt-4 text-[13px] font-semibold tracking-wide hover:text-terracotta-100 transition">
                            <span>Inquire about this tier</span>
                            <span class="icon-[tabler--arrow-right] size-4"></span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endif
