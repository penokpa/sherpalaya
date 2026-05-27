@php
    $locale = app()->currentLocale();
@endphp

<x-website-layout :overHero="true">

    <x-listing.hero
        :image="asset('photos/banner.jpg')"
        eyebrow="Trekking by region"
        title="Trekking Regions of Nepal"
        subtitle="From the Khumbu in the east to Humla in the far west, every Sherpalaya trek is grouped by region so you can pick the corner of the Himalaya that fits your style."
        :count="$regions->count() . ' regions · ' . $regions->sum(fn ($r) => $r->treks->count()) . ' treks'"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => 'Trekking Regions'],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($regions as $region)
                    @php
                        // Cover preference: explicit region cover > first trek's cover > fallback
                        $coverUrl = optional($region->coverImage)->url
                            ?? optional($region->treks->first()?->coverImage)->url
                            ?? asset('photos/basecamp.JPG');
                        $trekCount = $region->treks->count();
                    @endphp
                    <a href="{{ url('/' . $locale . '/regions/' . $region->slug) }}"
                       class="group block overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ $coverUrl }}" alt="{{ $region->name }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                            <span class="absolute top-3 left-3 inline-flex items-center rounded-full bg-ink/75 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-white backdrop-blur-sm">
                                {{ $trekCount }} {{ Str::plural('trek', $trekCount) }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h2 class="font-display text-2xl font-medium leading-snug tracking-tightish text-ink">
                                {{ $region->name }} Region
                            </h2>
                            @if ($region->description)
                                <p class="mt-3 text-[14px] leading-relaxed text-ink-muted line-clamp-4">
                                    {!! $region->description !!}
                                </p>
                            @endif
                            <p class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold text-forest group-hover:text-terracotta transition">
                                Explore region
                                <span class="icon-[tabler--arrow-right] size-4"></span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
