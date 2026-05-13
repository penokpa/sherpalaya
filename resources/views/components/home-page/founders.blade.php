@php
    use App\Models\OurSherpa;

    $founders = OurSherpa::with('profilePicture')->orderBy('id')->limit(2)->get();

    // Curated highlights per founder. Keyed by id; safe fallback if no match.
    $founderHighlights = [
        1 => [
            'tagline' => "Seven Everest summits. Forty years on the mountain. One of Nepal's most decorated guides.",
            'chips' => ['Everest ×7', 'Cho Oyu ×5', 'Makalu', 'Mont Blanc', 'EN · FR · NP'],
        ],
        2 => [
            'tagline' => "Mountaineer, social worker, restaurateur. The man who built Sherpalaya into what it is today.",
            'chips' => ['Founder', "Master's in Social Work", 'GIZ · Concern Worldwide', 'EN · FR · NP'],
        ],
    ];
@endphp

@if ($founders->isNotEmpty())
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:py-28 lg:px-12">

            {{-- Section header --}}
            <div class="mb-14 max-w-3xl">
                <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">Meet your guides</p>
                <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                    Born for these mountains.
                </h2>
                <p class="mt-4 text-ink-muted max-w-[55ch] text-[15px] leading-relaxed">
                    The two Solukhumbu-born guides who built Sherpalaya. The people you meet on day one are the same people who founded this company.
                </p>
            </div>

            {{-- Founder rows — alternating photo / text --}}
            <div class="space-y-16 md:space-y-24">
                @foreach ($founders as $i => $person)
                    @php
                        $isReversed = $loop->index % 2 === 1;
                        $img = $person->profilePicture?->url;
                        $titleEn = is_string($person->title) ? $person->title : ($person->getTranslation('title', 'en') ?? '');
                        $h = $founderHighlights[$person->id] ?? ['tagline' => null, 'chips' => []];
                    @endphp
                    <article class="grid grid-cols-1 gap-8 md:grid-cols-12 md:gap-12 items-center">
                        {{-- Photo --}}
                        <div class="md:col-span-5 {{ $isReversed ? 'md:order-2' : '' }}">
                            <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-hairline">
                                @if ($img)
                                    <img loading="lazy" decoding="async" src="{{ $img }}" alt="{{ $person->name }}"
                                         class="absolute inset-0 h-full w-full object-cover" />
                                @endif
                            </div>
                        </div>

                        {{-- Text --}}
                        <div class="md:col-span-7 {{ $isReversed ? 'md:order-1 md:pr-8' : 'md:pl-4' }}">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-terracotta">{{ $titleEn }}</p>
                            <h3 class="mt-2 font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">{{ $person->name }}</h3>

                            @if ($h['tagline'])
                                <p class="mt-5 font-display text-[20px] md:text-[22px] leading-snug text-ink/85 max-w-[36ch]">
                                    "{{ $h['tagline'] }}"
                                </p>
                            @endif

                            @if (!empty($h['chips']))
                                <div class="mt-7 flex flex-wrap gap-2">
                                    @foreach ($h['chips'] as $chip)
                                        <span class="inline-flex items-center rounded-full border border-hairline bg-surface px-3.5 py-1.5 text-[12px] font-medium text-ink-muted">
                                            {{ $chip }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-8">
                                <a href="{{ url('/' . app()->currentLocale() . '/our-team/' . $person->id) }}"
                                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-forest hover:text-terracotta transition">
                                    Read {{ explode(' ', trim($person->name))[1] ?? 'his' }}'s story
                                    <span class="icon-[tabler--arrow-right] size-4"></span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Meet the team CTA --}}
            <div class="mt-16 md:mt-20 text-center">
                <a href="{{ url('/' . app()->currentLocale() . '/our-team') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-forest bg-transparent px-7 py-3.5 text-[14px] font-medium text-forest transition hover:bg-forest hover:text-canvas">
                    Meet the whole team
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
            </div>
        </div>
    </section>
@endif
