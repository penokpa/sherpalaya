@props(['item'])

@php
    // Strip the service-tiers marker block out of the body — it renders in its
    // own section below so it doesn't get hidden behind the "Read More" line clamp.
    $description = (string) ($item->description ?? '');
    $description = preg_replace('#<!-- service-tiers:start -->.*?<!-- service-tiers:end -->#s', '', $description);
    $description = trim((string) $description);
@endphp

@if (!empty($description))
    @php $blockId = 'item-description-' . strtolower(class_basename($item)) . '-' . $item->id; @endphp
    <section class="scroll-mt-28">
        <header class="mb-7">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('show-page.overview') }}
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                About this journey
            </h2>
        </header>
        <article id="{{ $blockId }}"
                 class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans
                        prose-headings:font-display prose-headings:text-ink prose-headings:font-medium
                        prose-a:text-forest hover:prose-a:text-terracotta">
            {!! $description !!}
        </article>
        <x-read-more :componentId="$blockId" />
    </section>
@endif
