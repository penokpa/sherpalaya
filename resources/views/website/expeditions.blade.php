@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $pageSetting->expedition_page_cover_image_id
        ? Media::find($pageSetting->expedition_page_cover_image_id)
        : null;
    $heroEyebrow = $locale === 'fr' ? $pageSetting->expedition_page_title_up_fr : $pageSetting->expedition_page_title_up_en;
    $heroTitle = $locale === 'fr' ? $pageSetting->expedition_page_main_title_fr : $pageSetting->expedition_page_main_title_en;
    $heroSubtitle = $locale === 'fr' ? $pageSetting->expedition_page_content_fr : $pageSetting->expedition_page_content_en;

    $categories = [];
    $totalCount = 0;
    foreach ($allExpeditions as $cat) {
        $count = $cat->expeditions->count();
        if ($count > 0) {
            $categories[] = ['id' => 'cat-' . $cat->id, 'name' => $cat->name, 'count' => $count];
            $totalCount += $count;
        }
    }
@endphp

<x-website-layout>

    <x-listing.hero
        :image="$heroImage"
        fallback="photos/trek1.JPG"
        :eyebrow="$heroEyebrow ?: __('listing.expeditions_eyebrow')"
        :title="$heroTitle ?: __('listing.expeditions_title')"
        :subtitle="$heroSubtitle"
        :count="$totalCount . ' ' . __('footer.expeditions')"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.expeditions')],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            <x-listing.filter-chips
                target-id="expeditions-grid"
                :categories="$categories"
            />

            <div id="expeditions-grid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($allExpeditions as $cat)
                    @foreach ($cat->expeditions as $exp)
                        <div data-category="cat-{{ $cat->id }}">
                            <x-listing.card
                                :href="route('show_expedition', ['locale' => $locale, 'id' => $exp->id])"
                                :image="$exp->coverImage"
                                fallback="photos/trek1.JPG"
                                :eyebrow="$cat->name"
                                :title="$exp->title"
                                :duration="$exp->duration"
                                :altitude="$exp->highest_altitude"
                                :difficulty="$exp->expedition_difficulty"
                                :cta="__('listing.inquire')"
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
