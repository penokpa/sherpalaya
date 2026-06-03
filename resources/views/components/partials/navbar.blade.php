<style>
    /* Navbar background.
       Default: solid dark — so the white nav text is legible on every
       internal page (blog, contact, search, etc.).
       Opt-in: pages whose first section is a dark, full-bleed hero set
       :overHero="true" on the website-layout component, which adds the
       .nav-over-hero class to the body. The navbar then starts
       transparent and only turns solid when a dropdown is open. */
    #navbar {
        background: #2B2A2E !important;
        color: white !important;
    }
    body.nav-over-hero #navbar {
        background: transparent !important;
        transition: background 0.2s ease;
    }
    /* Solid bar whenever a dropdown is open OR the page has been
       scrolled past the hero. .is-scrolled is toggled by the
       controller in @push('scripts') below. Without this, scrolling
       past the hero leaves the white text floating over a light
       content background — unreadable. */
    body.nav-over-hero #navbar[data-open-menu],
    body.nav-over-hero #navbar.is-scrolled {
        background: #2B2A2E !important;
        transition: background 0.2s ease;
    }

    /* Brand mark — always use the light silhouette since the bar is dark.
       Drop-shadows are only useful when sitting over a hero image. */
    #navbar .mark-light { display: inline-block; }
    #navbar .mark-dark  { display: none; }
    body.nav-over-hero #navbar .mark-light {
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.45)) drop-shadow(0 0 1px rgba(0, 0, 0, 0.3));
    }
    body.nav-over-hero #navbar .brand-wordmark {
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
    }
    body.nav-over-hero #navbar[data-open-menu] .mark-light,
    body.nav-over-hero #navbar.is-scrolled .mark-light { filter: none; }
    body.nav-over-hero #navbar[data-open-menu] .brand-wordmark,
    body.nav-over-hero #navbar.is-scrolled .brand-wordmark { text-shadow: none; }

    /* ─── Primary nav: links & triggers ─── */
    #navbar .nav-list {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    #navbar .nav-item { position: relative; }
    #navbar .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        padding: 0.5rem 0;
        color: #ffffff;
        font-size: 15px;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.15s ease;
    }
    #navbar .nav-item:hover > .nav-link,
    #navbar .nav-item.is-open > .nav-link,
    #navbar .nav-item.is-active-route > .nav-link { color: #D4A036; }
    /* When any item is hovered, suppress the route-active highlight
       on other items so only the hovered item is hot. */
    #navbar .nav-list:hover .nav-item.is-active-route:not(:hover) > .nav-link { color: #ffffff; }
    /* Chevron stays pointing down — it's a static affordance, not a
       toggle indicator. */
    #navbar .nav-chevron { transition: color 0.15s ease; }

    /* ─── Panels container — invisible wrapper that positions
           individual panels just below the navbar. Each panel
           paints its own background so narrow panels (Company /
           Activities / Journal) appear as contained dropdowns
           aligned under their trigger, while wide panels
           (Expeditions / Treks) span the full viewport. ─── */
    #navbar .nav-panels {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.15s ease;
    }
    #navbar[data-open-menu] .nav-panels {
        opacity: 1;
        pointer-events: auto;
    }
    #navbar .nav-panel {
        display: none;
        color: #ffffff;
    }
    #navbar .nav-panel.is-active { display: block; }

    /* Wide mega-menu panels: full-bleed dark strip with centered content. */
    #navbar .nav-panel-wide {
        background: #2B2A2E;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 16px 32px -8px rgba(0, 0, 0, 0.4);
    }
    #navbar .nav-panel-wide .nav-panel-inner {
        margin: 0 auto;
        max-width: 80rem;
        padding: 2rem 1.5rem;
    }
    @media (min-width: 1024px) {
        #navbar .nav-panel-wide .nav-panel-inner { padding: 2rem 3rem; }
    }

    /* Narrow contained panels: a self-contained dark box positioned
       under its trigger. Defaults to aligning its LEFT edge with the
       trigger; panels marked [data-align="end"] (Activities, Journal —
       the right-most triggers) align their RIGHT edge to the trigger
       instead, so the box doesn't overflow off-screen. */
    #navbar .nav-panel-narrow {
        position: absolute;
        top: 0;
        left: var(--panel-x, 1rem);
        min-width: 240px;
        background: #2B2A2E;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-top: 0;
        box-shadow: 0 16px 32px -8px rgba(0, 0, 0, 0.4);
    }
    #navbar .nav-panel-narrow[data-align="end"] {
        left: auto;
        right: var(--panel-right, 1rem);
    }
    #navbar .nav-panel-narrow .nav-panel-inner {
        padding: 0.5rem 0;
    }

    /* Panel link rows. */
    #navbar .nav-panel-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.65rem 1.25rem;
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
        text-decoration: none;
        transition: color 0.15s ease, background 0.15s ease;
    }
    #navbar .nav-panel-link:hover {
        color: #D4A036;
        background: rgba(255, 255, 255, 0.03);
    }
    #navbar .nav-panel-link .meta {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(255, 255, 255, 0.4);
    }
    #navbar .nav-panel-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.5rem;
        margin-top: 0.5rem;
        padding: 0.75rem 1.25rem;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        color: #D4A036;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        text-decoration: none;
        transition: color 0.15s ease, background 0.15s ease;
    }
    #navbar .nav-panel-cta:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.03);
    }

    /* Right-side tool buttons */
    #navbar .nav-tools {
        display: flex;
        align-items: center;
        gap: 0.85rem;
    }
    #navbar .nav-tools .nav-tool-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        background: transparent;
        border: 0;
        padding: 0.4rem;
        cursor: pointer;
        transition: color 0.15s ease;
    }
    #navbar .nav-tools .nav-tool-btn:hover { color: #D4A036; }
