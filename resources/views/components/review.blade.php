<section class="bg-amber-50/40 font-body">
    <div class="2xl:mx-32 mx-4 py-16 md:py-20">

        @if ($sectionTitle)
            <h2 class="text-2xl md:text-3xl font-body font-medium text-center text-slate-900 tracking-wide"
                data-aos="fade-down" data-aos-duration="800">
                {{ $sectionTitle }}
            </h2>
        @endif

        @if ($sectionSubtitle || $googleUrl || $tripadvisorUrl || $trustpilotUrl)
            <p class="text-sm md:text-base text-slate-600 text-center mt-3 mb-10">
                @if ($sectionSubtitle)
                    {{ $sectionSubtitle }}
                @endif
                @if ($googleUrl || $tripadvisorUrl || $trustpilotUrl)
                    <span class="inline-flex gap-3 ml-1 align-middle">
                        @if ($googleUrl)
                            <a href="{{ $googleUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1 text-slate-700 hover:text-warning underline decoration-dotted">
                                <span class="icon-[logos--google-icon] size-4"></span> Google
                            </a>
                        @endif
                        @if ($tripadvisorUrl)
                            <a href="{{ $tripadvisorUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1 text-slate-700 hover:text-warning underline decoration-dotted">
                                <span class="icon-[simple-icons--tripadvisor] size-4 text-[#34E0A1]"></span> TripAdvisor
                            </a>
                        @endif
                        @if ($trustpilotUrl)
                            <a href="{{ $trustpilotUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1 text-slate-700 hover:text-warning underline decoration-dotted">
                                <span class="icon-[simple-icons--trustpilot] size-4 text-[#00B67A]"></span> Trustpilot
                            </a>
                        @endif
                    </span>
                @endif
            </p>
        @endif

        <div id="reviews-carousel"
            data-carousel='{ "loadingClasses": "opacity-0", "slidesQty": { "xs": 1.05, "sm": 1.5, "md": 2, "lg": 3, "xl": 4 } }'
            class="relative w-full">
            <div class="carousel">
                <div class="carousel-body opacity-0 gap-5">
                    @foreach ($allReviews as $review)
                        @php
                            $platform = $review->platform;
                            $rating = (int) ($review->rating ?? 5);
                        @endphp
                        <div class="carousel-slide">
                            <article
                                class="relative h-full bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-md transition-shadow p-5 md:p-6 flex flex-col gap-4">

                                {{-- Platform badge --}}
                                @if ($platform)
                                    <div class="absolute -top-3 -right-3 size-10 rounded-full bg-white shadow ring-1 ring-slate-200 flex items-center justify-center">
                                        <span class="{{ $platform->badgeIcon() }} size-6 {{ $platform->badgeColor() }}"></span>
                                    </div>
                                @endif

                                {{-- Header: avatar, name, date --}}
                                <header class="flex items-center gap-3">
                                    <div class="size-12 shrink-0 rounded-full ring-2 ring-warning/60 overflow-hidden bg-slate-100">
                                        @if ($review->reviewImage)
                                            <img loading="lazy" decoding="async"
                                                src="{{ $review->reviewImage->url }}"
                                                alt="{{ $review->name }}"
                                                class="size-full object-cover" />
                                        @else
                                            <div class="size-full flex items-center justify-center text-slate-500 font-medium text-base">
                                                {{ \Illuminate\Support\Str::of($review->name)->substr(0, 1)->upper() }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-slate-900 font-semibold text-base truncate">{{ $review->name }}</p>
                                        @if ($review->reviewed_at)
                                            <p class="text-slate-500 text-sm italic">{{ $review->reviewed_at->format('M j, Y') }}</p>
                                        @endif
                                    </div>
                                </header>

                                {{-- Title --}}
                                @if ($review->title)
                                    <h3 class="text-slate-900 font-medium leading-snug line-clamp-2">{{ $review->title }}</h3>
                                @endif

                                {{-- Body --}}
                                <div class="prose prose-sm text-slate-700 line-clamp-5 flex-1">
                                    {!! $review->description !!}
                                </div>

                                {{-- Footer: rating + verify --}}
                                <footer class="mt-auto flex items-center justify-between pt-2 border-t border-amber-100">
                                    <div class="flex items-center gap-1.5">
                                        <div class="flex items-center text-amber-400">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="icon-[tabler--star-filled] size-4 {{ $i <= $rating ? 'opacity-100' : 'opacity-25' }}"></span>
                                            @endfor
                                        </div>
                                        <span class="text-slate-700 text-sm font-medium">{{ number_format($rating, 1) }} / 5</span>
                                    </div>
                                    @if ($review->review_url)
                                        <a href="{{ $review->review_url }}" target="_blank" rel="noopener noreferrer"
                                            class="text-xs text-slate-500 hover:text-warning inline-flex items-center gap-1">
                                            Verify
                                            <span class="icon-[tabler--external-link] size-3"></span>
                                        </a>
                                    @endif
                                </footer>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($allReviews->count() > 4)
                <button type="button" class="carousel-prev hidden md:flex items-center justify-center absolute top-1/2 -left-3 -translate-y-1/2 size-10 rounded-full bg-white shadow ring-1 ring-slate-200 hover:bg-warning hover:text-white transition">
                    <span class="icon-[tabler--chevron-left] size-5"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button" class="carousel-next hidden md:flex items-center justify-center absolute top-1/2 -right-3 -translate-y-1/2 size-10 rounded-full bg-white shadow ring-1 ring-slate-200 hover:bg-warning hover:text-white transition">
                    <span class="sr-only">Next</span>
                    <span class="icon-[tabler--chevron-right] size-5"></span>
                </button>
            @endif
        </div>
    </div>
</section>
