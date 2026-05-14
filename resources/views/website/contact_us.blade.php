@php
    use App\Models\Media;

    $locale = app()->currentLocale();
    $heroImage = $contactUsSetting->cover_image_id ? Media::find($contactUsSetting->cover_image_id) : null;
    $heroEyebrow = $locale === 'fr' ? $contactUsSetting->title_up_fr : $contactUsSetting->title_up_en;
    $heroTitle = $locale === 'fr' ? $contactUsSetting->main_title_fr : $contactUsSetting->main_title_en;
    $heroSubtitle = $locale === 'fr' ? $contactUsSetting->title_down_fr : $contactUsSetting->title_down_en;
    $intro = $locale === 'fr' ? $contactUsSetting->content_fr : $contactUsSetting->content_en;
    $address = $locale === 'fr' ? $contactUsSetting->address_fr : $contactUsSetting->address_en;
    $contact = $locale === 'fr' ? $contactUsSetting->contact_fr : $contactUsSetting->contact_en;
    $workingHour = $locale === 'fr' ? $contactUsSetting->working_hour_fr : $contactUsSetting->working_hour_en;
@endphp

<x-website-layout>
    <x-listing.hero
        :image="$heroImage"
        :eyebrow="$heroEyebrow ?: __('home.cta_plan')"
        :title="$heroTitle ?: __('home.cta_plan')"
        :subtitle="$heroSubtitle"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('footer.contact')],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12">

            @if ($intro)
                <p class="mb-12 max-w-3xl text-[16px] leading-relaxed text-ink-muted">
                    {{ $intro }}
                </p>
            @endif

            <div class="grid grid-cols-1 gap-10 lg:grid-cols-5 lg:gap-12">

                {{-- Contact info (left) --}}
                <div class="lg:col-span-2 space-y-8">
                    @if ($address)
                        <div class="flex gap-4">
                            <span class="icon-[tabler--map-pin] size-5 mt-1 text-terracotta shrink-0"></span>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-ink-muted">{{ __('contact.address') }}</p>
                                <p class="mt-1 text-[15px] text-ink leading-relaxed">{{ $address }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($contact)
                        <div class="flex gap-4">
                            <span class="icon-[tabler--phone] size-5 mt-1 text-terracotta shrink-0"></span>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-ink-muted">Contact</p>
                                <p class="mt-1 text-[15px] text-ink leading-relaxed whitespace-pre-line">{{ $contact }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($workingHour)
                        <div class="flex gap-4">
                            <span class="icon-[tabler--clock] size-5 mt-1 text-terracotta shrink-0"></span>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-ink-muted">{{ __('contact.work') }}</p>
                                <p class="mt-1 text-[15px] text-ink leading-relaxed whitespace-pre-line">{{ $workingHour }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty(config('services.whatsapp.number')))
                        <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 rounded-full border border-forest bg-transparent px-5 py-3 text-[13px] font-semibold text-forest hover:bg-forest hover:text-canvas transition">
                            <span class="icon-[tabler--brand-whatsapp] size-4"></span>
                            WhatsApp us instead
                        </a>
                    @endif
                </div>

                {{-- Form (right) --}}
                <div class="lg:col-span-3">
                    <div class="rounded-2xl bg-surface ring-1 ring-hairline shadow-sm p-6 md:p-10">
                        <h2 class="font-display text-2xl md:text-3xl font-medium leading-tight tracking-tighter-display text-ink">
                            {{ __('contact.form-head') }}
                        </h2>

                        @if (isset($contactUsSubmitted) && $contactUsSubmitted === true)
                            <div class="mt-5 rounded-lg bg-forest/10 border border-forest/20 px-4 py-3 text-[14px] text-forest">
                                {{ __('contact.form-success') }}
                            </div>
                        @endif

                        <form id="contactForm" action="/{{ $locale }}/contact" method="POST" class="mt-6 space-y-5">
                            @csrf
                            <div>
                                <label for="full_name" class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5">Full name</label>
                                <input type="text" id="full_name" name="full_name" autocomplete="name" required
                                       placeholder="John Doe"
                                       class="w-full rounded-lg border border-hairline bg-canvas px-4 py-3 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15" />
                            </div>
                            <div>
                                <label for="email" class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5">Email</label>
                                <input type="email" id="email" name="email" autocomplete="email" required
                                       placeholder="john@example.com"
                                       class="w-full rounded-lg border border-hairline bg-canvas px-4 py-3 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15" />
                            </div>
                            <div>
                                <label for="mobile_number" class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5">Phone (optional)</label>
                                <input type="tel" id="mobile_number" name="mobile_number" autocomplete="tel"
                                       placeholder="+977 9801..."
                                       class="w-full rounded-lg border border-hairline bg-canvas px-4 py-3 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15" />
                            </div>
                            <div>
                                <label for="message" class="block text-[12px] font-semibold uppercase tracking-[0.14em] text-ink-muted mb-1.5">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                          placeholder="Tell us where you'd like to go — dates, group size, anything..."
                                          class="w-full rounded-lg border border-hairline bg-canvas px-4 py-3 text-[15px] text-ink focus:border-forest focus:outline-none focus:ring-2 focus:ring-forest/15"></textarea>
                            </div>

                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-terracotta px-6 py-3.5 text-[14px] font-semibold text-white hover:bg-terracotta-hover transition">
                                {{ __('contact.send') }}
                                <span class="icon-[tabler--arrow-right] size-4"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
