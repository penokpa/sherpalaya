@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $pageSetting->expedition_page_cover_image_id
        ? Media::find($pageSetting->expedition_page_cover_image_id)
        : null;
    $heroEyebrow = $locale === 'fr' ? $pageSetting->expedition_page_title_up_fr : $pageSetting->expedition_page_title_up_en;
    $heroTitle = $locale === 'fr' ? $pageSetting->expedition_page_main_title_fr : $pageSetting->expedition_page_main_title_en;
    $heroSubtitle = $locale === 'fr' ? $pageSetting->expedition_page_content_fr : $pageSetting->expedition_page_content_en;

    $totalCount = $categories->sum(fn ($c) => $c->expeditions->count());
@endphp

<x-website-layout :overHero="true">

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

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($categories as $cat)
                    @php
                        // Cover preference: explicit category cover > first expedition's cover > fallback
                        $coverUrl = optional($cat->coverImage)->url
                            ?? optional($cat->expeditions->first()?->coverImage)->url
                            ?? asset('photos/trek1.JPG');
                        $isFlagship = $cat->slug === 'everest-expeditions';
                    @endphp
                    <a href="{{ route('expedition.category', ['locale' => $locale, 'slug' => $cat->slug]) }}"
                       @class([
                           'group block overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl',
                           'sm:col-span-2 lg:col-span-2' => $isFlagship,
                       ])>
                        <div @class([
                            'relative overflow-hidden',
                            'aspect-[16/9]' => $isFlagship,
                            'aspect-[4/3]' => ! $isFlagship,
                        ])>
                            <img loading="lazy" decoding="async" src="{{ $coverUrl }}" alt="{{ $cat->name }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                            @if ($isFlagship)
                                <span class="absolute top-4 left-4 inline-flex items-center rounded-full bg-terracotta px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-white shadow">
                                    Flagship · Sherpalaya's home turf
                                </span>
                            @endif
                            <span class="absolute top-4 right-4 inline-flex items-center rounded-full bg-ink/75 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-white backdrop-blur-sm">
                                {{ $cat->expeditions->count() }} {{ Str::plural('expedition', $cat->expeditions->count()) }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h2 @class([
                                'font-display font-medium leading-snug tracking-tightish text-ink',
                                'text-3xl' => $isFlagship,
                                'text-2xl' => ! $isFlagship,
                            ])>
                                {{ $cat->name }}
                            </h2>
                            @if ($cat->description)
                                <p class="mt-3 text-[14px] leading-relaxed text-ink-muted line-clamp-4">
                                    {!! $cat->description !!}
                                </p>
                            @endif
                            <p class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-semibold text-forest group-hover:text-terracotta transition">
                                Explore {{ $cat->name }}
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
