<div class="w-full" data-search-root>
    <form action="/{{ app()->currentLocale() }}/search/query" method="GET" class="space-y-5">

        {{-- Search input with icon prefix + suggestions dropdown --}}
        <div class="relative">
            <label class="block">
                <span class="sr-only">{{ __('navbar.search') ?? 'Search' }}</span>
                <div class="relative">
                    <span class="icon-[tabler--search] absolute left-4 top-1/2 -translate-y-1/2 size-5 text-ink-muted pointer-events-none"></span>
                    <input
                        type="search"
                        name="query"
                        required
                        autofocus
                        autocomplete="off"
                        placeholder="Search treks, expeditions, tours…"
                        value="{{ isset($query) ? $query : '' }}"
                        data-search-input
                        data-suggest-url="/{{ app()->currentLocale() }}/search/suggest"
                        class="w-full rounded-xl border border-hairline bg-canvas/60 py-3.5 pl-12 pr-10 text-[15px] text-ink placeholder:text-ink-muted/70 focus:border-forest focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest/20 transition"
                    />
                    {{-- Small spinner shown while fetching --}}
                    <span data-search-spinner class="hidden absolute right-3.5 top-1/2 -translate-y-1/2 size-4 rounded-full border-2 border-forest/20 border-t-forest animate-spin"></span>
                </div>
            </label>

            {{-- Suggestions dropdown --}}
            <div
                data-search-suggestions
                class="hidden absolute left-0 right-0 top-full mt-2 z-50 max-h-[60vh] overflow-y-auto rounded-xl border border-hairline bg-white shadow-xl ring-1 ring-black/5"
            ></div>
        </div>

        {{-- Filter pills (radio buttons, styled) --}}
        <div>
            <p class="mb-2 text-xs font-medium uppercase tracking-wider text-ink-muted">
                Filter by type
            </p>
            <div class="flex flex-wrap gap-2">
                <label class="search-pill">
                    <input type="radio" name="type" value="" @checked(empty($type)) data-search-type-input>
                    <span>All</span>
                </label>
                @foreach ($searchFilters as $searchFilter)
                    <label class="search-pill">
                        <input type="radio" name="type" value="{{ $searchFilter->value }}" @checked($searchFilter->value == $type) data-search-type-input>
                        <span>{{ $searchFilter->getLabel() }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Submit --}}
        <div class="pt-1">
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-forest px-5 py-3 text-[15px] font-medium text-white transition hover:bg-forest-hover focus:outline-none focus:ring-2 focus:ring-forest/30 focus:ring-offset-2 focus:ring-offset-canvas">
                <span class="icon-[tabler--search] size-4"></span>
                Search
            </button>
        </div>

    </form>
</div>

@once
    @push('styles')
        <style>
            /* Pill: the whole label is the click target */
            .search-pill {
                display: inline-block;
                cursor: pointer;
            }
            .search-pill > input {
                /* visually hidden but keeps the radio focusable for a11y */
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border: 0;
            }
            .search-pill > span {
                display: inline-flex;
                align-items: center;
                padding: 0.5rem 0.95rem;
                border-radius: 9999px;
                border: 1px solid #E8E3DA;            /* hairline */
                background: #FFFFFF;
                color: #5C5A55;                       /* ink-muted */
                font-size: 13px;
                font-weight: 500;
                line-height: 1;
                transition: all .15s ease;
                user-select: none;
            }
            .search-pill:hover > span {
                border-color: #1F3D2E;                /* forest */
                color: #1F3D2E;
            }
            .search-pill > input:checked + span {
                background: #1F3D2E;                  /* forest */
                border-color: #1F3D2E;
                color: #FFFFFF;
            }
            .search-pill > input:focus-visible + span {
                box-shadow: 0 0 0 3px rgba(31, 61, 46, 0.18);
            }

            /* Suggestion items */
            [data-search-suggestions] .suggest-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.625rem 0.875rem;
                color: #1C1C1A;
                text-decoration: none;
                border-bottom: 1px solid #F1ECE3;
                transition: background-color .12s ease;
            }
            [data-search-suggestions] .suggest-item:last-child { border-bottom: 0; }
            [data-search-suggestions] .suggest-item:hover,
            [data-search-suggestions] .suggest-item.is-active {
                background: #FAF8F4;
            }
            [data-search-suggestions] .suggest-thumb {
                flex-shrink: 0;
                width: 44px;
                height: 44px;
                border-radius: 8px;
                background: #E8E3DA;
                object-fit: cover;
            }
            [data-search-suggestions] .suggest-title {
                font-size: 14px;
                font-weight: 500;
                line-height: 1.25;
            }
            [data-search-suggestions] .suggest-type {
                margin-top: 2px;
                font-size: 11px;
                font-weight: 600;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #D4A036;                       /* terracotta */
            }
            [data-search-suggestions] .suggest-empty {
                padding: 1rem 1rem;
                font-size: 13px;
                color: #5C5A55;
                text-align: center;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            (function () {
                function init(root) {
                    if (root.dataset.searchInit) return;
                    root.dataset.searchInit = '1';

                    const input       = root.querySelector('[data-search-input]');
                    const spinner     = root.querySelector('[data-search-spinner]');
                    const dropdown    = root.querySelector('[data-search-suggestions]');
                    const typeInputs  = root.querySelectorAll('[data-search-type-input]');
                    const suggestUrl  = input.dataset.suggestUrl;

                    let abortCtrl = null;
                    let debounceTimer = null;

                    function selectedType() {
                        const checked = root.querySelector('[data-search-type-input]:checked');
                        return checked ? checked.value : '';
                    }

                    function hide() {
                        dropdown.classList.add('hidden');
                        dropdown.innerHTML = '';
                    }

                    function escapeHtml(s) {
                        return String(s).replace(/[&<>"']/g, c => ({
                            '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'
                        }[c]));
                    }

                    function render(results) {
                        if (!results.length) {
                            dropdown.innerHTML = '<div class="suggest-empty">No matches — try a broader keyword.</div>';
                            dropdown.classList.remove('hidden');
                            return;
                        }

                        dropdown.innerHTML = results.map(r => `
                            <a href="${escapeHtml(r.url)}" class="suggest-item">
                                ${ r.image
                                    ? `<img src="${escapeHtml(r.image)}" alt="" class="suggest-thumb" loading="lazy">`
                                    : `<div class="suggest-thumb"></div>` }
                                <div class="min-w-0 flex-1">
                                    <div class="suggest-title truncate">${escapeHtml(r.title)}</div>
                                    <div class="suggest-type">${escapeHtml(r.type)}</div>
                                </div>
                            </a>
                        `).join('');
                        dropdown.classList.remove('hidden');
                    }

                    async function fetchSuggestions(q) {
                        if (abortCtrl) abortCtrl.abort();
                        abortCtrl = new AbortController();

                        const params = new URLSearchParams({ q });
                        const type = selectedType();
                        if (type) params.set('type', type);

                        spinner.classList.remove('hidden');
                        try {
                            const res = await fetch(`${suggestUrl}?${params.toString()}`, {
                                headers: { 'Accept': 'application/json' },
                                signal: abortCtrl.signal,
                            });
                            if (!res.ok) throw new Error('bad response');
                            const json = await res.json();
                            render(json.results || []);
                        } catch (e) {
                            if (e.name !== 'AbortError') hide();
                        } finally {
                            spinner.classList.add('hidden');
                        }
                    }

                    function onInput() {
                        clearTimeout(debounceTimer);
                        const q = input.value.trim();
                        if (q.length < 2) {
                            hide();
                            spinner.classList.add('hidden');
                            return;
                        }
                        debounceTimer = setTimeout(() => fetchSuggestions(q), 220);
                    }

                    input.addEventListener('input', onInput);
                    input.addEventListener('focus', onInput);

                    // Re-fetch when the type filter changes (if there's already a query)
                    typeInputs.forEach(el => el.addEventListener('change', () => {
                        if (input.value.trim().length >= 2) fetchSuggestions(input.value.trim());
                    }));

                    // Click-outside to dismiss
                    document.addEventListener('click', (e) => {
                        if (!root.contains(e.target)) hide();
                    });

                    // Keyboard: ArrowDown/Up + Enter + Escape
                    let activeIdx = -1;
                    function setActive(idx) {
                        const items = dropdown.querySelectorAll('.suggest-item');
                        if (!items.length) return;
                        activeIdx = (idx + items.length) % items.length;
                        items.forEach((el, i) => el.classList.toggle('is-active', i === activeIdx));
                        items[activeIdx].scrollIntoView({ block: 'nearest' });
                    }
                    input.addEventListener('keydown', (e) => {
                        if (dropdown.classList.contains('hidden')) return;
                        const items = dropdown.querySelectorAll('.suggest-item');
                        if (!items.length) return;

                        if (e.key === 'ArrowDown') { e.preventDefault(); setActive(activeIdx + 1); }
                        else if (e.key === 'ArrowUp') { e.preventDefault(); setActive(activeIdx - 1); }
                        else if (e.key === 'Enter' && activeIdx >= 0) {
                            e.preventDefault();
                            window.location.href = items[activeIdx].getAttribute('href');
                        } else if (e.key === 'Escape') {
                            hide();
                        }
                    });
                }

                function initAll() {
                    document.querySelectorAll('[data-search-root]').forEach(init);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAll);
                } else {
                    initAll();
                }
            })();
        </script>
    @endpush
@endonce
