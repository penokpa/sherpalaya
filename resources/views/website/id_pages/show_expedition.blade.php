@php
    $locale = app()->currentLocale();

    $tabs = [
        ['href' => '#key_highlights', 'icon' => 'tabler--bulb', 'label' => __('show-page.key')],
        ['href' => '#itineraries',    'icon' => 'tabler--calendar-week', 'label' => __('show-page.itinerary')],
        ['href' => '#costs_include',  'icon' => 'tabler--check', 'label' => __('show-page.costs_include')],
        ['href' => '#costs_exclude',  'icon' => 'tabler--x', 'label' => __('show-page.costs_exclude')],
        ['href' => '#essential_tips', 'icon' => 'tabler--info-circle', 'label' => __('show-page.tips')],
        ['href' => '#gallery',        'icon' => 'tabler--photo', 'label' => __('show-page.gallery')],
    ];
@endphp

<x-website-layout :seoData="$seoData">
    <x-detail.hero
        :image="$expedition->coverImage"
        fallback="photos/trek1.JPG"
        :eyebrow="optional($expedition->category)->name"
        :title="$expedition->title"
        :altitude="$expedition->highest_altitude"
        :duration="$expedition->duration"
        :difficulty="$expedition->expedition_difficulty"
        :season="$expedition->best_time_for_expedition"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.expeditions'), 'url' => url('/' . $locale . '/expeditions')],
        ['name' => $expedition->title],
    ]" />

    <x-detail.tab-nav targetId="scrollspy-1" :items="$tabs" />

    <main id="scrollspy-1" class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">
            <div class="grid grid-cols-1 gap-10 xl:grid-cols-3 xl:gap-12">

                <div class="xl:col-span-2 space-y-16">
                    <section>
                        <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink mb-5">
                            {{ __('show-page.overview') }}
                        </h2>
                        <article id="expedition-description-{{ $expedition->id }}"
                                 class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans">
                            {!! $expedition->description !!}
                        </article>
                        <x-read-more :componentId="'expedition-description-' . $expedition->id" />
                    </section>

                    <x-show-expedition.scroll-spy-body.expedition-key-highlight :expedition="$expedition" />
                    <x-show-expedition.scroll-spy-body.expedition-itinerary :expedition="$expedition" />
                    <x-show-expedition.scroll-spy-body.expedition-cost-info :expedition="$expedition" />
                    <x-show-expedition.scroll-spy-body.expedition-essential-tip :expedition="$expedition" />
                    <x-show-expedition.scroll-spy-body.expedition-gallery :expedition="$expedition" />
                </div>

                <aside class="xl:col-span-1">
                    <div class="xl:sticky xl:top-24">
                        <x-detail.sidebar
                            :bookingFor="$expedition"
                            :altitude="$expedition->highest_altitude"
                            :duration="$expedition->duration"
                            :difficulty="$expedition->expedition_difficulty"
                            :startPoint="$expedition->starting_point"
                            :endPoint="$expedition->ending_point"
                            :season="$expedition->best_time_for_expedition"
                            :grade="$expedition->grade"
                            :showBooking="false"
                            :primaryCta="__('listing.inquire')"
                        />
                    </div>
                </aside>
            </div>

            <div class="mt-20">
                <x-show-recommendation :recommendFor="$expedition" />
            </div>
        </div>
    </main>
</x-website-layout>
