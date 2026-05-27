@php
    $locale = app()->currentLocale();
    $heroImage = $category->coverImage ?: $category->expeditions->first()?->coverImage;
@endphp

<x-website-layout :overHero="true">

    <x-listing.hero
        :image="$heroImage ?: asset('photos/trek1.JPG')"
        eyebrow="Expedition category"
        :title="$category->name"
        :subtitle="$category->description"
        :count="$category->expeditions->count() . ' ' . Str::plural('expedition', $category->expeditions->count())"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.expeditions'), 'url' => url('/' . $locale . '/expeditions')],
        ['name' => $category->name],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            @if ($category->expeditions->isEmpty())
                <p class="py-16 text-center text-ink-muted">No published expeditions in this category yet.</p>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($category->expeditions as $exp)
                        <x-listing.card
                            :href="route('show_expedition', ['locale' => $locale, 'id' => $exp->id])"
                            :image="$exp->coverImage"
                            fallback="photos/trek1.JPG"
                            :eyebrow="optional($exp->region)->name . ($exp->highest_altitude ? ' · ' . number_format((int) $exp->highest_altitude) . ' m' : '')"
                            :title="$exp->title"
                            :duration="$exp->duration"
                            :difficulty="$exp->expedition_difficulty"
                            :price="$exp->price_from_label ?? 'Price on request'"
                            :cta="__('listing.inquire')"
                        />
                    @endforeach
                </div>
            @endif

            <div class="mt-16 border-t border-ink/10 pt-8">
                <a href="{{ url('/' . $locale . '/expeditions') }}"
                   class="inline-flex items-center gap-2 text-[14px] font-semibold text-forest hover:text-terracotta transition">
                    <span class="icon-[tabler--arrow-left] size-4"></span>
                    All expedition categories
                </a>
            </div>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
