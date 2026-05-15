@props(['item'])

@php
    $itineraryIcons = [
        'flight'       => 'icon-[material-symbols-light--flight-takeoff]',
        'drive'        => 'icon-[material-symbols-light--directions-bus-outline]',
        'trek'         => 'icon-[material-symbols-light--hiking-rounded]',
        'trek-hours'   => 'icon-[tabler--clock]',
        'rest'         => 'icon-[material-symbols-light--airline-seat-flat]',
        'helicopter'   => 'icon-[material-symbols-light--helicopter-outline]',
        'accomodation' => 'icon-[material-symbols-light--king-bed-outline-sharp]',
        'himalaya'     => 'icon-[mingcute--mountain-2-line]',
        'altitude'     => 'icon-[tabler--arrow-up]',
        'others'       => 'icon-[tabler--dots]',
    ];
@endphp

@if ($item->itineraries->isNotEmpty())
    <section id="itineraries" class="scroll-mt-28">
        <header class="mb-7">
            <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                {{ __('show-page.itinerary') }}
            </p>
            <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                Your day-by-day route
            </h2>
        </header>

        <div class="accordion overflow-hidden rounded-lg border border-ink/10 bg-white/40 divide-y divide-ink/10">
            @foreach ($item->itineraries as $idx => $itinerary)
                @if (!empty($itinerary->title))
                    <div class="accordion-item" id="itinerary-{{ $itinerary->id }}">
                        <button
                            class="accordion-toggle group flex w-full items-center justify-between gap-4 px-5 py-4 text-left transition hover:bg-ink/[0.02]"
                            aria-controls="itinerary-{{ $itinerary->id }}-collapse"
                            aria-expanded="false">
                            <span class="flex items-center gap-4">
                                <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-full bg-forest/10 text-[12px] font-semibold text-forest">
                                    {{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <span class="font-display text-base md:text-lg font-medium text-ink">
                                    {{ $itinerary->title }}
                                </span>
                            </span>
                            <span class="icon-[tabler--chevron-down] size-5 shrink-0 text-ink/40 accordion-item-active:rotate-180 transition-transform duration-300"></span>
                        </button>

                        <div id="itinerary-{{ $itinerary->id }}-collapse"
                             class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="itinerary-{{ $itinerary->id }}" role="region">
                            <div class="px-5 pb-5 pt-1 space-y-4">
                                @foreach ($itinerary->itineraryDetails as $detail)
                                    @php
                                        $type = $detail->type->value;
                                        $icon = $itineraryIcons[$type] ?? 'icon-[tabler--help-circle]';
                                    @endphp
                                    <div class="flex gap-3">
                                        <span class="mt-0.5 inline-flex size-7 shrink-0 items-center justify-center rounded-full bg-terracotta/10 text-terracotta">
                                            <span class="{{ $icon }} size-4" aria-hidden="true"></span>
                                        </span>
                                        <div class="flex-1">
                                            <p class="text-[13px] font-semibold uppercase tracking-wide text-ink/70">
                                                {{ $detail->type->getLabel() }}
                                            </p>
                                            <p class="mt-1 text-[15px] leading-relaxed text-ink/85">
                                                {{ $detail->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif
