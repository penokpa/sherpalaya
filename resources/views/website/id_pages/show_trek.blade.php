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
        :image="$trek->coverImage"
        :eyebrow="optional($trek->category)->name"
        :title="$trek->title"
        :altitude="$trek->highest_altitude"
        :duration="$trek->duration"
        :difficulty="$trek->trek_difficulty"
        :season="$trek->best_time_for_trek"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.treks'), 'url' => url('/' . $locale . '/treks')],
        ['name' => $trek->title],
    ]" />

    <x-detail.tab-nav targetId="scrollspy-1" :items="$tabs" />

    <main id="scrollspy-1" class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">
            <div class="grid grid-cols-1 gap-10 xl:grid-cols-3 xl:gap-12">

                {{-- Main content (2/3) --}}
                <div class="xl:col-span-2 space-y-16">
                    <x-detail.section.overview :item="$trek" />
                    <x-detail.section.key-highlights :item="$trek" />
                    <x-detail.section.itinerary :item="$trek" />
                    <x-detail.section.cost-info :item="$trek" />
                    <x-detail.section.essential-tips :item="$trek" />
                    <x-detail.section.gallery :item="$trek" />
                </div>

                {{-- Sticky sidebar (1/3) --}}
                <aside class="xl:col-span-1">
                    <div class="xl:sticky xl:top-24">
                        <x-detail.sidebar
                            :bookingFor="$trek"
                            :altitude="$trek->highest_altitude"
                            :duration="$trek->duration"
                            :difficulty="$trek->trek_difficulty"
                            :startPoint="$trek->starting_point"
                            :endPoint="$trek->ending_point"
                            :season="$trek->best_time_for_trek"
                            :grade="$trek->grade"
                        />
                    </div>
                </aside>
            </div>

            {{-- Recommendations --}}
            <div class="mt-20">
                <x-show-recommendation :recommendFor="$trek" />
            </div>
        </div>
    </main>

    <x-whatsapp-icon :url="$trek->getWhatsappUrl()" />
</x-website-layout>