</style>

<header id="navbar"
    class="fixed top-0 z-50 w-full flex flex-wrap py-2 lg:flex-nowrap lg:justify-start font-body font-medium tracking-wide">
    <nav class="w-full" aria-label="Global">
        <div class=" relative lg:flex lg:items-center ">
            <div class="flex items-center justify-between xl:ml-32 mx-4 ">
                <a class="inline-flex items-center gap-3 no-underline whitespace-nowrap"
                   href="/{{ app()->currentLocale() }}/home"
                   aria-label="Sherpalaya Treks &amp; Expedition — Home">
                    {{-- Icon mark — silhouettes only, swaps per navbar state --}}
                    <img src="{{ asset('photos/logo-mark-light.png') }}" alt="" aria-hidden="true" class="mark-light h-9 lg:h-10 w-auto" />
                    <img src="{{ asset('photos/logo-mark.png') }}" alt="" aria-hidden="true" class="mark-dark h-9 lg:h-10 w-auto" />
                    {{-- Wordmark --}}
                    <span class="brand-wordmark flex flex-col">
                        <span class="font-display text-[22px] lg:text-[26px] font-semibold tracking-tightish leading-[1.15]">
                            Sherpalaya
                        </span>
                        <span class="mt-1 text-[9px] lg:text-[10px] font-semibold uppercase tracking-[0.18em] opacity-80 whitespace-nowrap leading-none">
                            Treks &amp; Expedition
                        </span>
                    </span>
                </a>
                <div class="lg:hidden">
                    <div class="dropdown relative inline-flex [--placement:bottom-end] px-2 ">
                        <button id="language-select-dropdown-drawer" type="button" class="dropdown-toggle"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <span class="icon-[tabler--language-hiragana] size-5"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                            aria-orientation="vertical" aria-labelledby="language-select-dropdown-drawer">
                            <li><a class="dropdown-item text-black" href="/change-locale/en"> English</a></li>
                            <li><a class="dropdown-item text-black" href="/change-locale/fr"> French</a></li>
                        </ul>
                    </div>

                    <button type="button" class="" aria-haspopup="dialog" aria-expanded="false"
                        aria-controls="middle-center-modal" data-overlay="#middle-center-modal">
                        <span class="icon-[tabler--search] size-5"></span>
                    </button>

                    <button type="button" class="btn btn-transparent border-none" aria-haspopup="dialog"
                        aria-expanded="false" aria-controls="overlay-end-example" data-overlay="#overlay-end-example">
                        <span class="icon-[tabler--menu-2] collapse-open:hidden size-5"></span>
                        <span class="icon-[tabler--x] collapse-open:block hidden size-5"></span>
                    </button>
                </div>
            </div>

            {{-- ─────── DESKTOP NAVIGATION (rebuilt) ───────
                 One <ul> holds all nav triggers, each with a data-menu pointing
                 at a sibling panel below. A small JS controller in @push('scripts')
                 watches mouseenter on each trigger and atomically swaps which
                 panel is visible — no FlyonUI dropdowns, no race conditions.  --}}
            <div id="navbar-desktop" class="hidden grow lg:flex lg:items-center lg:justify-end lg:gap-8 xl:mr-32 mx-4">

                <ul class="nav-list" id="nav-list">
                    <li class="nav-item @if(request()->route()->getName() == 'website.home') is-active-route @endif">
                        <a href="/{{ app()->currentLocale() }}/home" class="nav-link">
                            {{ __('navbar.home') }}
                        </a>
                    </li>

                    <li class="nav-item" data-menu="company">
                        <a href="/{{ app()->currentLocale() }}/about_us" class="nav-link">
                            <span>{{ __('navbar.company') }}</span>
                            <span class="icon-[tabler--chevron-down] size-4 nav-chevron"></span>
                        </a>
                    </li>

                    <li class="nav-item @if (request()->routeIs('website.expeditions') || request()->routeIs('show_expedition') || request()->routeIs('expedition.category')) is-active-route @endif"
                        data-menu="expeditions">
                        <a href="/{{ app()->currentLocale() }}/expeditions" class="nav-link">
                            <span>{{ __('navbar.expeditions') }}</span>
                            <span class="icon-[tabler--chevron-down] size-4 nav-chevron"></span>
                        </a>
                    </li>

                    <li class="nav-item @if (request()->routeIs('website.trekking') || request()->routeIs('show_trek') || request()->routeIs('show_region')) is-active-route @endif"
                        data-menu="treks">
                        <a href="/{{ app()->currentLocale() }}/treks" class="nav-link">
                            <span>{{ __('navbar.treks') }}</span>
                            <span class="icon-[tabler--chevron-down] size-4 nav-chevron"></span>
                        </a>
                    </li>

                    <li class="nav-item @if (request()->routeIs('website.tours') || request()->routeIs('show_tour')) is-active-route @endif"
                        data-menu="activities">
                        <a href="/{{ app()->currentLocale() }}/tours" class="nav-link">
                            <span>{{ __('navbar.activities') }}</span>
                            <span class="icon-[tabler--chevron-down] size-4 nav-chevron"></span>
                        </a>
                    </li>

                    <li class="nav-item @if (request()->routeIs('website.blog.index') || request()->routeIs('website.blog.show')) is-active-route @endif"
                        data-menu="journal">
                        <a href="/{{ app()->currentLocale() }}/blog" class="nav-link">
                            <span>{{ __('navbar.journal') }}</span>
                            <span class="icon-[tabler--chevron-down] size-4 nav-chevron"></span>
                        </a>
                    </li>
                </ul>

                <div class="nav-tools">
                    <button type="button" class="nav-tool-btn" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="middle-center-modal" data-overlay="#middle-center-modal" aria-label="Search">
                        <span class="icon-[tabler--search] size-5"></span>
                    </button>

                    <a href="/{{ app()->currentLocale() }}/contact"
                       class="inline-flex items-center gap-1.5 rounded-full bg-terracotta px-5 py-2.5 text-[14px] font-medium text-white no-underline transition hover:bg-terracotta-hover hover:text-white">
                        {{ __('home.cta_plan') }}
                        <span class="icon-[tabler--arrow-right] size-4"></span>
                    </a>

                    <div class="dropdown relative inline-flex [--placement:bottom-end]">
                        <button id="language-select-dropdown" type="button" class="dropdown-toggle nav-tool-btn"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Language">
                            <span class="icon-[tabler--language-hiragana] size-5"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                            aria-orientation="vertical" aria-labelledby="language-select-dropdown">
                            <li><a class="dropdown-item text-black" href="/change-locale/en">English</a></li>
                            <li><a class="dropdown-item text-black" href="/change-locale/fr">French</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- ─────── PANELS (positioned absolutely below the navbar) ───────
                 The controller toggles .is-active on the matching panel. The
                 panels container holds all of them; only one is displayed at a
                 time. Hidden on mobile (drawer takes over). --}}
            <div class="nav-panels hidden lg:block" id="nav-panels">

                {{-- Company --}}
                <div class="nav-panel nav-panel-narrow" data-panel="company">
                    <div class="nav-panel-inner">
                        <a class="nav-panel-link" href="/{{ app()->currentLocale() }}/about_us">{{ __('navbar.about-us') }}</a>
                        <a class="nav-panel-link" href="/{{ app()->currentLocale() }}/our-team">{{ __('navbar.our-team') }}</a>
                        <a class="nav-panel-link" href="/{{ app()->currentLocale() }}/blog">{{ __('navbar.journal') }}</a>
                        <a class="nav-panel-link" href="/{{ app()->currentLocale() }}/contact">Contact Us</a>
                    </div>
                </div>

                {{-- Expeditions — mega menu with category rail + cards --}}
                <div class="nav-panel nav-panel-wide" data-panel="expeditions">
                    <div class="nav-panel-inner">
                        <div class="grid grid-cols-[240px_1fr] gap-8" id="exps-split">
                            <div class="flex flex-col py-2 border-r border-white/10 pr-2">
                                @foreach ($navExpeditions as $i => $expCategory)
                                    <a href="{{ route('expedition.category', ['locale' => app()->currentLocale(), 'slug' => $expCategory->slug]) }}"
                                       class="treks-rail-item @if($i === 0) is-active @endif"
                                       data-region-target="exps-cat-{{ $i }}">
                                        <span>{{ $expCategory->name }}</span>
                                        <span class="icon-[tabler--chevron-right] size-4 icon-arrow"></span>
                                    </a>
                                @endforeach
                                <a href="/{{ app()->currentLocale() }}/expeditions"
                                   class="mt-3 mx-4 inline-flex items-center gap-1.5 text-[12px] font-semibold text-terracotta hover:text-white transition">
                                    View all expeditions
                                    <span class="icon-[tabler--arrow-right] size-3.5"></span>
                                </a>
                            </div>
                            <div class="py-2">
                                @foreach ($navExpeditions as $i => $expCategory)
                                    <div id="exps-cat-{{ $i }}" class="exps-panel @if($i !== 0) hidden @endif">
                                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                                            @foreach ($expCategory->expeditions->take(6) as $exp)
                                                @php
                                                    $expImg = optional($exp->coverImage)->url
                                                        ?: ($expCategory->thumbnail_url
                                                        ?: asset('photos/trek1.JPG'));
                                                @endphp
                                                <a href="{{ route('show_expedition', ['id' => $exp->id, 'locale' => app()->currentLocale()]) }}"
                                                   class="group relative overflow-hidden rounded-lg bg-white/5 hover:bg-white/10 transition ring-1 ring-white/10">
                                                    <div class="aspect-[16/10] overflow-hidden">
                                                        <img src="{{ $expImg }}" alt="{{ $exp->title }}"
                                                             class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" />
                                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                                    </div>
                                                    <div class="absolute inset-x-0 bottom-0 p-3">
                                                        <h3 class="text-[13px] font-semibold leading-tight text-white line-clamp-2">{{ $exp->title }}</h3>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        @if ($expCategory->expeditions->count() > 6)
                                            <a href="{{ route('expedition.category', ['locale' => app()->currentLocale(), 'slug' => $expCategory->slug]) }}"
                                               class="mt-4 inline-flex items-center gap-1.5 text-[12px] font-semibold text-terracotta hover:text-white transition">
                                                See all {{ $expCategory->expeditions->count() }} in {{ $expCategory->name }}
                                                <span class="icon-[tabler--arrow-right] size-3.5"></span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Treks — mega menu with region rail + trek cards --}}
                <div class="nav-panel nav-panel-wide" data-panel="treks">
                    <div class="nav-panel-inner">
                        <div class="grid grid-cols-[240px_1fr] gap-8" id="treks-split">
                            <div class="flex flex-col py-2 border-r border-white/10 pr-2">
                                @foreach ($navTreks as $i => $region)
                                    <a href="{{ url('/' . app()->currentLocale() . '/regions/' . $region->slug) }}"
                                       class="treks-rail-item @if($i === 0) is-active @endif"
                                       data-region-target="treks-region-{{ $i }}">
                                        <span>{{ $region->name }} Region</span>
                                        <span class="icon-[tabler--chevron-right] size-4 icon-arrow"></span>
                                    </a>
                                @endforeach
                                <a href="/{{ app()->currentLocale() }}/treks"
                                   class="mt-3 mx-4 inline-flex items-center gap-1.5 text-[12px] font-semibold text-terracotta hover:text-white transition">
                                    View all regions
                                    <span class="icon-[tabler--arrow-right] size-3.5"></span>
                                </a>
                            </div>
                            <div class="py-2">
                                @foreach ($navTreks as $i => $region)
                                    <div id="treks-region-{{ $i }}" class="treks-panel @if($i !== 0) hidden @endif">
                                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                                            @foreach ($region->treks->take(6) as $trek)
                                                @php
                                                    $trekImg = optional($trek->coverImage)->url
                                                        ?: ($region->thumbnail_url
                                                        ?: asset('photos/trek1.JPG'));
                                                @endphp
                                                <a href="{{ route('show_trek', ['id' => $trek->id, 'locale' => app()->currentLocale()]) }}"
                                                   class="group relative overflow-hidden rounded-lg bg-white/5 hover:bg-white/10 transition ring-1 ring-white/10">
                                                    <div class="aspect-[16/10] overflow-hidden">
                                                        <img src="{{ $trekImg }}" alt="{{ $trek->title }}"
                                                             class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" />
                                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                                    </div>
                                                    <div class="absolute inset-x-0 bottom-0 p-3">
                                                        <h3 class="text-[13px] font-semibold leading-tight text-white line-clamp-2">{{ $trek->title }}</h3>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        @if ($region->treks->count() > 6)
                                            <a href="{{ url('/' . app()->currentLocale() . '/regions/' . $region->slug) }}"
                                               class="mt-4 inline-flex items-center gap-1.5 text-[12px] font-semibold text-terracotta hover:text-white transition">
                                                See all {{ $region->treks->count() }} treks in {{ $region->name }}
                                                <span class="icon-[tabler--arrow-right] size-3.5"></span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Activities --}}
                <div class="nav-panel nav-panel-narrow" data-panel="activities" data-align="end">
                    <div class="nav-panel-inner">
                        @foreach ($navTourCategories as $tourCat)
                            <a class="nav-panel-link" href="/{{ app()->currentLocale() }}/tours#category-{{ $tourCat->id }}">
                                <span>{{ $tourCat->name }}</span>
                                <span class="meta">{{ $tourCat->tours->count() }}</span>
                            </a>
                        @endforeach
                        <a class="nav-panel-cta" href="/{{ app()->currentLocale() }}/tours">
                            <span>View all activities</span>
                            <span class="icon-[tabler--arrow-right] size-3.5"></span>
                        </a>
                    </div>
                </div>

                {{-- Journal --}}
                <div class="nav-panel nav-panel-narrow" data-panel="journal" data-align="end" style="min-width: 320px;">
                    <div class="nav-panel-inner">
                        @foreach ($navRecentPosts->take(5) as $post)
                            <a class="nav-panel-link" href="{{ url('/' . app()->currentLocale() . '/blog/' . $post->slug) }}"
                               style="flex-direction: column; align-items: flex-start; gap: 0.15rem;">
                                <span class="line-clamp-1">{{ $post->title }}</span>
                                @if ($post->published_at)
                                    <span class="meta">{{ $post->published_at->format('M j, Y') }}</span>
                                @endif
                            </a>
                        @endforeach
                        <a class="nav-panel-cta" href="/{{ app()->currentLocale() }}/blog">
                            <span>View all posts</span>
                            <span class="icon-[tabler--arrow-right] size-3.5"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>



