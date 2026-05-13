@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $pageSetting->trek_page_cover_image_id
        ? Media::find($pageSetting->trek_page_cover_image_id)
        : null;
    $heroEyebrow = $locale === 'fr' ? $pageSetting->trek_page_title_up_fr : $pageSetting->trek_page_title_up_en;
    $heroTitle = $locale === 'fr' ? $pageSetting->trek_page_main_title_fr : $pageSetting->trek_page_main_title_en;
    $heroSubtitle = $locale === 'fr' ? $pageSetting->trek_page_content_fr : $pageSetting->trek_page_content_en;

    // Build flat trek list with category metadata (for filter chips + grid)
    $categories = [];
    $totalCount = 0;
    foreach ($allTreks as $cat) {
        $count = $cat->treks->count();
        if ($count > 0) {
            $categories[] = ['id' => 'cat-' . $cat->id, 'name' => $cat->name, 'count' => $count];
            $totalCount += $count;
        }
    }
@endphp

<x-website-layout>

    <x-listing.hero
        :image="$heroImage"
        :eyebrow="$heroEyebrow ?: __('listing.treks_eyebrow')"
        :title="$heroTitle ?: __('listing.treks_title')"
        :subtitle="$heroSubtitle"
        :count="$totalCount . ' ' . __('footer.treks')"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.treks')],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            <x-listing.filter-chips
                target-id="treks-grid"
                :categories="$categories"
            />

            <div id="treks-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($allTreks as $cat)
                    @foreach ($cat->treks as $trek)
                        <div data-category="cat-{{ $cat->id }}">
                            <x-listing.card
                                :href="route('show_trek', ['locale' => $locale, 'id' => $trek->id])"
                                :image="$trek->coverImage"
                                :eyebrow="$cat->name"
                                :title="$trek->title"
                                :duration="$trek->duration"
                                :altitude="$trek->highest_altitude"
                                :difficulty="$trek->trek_difficulty"
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
