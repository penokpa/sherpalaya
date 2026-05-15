@php
    use App\Models\OurSherpa;

    $founders = OurSherpa::with('profilePicture')->orderBy('id')->limit(2)->get();

    // Curated highlights per founder. Keyed by id; safe fallback if no match.
    $founderHighlights = [
        1 => [
            'tagline' => "Seven Everest summits. Forty years on the mountain.",
            'chips' => ['Everest ×7', 'Cho Oyu ×5', 'EN · FR · NP'],
        ],
        2 => [
            'tagline' => "Mountaineer, social worker, restaurateur — the man who built Sherpalaya.",
            'chips' => ['Founder', "Master's in Social Work", 'EN · FR · NP'],
        ],
    ];
@endphp

@if ($founders->isNotEmpty())
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            {{-- Section header --}}
            <div class="mb-10 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">Meet your guides</p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                        Born for these mountains.
                    </h2>
                </div>
                <a href="{{ url('/' . app()->currentLocale() . '/our-team') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-forest hover:text-terracotta transition">
                    Meet the whole team
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
            </div>

            {{-- Founder cards — side-by-side, compact --}}
            <div class="grid gap-7 md:grid-cols-2">
                @foreach ($founders as $person)
                    @php
                        $img = $person->profilePicture?->url;
                        $titleEn = is_string($person->title) ? $person->title : ($person->getTranslation('title', 'en') ?? '');
                        $h = $founderHighlights[$person->id] ?? ['tagline' => null, 'chips' => []];
                    @endphp
                    <article class="group flex flex-col overflow-hidden rounded-2xl bg-surface shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        @if ($img)
                            <div class="relative aspect-[16/10] overflow-hidden bg-hairline">
                                <img loading="lazy" decoding="async" src="{{ $img }}" alt="{{ $person->name }}"
                                     class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                            </div>
                        @endif

                        <div class="flex flex-1 flex-col p-6 lg:p-7">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-terracotta">{{ $titleEn }}</p>
                            <h3 class="mt-1 font-display text-xl md:text-2xl font-medium leading-snug tracking-tightish text-ink">
                                {{ $person->name }}
                            </h3>

                            @if ($h['tagline'])
                                <p class="mt-3 text-[15px] leading-relaxed text-ink/80">
                                    {{ $h['tagline'] }}
                                </p>
                            @endif

                            @if (!empty($h['chips']))
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($h['chips'] as $chip)
                                        <span class="inline-flex items-center rounded-full border border-hairline bg-canvas px-3 py-1 text-[11px] font-medium text-ink-muted">
                                            {{ $chip }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-auto pt-5">
                                <a href="{{ url('/' . app()->currentLocale() . '/our-team/' . $person->id) }}"
                                   class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-forest group-hover:text-terracotta transition">
                                    Read {{ explode(' ', trim($person->name))[1] ?? 'their' }}'s story
                                    <span class="icon-[tabler--arrow-right] size-4"></span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
