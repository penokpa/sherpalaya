@php
    use App\Models\Trek;
    use App\Models\Expedition;
    use App\Models\Tour;

    $tiles = [
        [
            'title' => __('home.regions_treks'),
            'desc' => __('home.regions_treks_desc'),
            'url' => url('/' . app()->currentLocale() . '/treks'),
            'count' => Trek::count(),
            'img' => optional(Trek::with('coverImage')->where('is_featured', true)->first())->coverImage?->url
                ?? optional(Trek::with('coverImage')->first())->coverImage?->url
                ?? asset('photos/basecamp.JPG'),
        ],
        [
            'title' => __('home.regions_expeditions'),
            'desc' => __('home.regions_expeditions_desc'),
            'url' => url('/' . app()->currentLocale() . '/expeditions'),
            'count' => Expedition::count(),
            'img' => optional(Expedition::with('coverImage')->where('is_featured', true)->first())->coverImage?->url
                ?? optional(Expedition::with('coverImage')->first())->coverImage?->url
                ?? asset('photos/trek1.JPG'),
        ],
        [
            'title' => __('home.regions_activities'),
            'desc' => __('home.regions_activities_desc'),
            'url' => url('/' . app()->currentLocale() . '/tours'),
            'count' => Tour::count(),
            'img' => optional(Tour::with('coverImage')->where('is_featured', true)->first())->coverImage?->url
                ?? optional(Tour::with('coverImage')->first())->coverImage?->url
                ?? asset('photos/culture.jpg'),
        ],
    ];
@endphp

<section class="bg-canvas">
    <div class="mx-auto max-w-7xl px-6 py-20 lg:py-28 lg:px-12">
        <div class="mb-12 max-w-3xl">
            <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">{{ __('home.regions_eyebrow') }}</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                {{ __('home.regions_title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            @foreach ($tiles as $tile)
                <a href="{{ $tile['url'] }}"
                   class="group relative block aspect-[4/5] md:aspect-[3/4] overflow-hidden rounded-2xl">
                    <img loading="lazy" decoding="async" src="{{ $tile['img'] }}" alt="{{ $tile['title'] }}"
                         class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-ink/85 via-ink/30 to-transparent"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-7 text-canvas">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-canvas/75">{{ $tile['count'] }} {{ Str::lower($tile['title']) }}</p>
                        <h3 class="mt-1 font-display text-3xl font-medium tracking-tightish">{{ $tile['title'] }}</h3>
                        <p class="mt-2 text-[14px] leading-snug text-canvas/85 max-w-[28ch]">{{ $tile['desc'] }}</p>
                        <span class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold transition group-hover:text-terracotta-100">
                            Explore
                            <span class="icon-[tabler--arrow-right] size-4 transition group-hover:translate-x-1"></span>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
