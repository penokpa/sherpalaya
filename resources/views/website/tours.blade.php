@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $pageSetting->tour_page_cover_image_id
        ? Media::find($pageSetting->tour_page_cover_image_id)
        : null;
    $heroEyebrow = $locale === 'fr' ? $pageSetting->tour_page_title_up_fr : $pageSetting->tour_page_title_up_en;
    $heroTitle = $locale === 'fr' ? $pageSetting->tour_page_main_title_fr : $pageSetting->tour_page_main_title_en;
    $heroSubtitle = $locale === 'fr' ? $pageSetting->tour_page_content_fr : $pageSetting->tour_page_content_en;

    $categories = [];
    $totalCount = 0;
    foreach ($allTours as $cat) {
        $count = $cat->tours->count();
        if ($count > 0) {
            $categories[] = ['id' => 'cat-' . $cat->id, 'name' => $cat->name, 'count' => $count];
            $totalCount += $count;
        }
    }
@endphp

<x-website-layout :overHero="true">

    <x-listing.hero
        :image="$heroImage"
        fallback="photos/culture.jpg"
        :eyebrow="$heroEyebrow ?: __('listing.activities_eyebrow')"
        :title="$heroTitle ?: __('listing.activities_title')"
        :subtitle="$heroSubtitle"
        :count="$totalCount . ' ' . __('footer.activities')"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.activities')],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            <x-listing.filter-chips
                target-id="tours-grid"
                :categories="$categories"
            />

            <div id="tours-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($allTours as $cat)
                    @foreach ($cat->tours as $tour)
                        <div data-category="cat-{{ $cat->id }}">
                            <x-listing.card
                                :href="route('show_tour', ['locale' => $locale, 'id' => $tour->id])"
                                :image="$tour->coverImage"
                                fallback="photos/culture.jpg"
                                :eyebrow="$cat->name"
                                :title="$tour->title"
                                :duration="$tour->duration"
                            />
                        </div>
                    @endforeach
                @endforeach
            </div>

            @if ($totalCount === 0)
                <p class="py-16 text-center text-ink-muted">{{ __('listing.no_results') }}</p>
            @endif
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
