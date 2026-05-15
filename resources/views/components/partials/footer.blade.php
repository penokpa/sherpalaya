@php
    $locale = app()->currentLocale();
    $companyName = $locale === 'fr' ? $companySetting->company_name_fr : $companySetting->company_name_en;
    $companyAddress = $locale === 'fr' ? $companySetting->company_address_fr : $companySetting->company_address_en;
    $companyEmail = $locale === 'fr' ? $companySetting->company_email_fr : $companySetting->company_email_en;
    $companyPhone = $locale === 'fr' ? $companySetting->company_contact_number_fr : $companySetting->company_contact_number_en;
@endphp

{{-- ============ Pre-footer CTA band (terracotta) ============ --}}
<section class="bg-terracotta text-white">
    <div class="mx-auto max-w-7xl px-6 py-14 lg:px-12 lg:py-16">
        <div class="flex flex-col items-start gap-8 md:flex-row md:items-center md:justify-between">
            <div class="max-w-2xl">
                <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.18em] opacity-85">
                    {{ __('footer.cta_eyebrow') }}
                </p>
                <h3 class="font-display text-3xl md:text-4xl font-medium leading-[1.1] tracking-tighter-display">
                    {{ __('footer.cta_title') }}
                </h3>
                <p class="mt-3 text-[15px] leading-relaxed opacity-90 max-w-[55ch]">
                    {{ __('footer.cta_desc') }}
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="/{{ $locale }}/contact"
                   class="inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-[14px] font-semibold text-terracotta transition hover:bg-canvas">
                    Plan Your Trip
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
                @if (!empty(config('services.whatsapp.number')))
                    <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 rounded-full border border-white/40 px-7 py-3.5 text-[14px] font-semibold text-white transition hover:bg-white/10">
                        <span class="icon-[tabler--brand-whatsapp] size-4"></span>
                        WhatsApp
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ============ Main footer ============ --}}
<footer class="bg-forest text-canvas">
    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-12 lg:py-20">

        <div class="grid grid-cols-1 gap-12 md:grid-cols-12 md:gap-10">

            {{-- Brand + contact --}}
            <div class="md:col-span-5">
                <a href="/{{ $locale }}/home" class="inline-flex items-center gap-3 no-underline">
                    <img src="{{ asset('photos/logo-mark-light.png') }}" alt="" aria-hidden="true" class="h-9 w-auto" />
                    <span class="flex flex-col leading-[1.15]">
                        <span class="font-display text-[22px] font-semibold tracking-tightish">Sherpalaya</span>
                        <span class="mt-1 text-[9px] font-semibold uppercase tracking-[0.18em] opacity-70 whitespace-nowrap">
                            Treks &amp; Expedition
                        </span>
                    </span>
                </a>
                <p class="mt-5 text-[14px] leading-relaxed text-canvas/75 max-w-[42ch]">
                    {{ __('footer.tagline') }}
                </p>

                <ul class="mt-8 space-y-3 text-[14px] text-canvas/85">
                    @if ($companyAddress)
                        <li class="flex items-start gap-3">
                            <span class="icon-[tabler--map-pin] size-4 mt-1 text-terracotta-100 shrink-0"></span>
                            <span>{{ $companyAddress }}</span>
                        </li>
                    @endif
                    @if ($companyEmail)
                        <li class="flex items-start gap-3">
                            <span class="icon-[tabler--mail] size-4 mt-1 text-terracotta-100 shrink-0"></span>
                            <a href="mailto:{{ $companyEmail }}" class="hover:text-terracotta-100 transition">{{ $companyEmail }}</a>
                        </li>
                    @endif
                    @if ($companyPhone)
                        <li class="flex items-start gap-3">
                            <span class="icon-[tabler--phone] size-4 mt-1 text-terracotta-100 shrink-0"></span>
                            <a href="tel:{{ preg_replace('/\s+/', '', $companyPhone) }}" class="hover:text-terracotta-100 transition">{{ $companyPhone }}</a>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Adventures --}}
            <nav class="md:col-span-2">
                <h6 class="mb-5 text-[11px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">
                    {{ __('footer.adventures') }}
                </h6>
                <ul class="space-y-3 text-[14px]">
                    <li><a href="/{{ $locale }}/expeditions" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.expeditions') }}</a></li>
                    <li><a href="/{{ $locale }}/treks" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.treks') }}</a></li>
                    <li><a href="/{{ $locale }}/tours" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.activities') }}</a></li>
                </ul>
            </nav>

            {{-- Company --}}
            <nav class="md:col-span-2">
                <h6 class="mb-5 text-[11px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">
                    {{ __('footer.company') }}
                </h6>
                <ul class="space-y-3 text-[14px]">
                    <li><a href="/{{ $locale }}/about_us" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.about-us') }}</a></li>
                    <li><a href="/{{ $locale }}/our-team" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.our-team') }}</a></li>
                    <li><a href="/{{ $locale }}/blog" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.journal') }}</a></li>
                    <li><a href="/{{ $locale }}/contact" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.contact') }}</a></li>
                </ul>
            </nav>

            {{-- Legal --}}
            <nav class="md:col-span-3">
                <h6 class="mb-5 text-[11px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">
                    {{ __('footer.legal') }}
                </h6>
                <ul class="space-y-3 text-[14px]">
                    <li><a href="/{{ $locale }}/terms-and-conditions" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.terms-of-use') }}</a></li>
                    <li><a href="/{{ $locale }}/privacy-policy" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.privacy-policy') }}</a></li>
                    <li><a href="/{{ $locale }}/cookie-policy" class="text-canvas/85 hover:text-canvas transition">{{ __('footer.cookie-policy') }}</a></li>
                </ul>

                {{-- Socials --}}
                <h6 class="mt-10 mb-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-terracotta-100">
                    {{ __('footer.follow-us') }}
                </h6>
                <div class="flex flex-wrap gap-2">
                    @if (!empty($companySetting->facebook_url))
                        <a href="{{ $companySetting->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook"
                           class="inline-flex size-9 items-center justify-center rounded-full border border-canvas/20 text-canvas/85 hover:border-canvas hover:text-canvas transition">
                            <span class="icon-[tabler--brand-facebook] size-4"></span>
                        </a>
                    @endif
                    @if (!empty($companySetting->instagram_url))
                        <a href="{{ $companySetting->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram"
                           class="inline-flex size-9 items-center justify-center rounded-full border border-canvas/20 text-canvas/85 hover:border-canvas hover:text-canvas transition">
                            <span class="icon-[tabler--brand-instagram] size-4"></span>
                        </a>
                    @endif
                    @if (!empty($companySetting->youtube_url))
                        <a href="{{ $companySetting->youtube_url }}" target="_blank" rel="noopener" aria-label="YouTube"
                           class="inline-flex size-9 items-center justify-center rounded-full border border-canvas/20 text-canvas/85 hover:border-canvas hover:text-canvas transition">
                            <span class="icon-[tabler--brand-youtube] size-4"></span>
                        </a>
                    @endif
                    @if (!empty($companySetting->tiktok_url))
                        <a href="{{ $companySetting->tiktok_url }}" target="_blank" rel="noopener" aria-label="TikTok"
                           class="inline-flex size-9 items-center justify-center rounded-full border border-canvas/20 text-canvas/85 hover:border-canvas hover:text-canvas transition">
                            <span class="icon-[tabler--brand-tiktok] size-4"></span>
                        </a>
                    @endif
                </div>
            </nav>
        </div>

        {{-- Bottom strip --}}
        <div class="mt-14 pt-8 border-t border-canvas/15 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <p class="text-[13px] text-canvas/65">
                {{ __('footer.copyright') }}
            </p>
            <p class="text-[12px] text-canvas/50 uppercase tracking-[0.18em]">
                Bafal-13 · Kathmandu · Nepal
            </p>
        </div>
    </div>
</footer>
