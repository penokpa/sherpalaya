@props([
    'bookingFor',           // model — must implement getKey() + getWhatsappUrl()
    'altitude' => null,
    'duration' => null,
    'difficulty' => null,
    'startPoint' => null,
    'endPoint' => null,
    'season' => null,
    'grade' => null,
    'primaryCta' => null,   // override label e.g. 'Inquire' for expeditions
    'showBooking' => true,  // false = inquire-only (expeditions)
])

@php
    $difficultyLabel = $difficulty instanceof \BackedEnum ? $difficulty->value : $difficulty;
    $modalIdBase = 'detail-' . class_basename($bookingFor) . '-' . $bookingFor->getKey();
    $primaryLabel = $primaryCta ?? __('show-page.book');
    $stats = collect([
        ['icon' => 'tabler--mountain', 'label' => __('show-page.altitude') ?? 'Altitude', 'value' => $altitude ? number_format((int) $altitude) . ' m' : null],
        ['icon' => 'tabler--clock',    'label' => __('show-page.duration'),               'value' => $duration],
        ['icon' => 'tabler--flame',    'label' => __('show-page.difficulty'),             'value' => $difficultyLabel ? ucfirst(str_replace('_', ' ', $difficultyLabel)) : null],
        ['icon' => 'tabler--map-pin',  'label' => __('show-page.starts') ?? 'Starts',     'value' => $startPoint],
        ['icon' => 'tabler--flag',     'label' => __('show-page.ends') ?? 'Ends',         'value' => $endPoint],
        ['icon' => 'tabler--calendar', 'label' => __('show-page.best-time') ?? 'Best season', 'value' => $season],
    ])->filter(fn($s) => !empty($s['value']));
@endphp

<aside class="rounded-2xl bg-surface ring-1 ring-hairline shadow-sm overflow-hidden">

    {{-- Quick facts list --}}
    @if ($stats->isNotEmpty())
        <dl class="divide-y divide-hairline">
            @foreach ($stats as $stat)
                <div class="flex items-start gap-3 px-6 py-4">
                    <span class="icon-[{{ $stat['icon'] }}] size-5 mt-0.5 text-terracotta shrink-0"></span>
                    <div class="min-w-0 flex-1">
                        <dt class="text-[11px] font-semibold uppercase tracking-[0.14em] text-ink-muted">{{ $stat['label'] }}</dt>
                        <dd class="mt-0.5 text-[15px] font-medium text-ink">{{ $stat['value'] }}</dd>
                    </div>
                </div>
            @endforeach
        </dl>
    @endif

    {{-- CTAs --}}
    <div class="border-t border-hairline p-6 space-y-3 bg-canvas/50">
        @if ($showBooking)
            <button type="button"
                    aria-haspopup="dialog" aria-expanded="false"
                    aria-controls="{{ $modalIdBase }}-book"
                    data-overlay="#{{ $modalIdBase }}-book"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-terracotta px-6 py-3.5 text-[14px] font-semibold text-white transition hover:bg-terracotta-hover">
                {{ $primaryLabel }}
                <span class="icon-[tabler--arrow-right] size-4"></span>
            </button>
        @endif

        <button type="button"
                aria-haspopup="dialog" aria-expanded="false"
                aria-controls="{{ $modalIdBase }}-inquire"
                data-overlay="#{{ $modalIdBase }}-inquire"
                class="w-full inline-flex items-center justify-center gap-2 rounded-full border border-forest bg-transparent px-6 py-3.5 text-[14px] font-semibold text-forest transition hover:bg-forest hover:text-canvas">
            {{ __('home.cta_sherpa') }}
        </button>

        @if (method_exists($bookingFor, 'getWhatsappUrl'))
            <a href="{{ $bookingFor->getWhatsappUrl() }}" target="_blank" rel="noopener"
               class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-canvas px-6 py-3 text-[13px] font-medium text-ink-muted transition hover:text-forest">
                <span class="icon-[tabler--brand-whatsapp] size-4"></span>
                WhatsApp
            </a>
        @endif
    </div>
</aside>

{{-- Booking + inquiry modals (reuse existing booking form markup) --}}
@if ($showBooking)
    @push('modals')
        @include('components.detail.partials.booking-modal', [
            'modalId' => $modalIdBase . '-book',
            'bookingFor' => $bookingFor,
            'submitUrl' => '/' . app()->currentLocale() . '/bookings/booking',
            'title' => __('show-page.book'),
            'type' => 'booking',
        ])
    @endpush
@endif

@push('modals')
    @include('components.detail.partials.booking-modal', [
        'modalId' => $modalIdBase . '-inquire',
        'bookingFor' => $bookingFor,
        'submitUrl' => '/' . app()->currentLocale() . '/bookings/inquiry',
        'title' => __('show-page.inquire'),
        'type' => 'inquiry',
    ])
@endpush
