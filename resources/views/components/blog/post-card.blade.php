@props([
    'post',
    'variant' => 'default',  // 'default' | 'featured' | 'compact'
])

@php
    $locale = app()->currentLocale();
    $href = url('/' . $locale . '/blog/' . $post->slug);
    $imageUrl = optional($post->coverImage)->url ?: asset('photos/basecamp.JPG');
    $publishedLabel = optional($post->published_at)->translatedFormat('M j, Y');
    $readingMinutes = max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 220));
@endphp

@if ($variant === 'featured')
    <a href="{{ $href }}"
       class="group grid overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl md:grid-cols-2">
        <div class="relative aspect-[4/3] md:aspect-auto md:h-full overflow-hidden">
            <img loading="lazy" decoding="async" src="{{ $imageUrl }}" alt="{{ $post->title }}"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
            <span class="absolute top-4 left-4 inline-flex items-center rounded-full bg-terracotta px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-white">
                {{ __('blog.featured_label') }}
            </span>
        </div>
        <div class="flex flex-col justify-center p-8 lg:p-10">
            <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('blog.eyebrow') }} · {{ $publishedLabel }}
            </p>
            <h3 class="font-display text-2xl md:text-3xl font-medium leading-snug tracking-tighter-display text-ink">
                {{ $post->title }}
            </h3>
            @if (!empty($post->excerpt))
                <p class="mt-4 text-[15px] leading-relaxed text-ink/80">{{ $post->excerpt }}</p>
            @endif
            <div class="mt-6 flex items-center gap-3 text-[13px]">
                <span class="font-semibold text-forest group-hover:text-terracotta transition">
                    {{ __('blog.read_more') }} →
                </span>
                <span class="text-ink/50">·</span>
                <span class="text-ink/60">{{ __('blog.min_read', ['minutes' => $readingMinutes]) }}</span>
            </div>
        </div>
    </a>
@else
    <a href="{{ $href }}"
       class="group flex flex-col overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
        <div class="relative aspect-[4/3] overflow-hidden">
            <img loading="lazy" decoding="async" src="{{ $imageUrl }}" alt="{{ $post->title }}"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
        </div>
        <div class="flex flex-1 flex-col p-6">
            <p class="mb-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta">
                {{ $publishedLabel }}
            </p>
            <h3 class="font-display text-xl font-medium leading-snug tracking-tightish text-ink">
                {{ $post->title }}
            </h3>
            @if (!empty($post->excerpt))
                <p class="mt-3 text-[14px] leading-relaxed text-ink/75 line-clamp-3">
                    {{ $post->excerpt }}
                </p>
            @endif
            <div class="mt-auto pt-5 flex items-center justify-between text-[13px]">
                <span class="font-semibold text-forest group-hover:text-terracotta transition">
                    {{ __('blog.read_more') }} →
                </span>
                <span class="text-ink/55">{{ __('blog.min_read', ['minutes' => $readingMinutes]) }}</span>
            </div>
        </div>
    </a>
@endif
