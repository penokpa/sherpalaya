@props(['item'])

@if (!empty($item->essentialTips) && count($item->essentialTips) > 0)
    <section id="essential_tips" class="scroll-mt-28">
        <header class="mb-7">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('show-page.tips') }}
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                Things worth knowing before you go
            </h2>
        </header>

        <div class="space-y-5">
            @foreach ($item->essentialTips as $tip)
                <div class="border-l-2 border-terracotta/40 pl-5">
                    <h3 class="font-display text-lg font-medium text-ink leading-snug">
                        {{ $tip->title }}
                    </h3>
                    <p class="mt-2 text-[15px] leading-relaxed text-ink/80">
                        {{ $tip->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>
@endif
