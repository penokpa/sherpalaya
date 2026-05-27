@php
    $locale = app()->currentLocale();

    $hasTiers = filled(\App\Services\ExpeditionTiers::forExpedition($expedition));

    $tabs = array_values(array_filter([
        ['href' => '#key_highlights', 'icon' => 'tabler--bulb', 'label' => __('show-page.key')],
        ['href' => '#itineraries',    'icon' => 'tabler--calendar-week', 'label' => __('show-page.itinerary')],
        $hasTiers ? ['href' => '#service-tiers', 'icon' => 'tabler--stars', 'label' => 'Service Tiers'] : null,
        ['href' => '#costs_include',  'icon' => 'tabler--check', 'label' => __('show-page.costs_include')],
        ['href' => '#costs_exclude',  'icon' => 'tabler--x', 'label' => __('show-page.costs_exclude')],
        ['href' => '#essential_tips', 'icon' => 'tabler--info-circle', 'label' => __('show-page.tips')],
        ['href' => '#gallery',        'icon' => 'tabler--photo', 'label' => __('show-page.gallery')],
    ]));
@endphp

<x-website-layout :seoData="$seoData" :overHero="true">
    <x-detail.hero
        :image="$expedition->coverImage"
        fallback="photos/trek1.JPG"
        :eyebrow="optional($expedition->category)->name"
        :title="$expedition->title"
        :altitude="$expedition->highest_altitude"
        :duration="$expedition->duration"
        :difficulty="$expedition->expedition_difficulty"
        :season="$expedition->best_time_for_expedition"
        :price="$expedition->price_from_label ?? 'Price on request'"
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
                    <x-detail.section.overview :item="$expedition" />
                    <x-detail.section.key-highlights :item="$expedition" />
                    <x-detail.section.itinerary :item="$expedition" />
                    <div id="service-tiers">
                        <x-detail.section.service-tiers :item="$expedition" />
                    </div>
                    <x-detail.section.cost-info :item="$expedition" />
                    <x-detail.section.essential-tips :item="$expedition" />
                    <x-detail.section.gallery :item="$expedition" />
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

    <x-whatsapp-icon :url="$expedition->getWhatsappUrl()" />
</x-website-layout>
