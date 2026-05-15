@props(['item'])

@if (count($item->keyHighlights) > 0)
    <section id="key_highlights" class="scroll-mt-28">
        <header class="mb-7">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('show-page.key') }}
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                What makes this journey stand out
            </h2>
        </header>

        <ul class="space-y-5">
            @foreach ($item->keyHighlights as $highlight)
                <li class="flex gap-4 rounded-lg border border-ink/10 bg-white/40 p-5">
                    <span class="mt-1 inline-flex size-8 shrink-0 items-center justify-center rounded-full bg-terracotta/10 text-terracotta">
                        <span class="icon-[tabler--mountain] size-4" aria-hidden="true"></span>
                    </span>
                    <div>
                        <h3 class="font-display text-lg font-medium text-ink leading-snug">
                            {{ $highlight->title }}
                        </h3>
                        <p class="mt-1.5 text-[15px] leading-relaxed text-ink/80">
                            {{ $highlight->description }}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif
