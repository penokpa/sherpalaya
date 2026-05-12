<div style="background-image: url('{{ asset('/photos/background1.jpg') }}');"
    class="bg-cover bg-center w-full  object-top font-body">
    <div class="backdrop-blur-md">
        <div class="mx-4 xl:mx-32">
            <div class="h-10"></div>
            <footer class="footer">
                <div class="gap-6">
                    <a class="link text-base-content link-neutral  no-underline"
                        href="/{{ app()->currentLocale() }}/home">
                        <div class="flex items-center gap-2  text-base uppercase text-blue-100  text-wrap">
                            <x-curator-glider alt="Sherpalaya Logo" class="w-7" :media="$companySetting->company_logo_id" fallback="default"
                                loading="lazy" />
                            <span
                                class="font-card font-extrabold ">{{ app()->currentLocale() == 'fr' ? $companySetting->company_name_fr : $companySetting->company_name_en }}</span>
                        </div>
                    </a>
                    <div class="flex items-center gap-4 text-base capitalize font-normal text-blue-100 text-wrap ">
                        <span class="icon-[iconoir--map-pin] size-6 text-blue-100"></span>
                        <span>{{ app()->currentLocale() == 'fr' ? $companySetting->company_address_fr : $companySetting->company_address_en }}</span>
                    </div>
                    <a class="link text-base-content link-neutral text-base font-semibold no-underline"
                        href="mailto:{{ app()->currentLocale() == 'fr' ? $companySetting->company_email_fr : $companySetting->company_email_en }}">
                        <div
                            class="flex items-center gap-4 text-base lowercase font-normal text-blue-100 hover:underline">
                            <span class="icon-[iconoir--mail] size-6"></span>
                            <span>{{ app()->currentLocale() == 'fr' ? $companySetting->company_email_fr : $companySetting->company_email_en }}</span>
                        </div>
                    </a>

                    <div class="flex items-center gap-4 text-base uppercase font-normal text-blue-100">
                        <span class="icon-[iconoir--phone-income] size-6"></span>
                        <span>{{ app()->currentLocale() == 'fr' ? $companySetting->company_contact_number_fr : $companySetting->company_contact_number_en }}</span>
                    </div>
                    {{-- <a class="link text-base-content link-neutral texl-lg font-semibold no-underline"> --}}
                </div>
                <nav class="text-base-content capitalize">
                    <h6 class="footer-title font-bold text-blue-50 uppercase">
                        {{ __('footer.adventures') }}
                    </h6>
                    <a href="/{{ app()->currentLocale() }}/expeditions"
                        class="link link-hover text-blue-100 capitalize">
                        {{ __('footer.expeditions') }}</a>
                    {{-- <a href="/{{ app()->currentLocale() }}/services" class="link link-hover text-blue-100">
                        {{ __('footer.services') }}</a> --}}
                    <a href="/{{ app()->currentLocale() }}/treks" class="link link-hover text-blue-100">
                        {{ __('footer.treks') }}</a>
                    <a href="/{{ app()->currentLocale() }}/tours" class="link link-hover text-blue-100">
                        {{ __('footer.activities') }}</a>
                </nav>
                <nav class="text-base-content capitalize">
                    <h6 class="footer-title font-bold text-blue-50 uppercase">{{ __('footer.company') }}</h6>
                    <a href="/{{ app()->currentLocale() }}/about_us"
                        class="link link-hover text-blue-100">{{ __('footer.about-us') }}</a>
                    <a href="/{{ app()->currentLocale() }}/our-team"
                        class="link link-hover text-blue-100">{{ __('footer.our-team') }}</a>
                    <a href="/{{ app()->currentLocale() }}/contact"
                        class="link link-hover text-blue-100">{{ __('footer.contact') }}</a>
                    {{-- <a href="/" class="link link-hover text-blue-100">Certificates</a> --}}

                </nav>
                <nav class="text-base-content">
                    <h6 class="footer-title font-bold text-blue-50 uppercase">{{ __('footer.legal') }}</h6>
                    <a href="/{{ app()->currentLocale() }}/terms-and-conditions"
                        class="link link-hover text-blue-100">{{ __('footer.terms-of-use') }}</a>
                    <a href="/{{ app()->currentLocale() }}/privacy-policy"
                        class="link link-hover text-blue-100">{{ __('footer.privacy-policy') }}</a>
                    <a href="/{{ app()->currentLocale() }}/cookie-policy"
                        class="link link-hover text-blue-100">{{ __('footer.cookie-policy') }}</a>
                </nav>
                <nav class="text-base-content">
                    <div class="flex items-center gap- text-base uppercase font-semibold text-blue-200  text-wrap">
                        <span>{{ __('footer.follow-us') }}</span>
                    </div>
                    <div class="flex flex-col gap-4 text-blue-300 justify-center items-center">
                        <div class="flex gap-4 justify-between">
                            <a href="{{ $companySetting->facebook_url }}" target="_blank" class="link link-animated"
                                aria-label="Facebook Link">
                                <span class="icon-[tabler--brand-facebook] size-7 text-blue-500"></span>
                            </a>
                            <a href="{{ $companySetting->instagram_url }}" target="_blank" class="link link-animated"
                                aria-label="Instagram Link">
                                <span class="icon-[tabler--brand-instagram] size-7 text-red-300"></span>
                            </a>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ $companySetting->youtube_url }}" target="_blank" class="link link-animated"
                                aria-label="Youtube Link">
                                <span class="icon-[tabler--brand-youtube] size-7 text-red-500"></span>
                            </a>
                            <a href="{{ $companySetting->tiktok_url }}" target="_blank" class="link link-animated"
                                aria-label="Tiktok Link">
                                <span class="icon-[tabler--brand-tiktok] size-7 text-white/90"></span>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="gap-4 hover:underline"> --}}
                    {{-- <a href="https://wa.me/{{ config('services.whatsapp.number') }}">
                        <div
                            class="flex items-center gap-2 text-base uppercase font-semibold text-green-300  text-wrap">
                            <span>{{ __('footer.reach-us') }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-base Capitalize font-normal text-green-300 mt-2">
                            <span class="icon-[tabler--brand-whatsapp] size-7"></span>
                            WhatsApp
                        </div>
                    </a> --}}
                    {{-- </div> --}}
                </nav>
            </footer>
            <footer class="footer footer-center bg-transparent rounded ">
                <div class="h-2"></div>
                <aside class="text-blue-300 xl:mb-8">
                    <p>{{ __('footer.copyright') }}</p>
                </aside>
                <div class="h-10 xl:hidden"></div>

            </footer>
        </div>

    </div>
</div>
