@php
    $locale = app()->currentLocale();
    $heroImage = $region->coverImage
        ?: $region->treks->first()?->coverImage;
@endphp

<x-website-layout :overHero="true">

    <x-listing.hero
        :image="$heroImage ?: asset('photos/banner.jpg')"
        eyebrow="Region"
        :title="$region->name . ' Trekking'"
        :subtitle="$region->description"
        :count="$region->treks->count() . ' ' . Str::plural('trek', $region->treks->count())"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => 'Trekking Regions', 'url' => url('/' . $locale . '/regions')],
        ['name' => $region->name],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            @if ($region->treks->isEmpty())
                <p class="py-16 text-center text-ink-muted">No published treks in this region yet — check back soon.</p>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($region->treks as $trek)
                        <x-listing.card
                            :href="route('show_trek', ['locale' => $locale, 'id' => $trek->id])"
                            :image="$trek->coverImage"
                            :eyebrow="$region->name"
                            :title="$trek->title"
                            :duration="$trek->duration"
                            :altitude="$trek->highest_altitude"
                            :difficulty="$trek->trek_difficulty"
                            :price="$trek->price_from_label"
                        />
                    @endforeach
                </div>
            @endif

            <div class="mt-16 border-t border-ink/10 pt-8">
                <a href="{{ url('/' . $locale . '/regions') }}"
                   class="inline-flex items-center gap-2 text-[14px] font-semibold text-forest hover:text-terracotta transition">
                    <span class="icon-[tabler--arrow-left] size-4"></span>
                    All regions
                </a>
            </div>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
