@props(['item'])

@if (!empty($item->description))
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
            {!! $item->description !!}
        </article>
        <x-read-more :componentId="$blockId" />
    </section>
@endif
