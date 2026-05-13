@php
    $items = [
        ['icon' => 'tabler--mountain',          'title' => __('home.why_1_title'), 'desc' => __('home.why_1_desc')],
        ['icon' => 'tabler--calendar-stats',    'title' => __('home.why_2_title'), 'desc' => __('home.why_2_desc')],
        ['icon' => 'tabler--users-group',       'title' => __('home.why_3_title'), 'desc' => __('home.why_3_desc')],
        ['icon' => 'tabler--flag-3',            'title' => __('home.why_4_title'), 'desc' => __('home.why_4_desc')],
    ];
@endphp

<section class="bg-forest text-canvas">
    <div class="mx-auto max-w-7xl px-6 py-20 lg:py-28 lg:px-12">
        <div class="mb-12 max-w-3xl">
            <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">{{ __('home.why_eyebrow') }}</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-canvas">
                {{ __('home.why_title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-x-12 gap-y-10 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($items as $item)
                <div class="border-t border-canvas/15 pt-6">
                    <span class="icon-[{{ $item['icon'] }}] size-7 text-terracotta-100 mb-5 block"></span>
                    <h3 class="font-display text-xl font-medium tracking-tightish mb-3">{{ $item['title'] }}</h3>
                    <p class="text-[15px] leading-relaxed text-canvas/80">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
