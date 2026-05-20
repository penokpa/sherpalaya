@php
    $locale = app()->currentLocale();
    $coverUrl = optional($post->coverImage)->url;
    $publishedLabel = optional($post->published_at)->translatedFormat('F j, Y');
    $readingMinutes = max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 220));
    $seoData = method_exists($post, 'getDynamicSEOData') ? $post->getDynamicSEOData() : null;
@endphp

<x-website-layout :seoData="$seoData">

    {{-- Editorial hero — cover image as a contained art figure, not a full-bleed photo --}}
    <header class="relative bg-canvas pt-14 lg:pt-20">
        <div class="mx-auto max-w-3xl px-6">
            <p class="mb-4 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('blog.eyebrow') }} · {{ $publishedLabel }}
            </p>
            <h1 class="font-display text-[clamp(2rem,4.5vw,3.5rem)] font-medium leading-[1.08] tracking-tighter-display text-ink">
                {{ $post->title }}
            </h1>
            @if (!empty($post->excerpt))
                <p class="mt-5 text-lg leading-relaxed text-ink/75">{{ $post->excerpt }}</p>
            @endif
            <div class="mt-6 flex items-center gap-4 text-[13px] text-ink/60">
                <span class="inline-flex items-center gap-1.5">
                    <span class="icon-[tabler--user] size-4"></span>
                    Sherpalaya Team
                </span>
                <span>·</span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="icon-[tabler--clock] size-4"></span>
                    {{ __('blog.min_read', ['minutes' => $readingMinutes]) }}
                </span>
            </div>
        </div>

        @if ($coverUrl)
            <figure class="mt-12 lg:mt-16">
                <div class="mx-auto max-w-5xl px-6">
                    <img src="{{ $coverUrl }}" alt="{{ $post->title }}"
                         class="h-[55vh] max-h-[600px] w-full rounded-2xl object-cover shadow-lg shadow-ink/10" />
                </div>
            </figure>
        @endif
    </header>

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('blog.eyebrow'), 'url' => url('/' . $locale . '/blog')],
        ['name' => $post->title],
    ]" />

    <main class="bg-canvas">
        <div class="mx-auto max-w-3xl px-6 py-14 lg:py-20">
            <article class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans
                            prose-headings:font-display prose-headings:text-ink prose-headings:font-medium prose-headings:tracking-tightish
                            prose-a:text-forest hover:prose-a:text-terracotta
                            prose-blockquote:border-l-terracotta prose-blockquote:text-ink/80 prose-blockquote:not-italic
                            prose-img:rounded-xl">
                {!! $post->body !!}
            </article>

            <div class="mt-16 border-t border-ink/10 pt-8">
                <a href="{{ url('/' . $locale . '/blog') }}"
                   class="inline-flex items-center gap-2 text-[14px] font-semibold text-forest hover:text-terracotta transition">
                    <span class="icon-[tabler--arrow-left] size-4"></span>
                    {{ __('blog.back_to_blog') }}
                </a>
            </div>
        </div>

        @if ($related->count() > 0)
            <section class="bg-surface border-t border-ink/10">
                <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">
                    <header class="mb-8">
                        <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                            {{ __('blog.related') }}
                        </p>
                        <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                            Keep reading
                        </h2>
                    </header>
                    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($related as $relatedPost)
                            <x-blog.post-card :post="$relatedPost" />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>

    <x-whatsapp-icon />
</x-website-layout>