{{-- drawer --}}
<header id="overlay-end-example"
    class="overlay overlay-open:translate-x-0 drawer drawer-end hidden lg:hidden font-body" role="dialog"
    tabindex="-1">
    <nav class="drawer-body px-2 uppercase">
        <div class="drawer-header px-2">
            <h3 class="drawer-title">Sherpalaya</h3>

            <button class="btn btn-text btn-circle btn-sm absolute end-12 top-3" type="button" class=""
                aria-haspopup="dialog" aria-expanded="false" aria-controls="middle-center-modal"
                data-overlay="#middle-center-modal">
                <span class="icon-[tabler--search] size-4"></span>
            </button>

            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3" aria-label="Close"
                data-overlay="#overlay-end-example">
                <span class="icon-[tabler--x] size-4 "></span>
            </button>

        </div>
        <div class="drawer-body justify-start pb-6 px-0">
            <ul class="menu  p-0 [&_.nested-collapse-wrapper]:space-y-0.5 [&_ul]:space-y-0.5 ">
                <li class=" hover:text-warning rounded-lg items-start"><a href="/{{ app()->currentLocale() }}/home"
                        @class([
                            'text-warning' => request()->route()->getName() == 'website.home',
                        ])>
                        <span class="icon-[solar--home-outline] size-5">
                        </span>
                        Home
                    </a>
                </li>
                {{-- company --}}
                <li class="nested-collapse-wrapper">
                    <a class="collapse-toggle nested-collapse" id="company-collapse"
                        data-collapse="#company-collapse-menu">
                        <span class="icon-[ep--office-building] size-5"></span> Company
                        <span class="icon-[tabler--chevron-down] collapse-icon size-4"></span>
                    </a>
                    <ul id="company-collapse-menu"
                        class="collapse hidden w-auto overflow-hidden transition-[height] duration-300 "
                        aria-labelledby="company-collapse">
                        <li class="uppercase">
                            <ul class="menu px-0 mx-0">
                                <li class="text-black hover:underline px-0"><a class="dropdown-item"
                                        href="/{{ app()->currentLocale() }}/about_us">
                                        <span class="icon-[majesticons--tooltip-text-line]"></span>
                                        About Us
                                    </a>
                                </li>
                                {{-- <li
                                    class="text-black text-lg font-normal teacking-normal  hover:text-warning hover:underline decoration-1">
                                    <a class="dropdown-item" href="/">
                                        Documents
                                    </a>
                                </li> --}}
                                <li class="text-black hover:underline"><a class="dropdown-item"
                                        href="/{{ app()->currentLocale() }}/our-team">
                                        <span class="icon-[stash--people-group-duotone]"></span>
                                        Our Team
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- company end --}}
                {{-- services --}}


                {{-- expeditions (8,000m+ only) --}}
                <li class="nested-collapse-wrapper">
                    <a class="collapse-toggle nested-collapse" id="expedition-collapse"
                        data-collapse="#expedition-collapse-menu">
                        <span class="icon-[majesticons--flag-line] size-5"></span> Expeditions
                        <span class="icon-[tabler--chevron-down] collapse-icon size-4"></span>
                    </a>
                    <ul id="expedition-collapse-menu"
                        class="collapse hidden w-auto overflow-hidden transition-[height] duration-300 "
                        aria-labelledby="expedition-collapse">
                        @foreach ($navExpeditions as $expeditionCategory)
                            @if ($expeditionCategory->expeditions->isNotEmpty())
                                <li class="uppercase ">
                                    <a href="/{{ app()->currentLocale() }}/expeditions#category-{{ $expeditionCategory->id }}"
                                        class="menu font-normal text-black text-lg">{{ $expeditionCategory->name }}
                                        </p></a>
                                    <ul class="menu px-2">
                                        @foreach ($expeditionCategory->expeditions as $expedition)
                                            <div class="flex flex-col items-start  ">
                                                <div
                                                    class="text-black hover:underline text-wrap tracking-normal font-light">
                                                    <a
                                                        href="{{ route('show_expedition', ['id' => $expedition->id, 'locale' => app()->currentLocale()]) }}">
                                                        {{ $expedition->title }}
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <p
                                                        class="text-xs rounded-full text-warning tracking-tight font-normal badge-outline px-1">
                                                        {{ $expedition->duration }} days
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                {{-- expedition end  --}}

                {{-- treks --}}
                <li class="nested-collapse-wrapper">
                    <a class="collapse-toggle nested-collapse" id="trek-page-collapse"
                        data-collapse="#trek-page-collapse-menu">
                        <span class="icon-[material-symbols-light--hiking] size-5"></span>
                        Treks
                        <span class="icon-[tabler--chevron-down] collapse-icon size-4"></span>
                    </a>
                    <ul id="trek-page-collapse-menu"
                        class="collapse hidden w-auto overflow-hidden transition-[height] duration-300"
                        aria-labelledby="trek-page-collapse">
                        @foreach ($navTreks as $trekCategory)
                            @if ($trekCategory->treks->isNotEmpty())
                                <li class="uppercase ">
                                    <a href="/{{ app()->currentLocale() }}/treks#category-{{ $trekCategory->id }}"
                                        class="menu font-normal text-black text-lg">{{ $trekCategory->name }}
                                        </p></a>
                                    <ul class="menu px-2">
                                        @foreach ($trekCategory->treks as $trek)
                                            <div class="flex flex-col items-start  ">
                                                <div
                                                    class="text-black hover:underline tracking-normal font-light text-wrap">
                                                    <a
                                                        href="{{ route('show_trek', ['id' => $trek->id, 'locale' => app()->currentLocale()]) }}">
                                                        {{ $trek->title }}
                                                    </a>
                                                </div>
                                                <div class="mb-2">
                                                    <p
                                                        class="text-xs rounded-full text-warning tracking-tight font-normal badge-outline px-1">
                                                        {{ $trek->duration }} days
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                {{-- treks end --}}

                {{-- tours  --}}
                <li class="nested-collapse-wrapper">
                    <a class="collapse-toggle nested-collapse" id="tour-page-collapse"
                        data-collapse="#tour-page-collapse-menu">
                        <span class="icon-[majesticons--map-marker-path-line] size-5"></span> Activities
                        <span class="icon-[tabler--chevron-down] collapse-icon size-4"></span>
                    </a>
                    <ul id="tour-page-collapse-menu"
                        class="collapse hidden w-auto overflow-hidden transition-[height] duration-300 "
                        aria-labelledby="tour-page-collapse">
                        @foreach ($navTours as $tourCategory)
                            <li class="items-start">
                                <div class="flex flex-row gap-0 items-center">
                                    <div class="menu hover:underline text-black font-light">
                                        <a href="/{{ app()->currentLocale() }}/tours#type-{{ $tourCategory->id }}">
                                            {{ $tourCategory->name }}
                                        </a>
                                    </div>
                                    @if ($tourCategory->tours->count() > 0)
                                        <p
                                            class="text-xs rounded-full text-warning tracking-tight font-normal badge-outline px-1">
                                            {{ $tourCategory->tours->count() }} packages
                                        </p>
                                    @else
                                        <p
                                            class="text-xs rounded-full text-warning tracking-tight font-normal badge-outline px-1">
                                            0 packages
                                        </p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- tours end  --}}


                {{-- <li class="nested-collapse-wrapper"> --}}
                {{-- <a class="collapse-toggle nested-collapse" id="service-collapse"
                        data-collapse="#service-collapse-menu">
                        <span class="icon-[ep--office-building] size-5"></span> Services
                        <span class="icon-[tabler--chevron-down] collapse-icon size-4"></span>
                    </a> --}}
                {{-- <ul id="service-collapse-menu"
                        class="collapse hidden w-auto overflow-hidden transition-[height] duration-300 "
                        aria-labelledby="service-collapse">
                        <li class="uppercase">
                            <ul class="menu px-0 mx-0">
                                @foreach ($navServices as $navService)
                                    <li
                                        class="text-black text-base font-light teacking-wide  hover:text-warning hover:underline decoration-1">
                                        <a class="dropdown-item"
                                            href="{{ route('show_service', ['id'=>$navService->id, 'locale'=>app()->currentLocale()]) }}">{{ $navService->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                {{-- services end --}}

                {{-- contact  --}}
                <li class="text-slate-900 hover:text-warning rounded-lg text-base uppercase">
                    <a href="/{{ app()->currentLocale() }}/contact" @class([
                        'text-warning' => request()->route()->getName() == 'website.contact',
                    ])>
                        <span class="icon-[majesticons--phone-line] size-5"></span>
                        Contact
                    </a>
                </li>
                {{-- contact end  --}}
            </ul>
        </div>
    </nav>

</header>
{{-- drawer end --}}
@push('modals')
    <div id="middle-center-modal"
         class="overlay modal overlay-open:opacity-100 modal-middle hidden backdrop-blur-md"
         role="dialog" tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100 w-full max-w-xl mx-4">
            <div class="modal-content relative overflow-hidden rounded-2xl border border-hairline bg-canvas shadow-2xl ring-1 ring-black/5">
                {{-- Header strip --}}
                <div class="flex items-center justify-between px-6 pt-5 pb-3 border-b border-hairline/60">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-terracotta">
                            {{ __('home.eyebrow_search') ?? 'Find your adventure' }}
                        </p>
                        <h3 class="mt-0.5 font-display text-xl text-ink leading-snug">
                            What are you looking for?
                        </h3>
                    </div>
                    <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full text-ink-muted hover:bg-hairline/60 hover:text-ink transition"
                            aria-label="Close" data-overlay="#middle-center-modal">
                        <span class="icon-[tabler--x] size-5"></span>
                    </button>
                </div>

                {{-- Body --}}
                <div class="px-6 py-5">
                    <x-search.search-input :query="$query" :type="$type" />
                </div>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.getElementById("navbar");
            // Navbar stays fixed at the top at all times (matches the SST
            // reference). Previously we hid the bar on scroll-down and
            // revealed on scroll-up — removed for a calmer, stationary feel.

            // On pages with body.nav-over-hero (homepage, listings, etc.),
            // the navbar is transparent over the hero image. Once the user
            // has scrolled past the hero, toggle .is-scrolled so the bar
            // turns solid charcoal — otherwise the white text floats
            // unreadably over the light content area below the hero.
            if (navbar && document.body.classList.contains("nav-over-hero")) {
                const SCROLL_TRIGGER = 80;
                const updateScrolled = () => {
                    navbar.classList.toggle("is-scrolled", window.scrollY > SCROLL_TRIGGER);
                };
                updateScrolled();
                window.addEventListener("scroll", updateScrolled, { passive: true });
            }

            // Measure the actual navbar height and expose it as --navbar-h
            // so the full-width mega-menu panels sit flush against the
            // bottom of the bar instead of leaving a hero-visible gap.
            function setNavbarHeightVar() {
                if (!navbar) return;
                const h = Math.round(navbar.getBoundingClientRect().height);
                document.documentElement.style.setProperty("--navbar-h", h + "px");
            }
            setNavbarHeightVar();
            window.addEventListener("resize", setNavbarHeightVar);
            // Re-measure after fonts load so we don't end up off by a pixel
            // because Inter/Fraunces hadn't loaded at the first call.
            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(setNavbarHeightVar);
            }

            // Treks / Expeditions mega-menu split layouts — swap right-
            // panel content when hovering rail items on the left.
            function setupSplitMenu(rootId, panelClass) {
                const root = document.getElementById(rootId);
                if (!root) return;
                const items = root.querySelectorAll(".treks-rail-item");
                const panels = root.querySelectorAll("." + panelClass);
                items.forEach((item) => {
                    item.addEventListener("mouseenter", () => {
                        items.forEach((i) => i.classList.remove("is-active"));
                        panels.forEach((p) => p.classList.add("hidden"));
                        item.classList.add("is-active");
                        const target = document.getElementById(item.dataset.regionTarget);
                        if (target) target.classList.remove("hidden");
                    });
                });
            }
            setupSplitMenu("treks-split", "treks-panel");
            setupSplitMenu("exps-split", "exps-panel");

            // ─── Desktop nav controller ───
            // One state machine: each .nav-item with [data-menu] opens the
            // matching .nav-panel[data-panel] on mouseenter. Only one panel
            // is ever active. Closes with a small grace period so the cursor
            // can travel from the trigger down into the panel without the
            // panel snapping shut.
            const navList = document.getElementById("nav-list");
            const panelsRoot = document.getElementById("nav-panels");
            if (navbar && navList && panelsRoot) {
                const triggers = navList.querySelectorAll(".nav-item[data-menu]");
                const plainItems = navList.querySelectorAll(".nav-item:not([data-menu])");
                const panels = panelsRoot.querySelectorAll(".nav-panel[data-panel]");
                let closeTimer = null;

                function openMenu(name) {
                    clearTimeout(closeTimer);
                    closeTimer = null;
                    const trigger = navList.querySelector('.nav-item[data-menu="' + name + '"]');
                    if (trigger) {
                        // Position the narrow panel under its trigger.
                        // Left-aligned panels use --panel-x; right-aligned
                        // panels (Activities, Journal) use --panel-right so
                        // their right edge stays inside the viewport.
                        const rect = trigger.getBoundingClientRect();
                        panelsRoot.style.setProperty("--panel-x", rect.left + "px");
                        panelsRoot.style.setProperty("--panel-right", (window.innerWidth - rect.right) + "px");
                    }
                    navbar.dataset.openMenu = name;
                    triggers.forEach((t) => t.classList.toggle("is-open", t.dataset.menu === name));
                    panels.forEach((p) => p.classList.toggle("is-active", p.dataset.panel === name));
                }

                function closeMenu() {
                    delete navbar.dataset.openMenu;
                    triggers.forEach((t) => t.classList.remove("is-open"));
                    panels.forEach((p) => p.classList.remove("is-active"));
                }

                function scheduleClose() {
                    clearTimeout(closeTimer);
                    closeTimer = setTimeout(closeMenu, 120);
                }

                triggers.forEach((trigger) => {
                    trigger.addEventListener("mouseenter", () => openMenu(trigger.dataset.menu));
                });
                // Plain items (Home) close any open menu when the cursor enters.
                plainItems.forEach((item) => {
                    item.addEventListener("mouseenter", scheduleClose);
                });

                // Keep the menu open while the cursor is anywhere inside the
                // navbar or the panels area; close when it leaves both.
                navbar.addEventListener("mouseleave", scheduleClose);
                panelsRoot.addEventListener("mouseleave", scheduleClose);
                navbar.addEventListener("mouseenter", () => clearTimeout(closeTimer));
                panelsRoot.addEventListener("mouseenter", () => clearTimeout(closeTimer));

                // Close on Escape for keyboard users.
                document.addEventListener("keydown", (e) => {
                    if (e.key === "Escape" && navbar.dataset.openMenu) closeMenu();
                });
            }
        });
    </script>
@endpush
