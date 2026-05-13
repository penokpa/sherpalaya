@php
    use App\Models\OurSherpa;

    // Surface the actual people behind Sherpalaya as the differentiator.
    // Falls back gracefully if seed data is empty.
    $founders = OurSherpa::with('profilePicture')
        ->orderBy('id')
        ->limit(2)
        ->get();
@endphp

<section class="bg-forest text-canvas">
    <div class="mx-auto max-w-7xl px-6 py-20 lg:py-28 lg:px-12">

        {{-- Header --}}
        <div class="mb-14 flex flex-col items-start gap-4 md:flex-row md:items-end md:justify-between">
            <div class="max-w-3xl">
                <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">{{ __('home.why_eyebrow') }}</p>
                <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-canvas">
                    {{ __('home.why_title') }}
                </h2>
                <p class="mt-4 text-canvas/80 max-w-[55ch] text-[15px] leading-relaxed">
                    Sherpalaya is led by two Solukhumbu-born guides whose lives have been spent on the trails you'll walk. The people you'll meet on day one are the same people who built this company.
                </p>
            </div>
            <a href="{{ url('/' . app()->currentLocale() . '/our-team') }}"
               class="inline-flex items-center gap-1.5 text-sm font-semibold text-canvas hover:text-terracotta-100 transition">
                Meet the whole team
                <span class="icon-[tabler--arrow-right] size-4"></span>
            </a>
        </div>

        {{-- Founders --}}
        @if ($founders->isNotEmpty())
            <div class="grid grid-cols-1 gap-10 md:gap-12 lg:grid-cols-2 mb-20">
                @foreach ($founders as $person)
                    @php
                        $highlights = match ($person->id) {
                            1 => [
                                ['icon' => 'tabler--mountain', 'text' => 'Everest summit ×7'],
                                ['icon' => 'tabler--flag', 'text' => 'Makalu · Cho Oyu ×5 · Dhaulagiri · Manaslu'],
                                ['icon' => 'tabler--world', 'text' => 'Mont Blanc · Gasherbrum · Shisha Pangma'],
                                ['icon' => 'tabler--message-language', 'text' => 'Nepali · English · French'],
                            ],
                            2 => [
                                ['icon' => 'tabler--briefcase', 'text' => 'Founder, Sherpalaya Trek & Sherpa Kitchen'],
                                ['icon' => 'tabler--book', 'text' => "Master's in Social Work · BBS"],
                                ['icon' => 'tabler--users-group', 'text' => 'Community development at Concern Worldwide & GIZ'],
                                ['icon' => 'tabler--message-language', 'text' => 'Nepali · English · French'],
                            ],
                            default => [],
                        };
                        $img = $person->profilePicture?->url;
                        $titleEn = is_string($person->title) ? $person->title : ($person->getTranslation('title', 'en') ?? '');
                    @endphp

                    <article class="group">
                        <a href="{{ url('/' . app()->currentLocale() . '/our-team/' . $person->id) }}"
                           class="block overflow-hidden rounded-2xl bg-canvas/5 ring-1 ring-canvas/10 transition hover:bg-canvas/10 hover:ring-canvas/20">
                            <div class="flex flex-col sm:flex-row gap-6 p-6">
                                <div class="shrink-0">
                                    <div class="size-28 sm:size-32 overflow-hidden rounded-2xl bg-canvas/10 ring-1 ring-canvas/15">
                                        @if ($img)
                                            <img loading="lazy" decoding="async" src="{{ $img }}" alt="{{ $person->name }}"
                                                 class="size-full object-cover transition duration-500 group-hover:scale-105" />
                                        @endif
                                    </div>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta-100">{{ $titleEn }}</p>
                                    <h3 class="mt-1 font-display text-2xl font-medium tracking-tightish text-canvas">{{ $person->name }}</h3>

                                    <ul class="mt-5 space-y-2.5">
                                        @foreach ($highlights as $h)
                                            <li class="flex items-start gap-2.5 text-[14px] text-canvas/85 leading-snug">
                                                <span class="icon-[{{ $h['icon'] }}] size-4 mt-0.5 text-terracotta-100 shrink-0"></span>
                                                <span>{{ $h['text'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @endif

        {{-- Brand differentiator tiles --}}
        <div class="grid grid-cols-1 gap-x-12 gap-y-10 md:grid-cols-2 lg:grid-cols-4 border-t border-canvas/15 pt-12">
            @php
                $items = [
                    ['icon' => 'tabler--mountain',          'title' => __('home.why_1_title'), 'desc' => __('home.why_1_desc')],
                    ['icon' => 'tabler--calendar-stats',    'title' => __('home.why_2_title'), 'desc' => __('home.why_2_desc')],
                    ['icon' => 'tabler--users-group',       'title' => __('home.why_3_title'), 'desc' => __('home.why_3_desc')],
                    ['icon' => 'tabler--flag-3',            'title' => __('home.why_4_title'), 'desc' => __('home.why_4_desc')],
                ];
            @endphp
            @foreach ($items as $item)
                <div>
                    <span class="icon-[{{ $item['icon'] }}] size-7 text-terracotta-100 mb-4 block"></span>
                    <h3 class="font-display text-xl font-medium tracking-tightish mb-2">{{ $item['title'] }}</h3>
                    <p class="text-[14px] leading-relaxed text-canvas/75">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
