@props(['item'])

@php
    $locale = app()->currentLocale();
    $costsInclude = array_filter($item->costs_include ?? [], fn ($c) => !is_null($c[$locale] ?? null));
    $costsExclude = array_filter($item->costs_exclude ?? [], fn ($c) => !is_null($c[$locale] ?? null));
@endphp

@if (!empty($costsInclude) || !empty($costsExclude))
    <section class="scroll-mt-28">
        <div class="grid gap-8 md:grid-cols-2">
            @if (!empty($costsInclude))
                <div id="costs_include" class="scroll-mt-28">
                    <header class="mb-5">
                        <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-forest">
                            {{ __('show-page.costs_include') }}
                        </p>
                        <h2 class="font-display text-xl md:text-2xl font-medium leading-tight tracking-tighter-display text-ink">
                            What's covered
                        </h2>
                    </header>
                    <ul class="space-y-3 rounded-lg border border-forest/15 bg-forest/[0.04] p-5">
                        @foreach ($costsInclude as $cost)
                            <li class="flex gap-3">
                                <span class="mt-0.5 inline-flex size-5 shrink-0 items-center justify-center rounded-full bg-forest text-white">
                                    <span class="icon-[tabler--check] size-3" aria-hidden="true"></span>
                                </span>
                                <p class="text-[15px] leading-relaxed text-ink/85">
                                    {{ $cost[$locale] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!empty($costsExclude))
                <div id="costs_exclude" class="scroll-mt-28">
                    <header class="mb-5">
                        <p class="mb-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                            {{ __('show-page.costs_exclude') }}
                        </p>
                        <h2 class="font-display text-xl md:text-2xl font-medium leading-tight tracking-tighter-display text-ink">
                            Not included
                        </h2>
                    </header>
                    <ul class="space-y-3 rounded-lg border border-terracotta/20 bg-terracotta/[0.04] p-5">
                        @foreach ($costsExclude as $cost)
                            <li class="flex gap-3">
                                <span class="mt-0.5 inline-flex size-5 shrink-0 items-center justify-center rounded-full bg-terracotta text-white">
                                    <span class="icon-[tabler--x] size-3" aria-hidden="true"></span>
                                </span>
                                <p class="text-[15px] leading-relaxed text-ink/85">
                                    {{ $cost[$locale] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endif
