@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $pageSetting->team_page_cover_image_id ? Media::find($pageSetting->team_page_cover_image_id) : null;
    $heroEyebrow = $locale === 'fr' ? $pageSetting->team_page_title_up_fr : $pageSetting->team_page_title_up_en;
    $heroTitle = $locale === 'fr' ? $pageSetting->team_page_main_title_fr : $pageSetting->team_page_main_title_en;
    $heroSubtitle = $locale === 'fr' ? $pageSetting->team_page_title_down_fr : $pageSetting->team_page_title_down_en;
    $contentTitle = $locale === 'fr' ? $pageSetting->team_page_content_title_fr : $pageSetting->team_page_content_title_en;
    $content = $locale === 'fr' ? $pageSetting->team_page_content_fr : $pageSetting->team_page_content_en;
@endphp

<x-website-layout :overHero="true">
    <x-listing.hero
        :image="$heroImage"
        fallback="photos/oursherpa1.jpg"
        :eyebrow="$heroEyebrow ?: 'Our Team'"
        :title="$heroTitle ?: 'The people behind every step.'"
        :subtitle="$heroSubtitle"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.our-team')],
    ]" />

    @if ($contentTitle || $content)
        <section class="bg-canvas">
            <div class="mx-auto max-w-7xl px-6 py-16 lg:py-20 lg:px-12">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
                    @if ($contentTitle)
                        <div>
                            <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink max-w-[16ch]">
                                {{ $contentTitle }}
                            </h2>
                        </div>
                    @endif
                    @if ($content)
                        <div class="lg:col-span-2 prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans">
                            {!! nl2br(e($content)) !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 pb-20 lg:px-12">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($allSherpas as $sherpa)
                    @php
                        $sherpaTitle = is_string($sherpa->title) ? $sherpa->title : ($sherpa->getTranslation('title', $locale) ?? $sherpa->getTranslation('title', 'en'));
                    @endphp
                    <a href="{{ route('show_team_member', ['id' => $sherpa->id, 'locale' => $locale]) }}"
                       class="group block overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative aspect-[3/4] overflow-hidden bg-hairline">
                            <img loading="lazy" decoding="async"
                                 src="{{ $sherpa->profilePicture->url ?? asset('photos/P1030127.JPG') }}"
                                 alt="{{ $sherpa->name }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta">{{ $sherpaTitle }}</p>
                            <h3 class="mt-1 font-display text-xl font-medium tracking-tightish text-ink leading-snug">{{ $sherpa->name }}</h3>
                            <span class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-semibold text-forest group-hover:text-terracotta transition">
                                Read story
                                <span class="icon-[tabler--arrow-right] size-4"></span>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
