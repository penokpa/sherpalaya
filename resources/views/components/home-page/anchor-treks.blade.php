@php
    use App\Models\Trek;
    use App\Models\Expedition;

    // Featured items: treks + expeditions where is_featured = true,
    // capped at 4 for a clean single-row anchor block.
    $treks = Trek::with('featureImage')->where('is_featured', true)->limit(4)->get();
    $expeditions = collect();
    if ($treks->count() < 4) {
        $needed = 4 - $treks->count();
        $expeditions = Expedition::with('featureImage')->where('is_featured', true)->limit($needed)->get();
    }
    $items = $treks->concat($expeditions)->take(4);
@endphp

@if ($items->isNotEmpty())
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:py-28 lg:px-12">
            <div class="mb-10 flex flex-col items-start gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">{{ __('home.anchors_eyebrow') }}</p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink max-w-[22ch]">
                        {{ __('home.anchors_title') }}
                    </h2>
                </div>
                <a href="{{ url('/' . app()->currentLocale() . '/treks') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-forest hover:text-terracotta transition">
                    {{ __('home.view_all') }}
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($items as $item)
                    @php
                        $isTrek = $item instanceof Trek;
                        $url = $isTrek
                            ? route('show_trek', ['locale' => app()->currentLocale(), 'id' => $item->id])
                            : route('show_expedition', ['locale' => app()->currentLocale(), 'id' => $item->id]);
                        $img = $item->featureImage?->url ?? asset('photos/basecamp.JPG');
                        $regionName = optional($item->region)->name;
                    @endphp
                    <a href="{{ $url }}" class="group block overflow-hidden rounded-2xl bg-surface transition hover:-translate-y-1 hover:shadow-xl shadow-sm">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ $img }}" alt="{{ $item->title }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="p-6">
                            @if ($regionName)
                                <p class="mb-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta">{{ $regionName }}</p>
                            @endif
                            <h3 class="font-display text-xl font-medium leading-snug text-ink tracking-tightish">{{ $item->title }}</h3>
                            <div class="mt-4 flex flex-wrap gap-4 text-[13px] text-ink-muted">
                                @if ($item->duration)
                                    <span class="inline-flex items-center gap-1">
                                        <span class="icon-[tabler--clock] size-4"></span>{{ $item->duration }}
                                    </span>
                                @endif
                                @if ($item->highest_altitude)
                                    <span class="inline-flex items-center gap-1">
                                        <span class="icon-[tabler--mountain] size-4"></span>{{ number_format($item->highest_altitude) }} m
                                    </span>
                                @endif
                                @php
                                    $difficulty = $isTrek ? $item->trek_difficulty : $item->expedition_difficulty;
                                    $difficultyLabel = $difficulty instanceof \BackedEnum ? $difficulty->value : $difficulty;
                                @endphp
                                @if ($difficultyLabel)
                                    <span class="inline-flex items-center gap-1 capitalize">
                                        <span class="icon-[tabler--flame] size-4"></span>{{ str_replace('_', ' ', $difficultyLabel) }}
                                    </span>
                                @endif
                            </div>
                            @if ($item->price_from_label)
                                <p class="mt-4 text-[13px] text-ink-muted">
                                    From <span class="font-semibold text-ink">{{ $item->price_from_label }}</span>
                                    <span class="text-ink-muted/70">/ person</span>
                                </p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif
