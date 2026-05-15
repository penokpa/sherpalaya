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
        :image="$tour->coverImage"
        fallback="photos/culture.jpg"
        :eyebrow="optional($tour->category)->name"
        :title="$tour->title"
        :duration="$tour->duration"
        :season="$tour->best_time_for_tour"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.activities'), 'url' => url('/' . $locale . '/tours')],
        ['name' => $tour->title],
    ]" />

    <x-detail.tab-nav targetId="scrollspy-1" :items="$tabs" />

    <main id="scrollspy-1" class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">
            <div class="grid grid-cols-1 gap-10 xl:grid-cols-3 xl:gap-12">

                <div class="xl:col-span-2 space-y-16">
                    <x-detail.section.overview :item="$tour" />
                    <x-detail.section.key-highlights :item="$tour" />
                    <x-detail.section.itinerary :item="$tour" />
                    <x-detail.section.cost-info :item="$tour" />
                    <x-detail.section.essential-tips :item="$tour" />
                    <x-detail.section.gallery :item="$tour" />
                </div>

                <aside class="xl:col-span-1">
                    <div class="xl:sticky xl:top-24">
                        <x-detail.sidebar
                            :bookingFor="$tour"
                            :duration="$tour->duration"
                            :startPoint="$tour->starting_point"
                            :endPoint="$tour->ending_point"
                            :season="$tour->best_time_for_tour"
                            :grade="$tour->grade"
                        />
                    </div>
                </aside>
            </div>

            <div class="mt-20">
                <x-show-recommendation :recommendFor="$tour" />
            </div>
        </div>
    </main>

    <x-whatsapp-icon :url="$tour->getWhatsappUrl()" />
</x-website-layout>
