@props([
    'targetId' => 'listing-grid',   // grid root id with data-category attrs on items
    'categories' => [],             // [['id' => slug, 'name' => 'Everest', 'count' => 5], ...]
    'allLabel' => null,
])

@php
    $allLabel = $allLabel ?? __('listing.filter_all');
    $total = array_sum(array_column($categories, 'count'));
@endphp

<nav
    class="mb-10 flex flex-wrap gap-2"
    role="tablist"
    aria-label="Filter by category"
    data-listing-filter
    data-listing-target="{{ $targetId }}"
>
    <button type="button"
            data-filter-value="all"
            aria-pressed="true"
            class="filter-chip inline-flex items-center gap-2 rounded-full border border-forest bg-forest px-5 py-2.5 text-[13px] font-semibold text-canvas transition">
        {{ $allLabel }}
        <span class="text-[11px] font-medium opacity-75">{{ $total }}</span>
    </button>
    @foreach ($categories as $cat)
        @if (($cat['count'] ?? 0) > 0)
            <button type="button"
                    data-filter-value="{{ $cat['id'] }}"
                    aria-pressed="false"
                    class="filter-chip inline-flex items-center gap-2 rounded-full border border-hairline bg-surface px-5 py-2.5 text-[13px] font-semibold text-ink-muted transition hover:border-forest hover:text-forest">
                {{ $cat['name'] }}
                <span class="text-[11px] font-medium opacity-60">{{ $cat['count'] }}</span>
            </button>
        @endif
    @endforeach
</nav>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-listing-filter]').forEach((nav) => {
        const targetId = nav.getAttribute('data-listing-target');
        const grid = document.getElementById(targetId);
        if (!grid) return;
        const chips = nav.querySelectorAll('.filter-chip');

        chips.forEach((chip) => {
            chip.addEventListener('click', () => {
                const value = chip.getAttribute('data-filter-value');

                // Update aria-pressed + visual state
                chips.forEach((c) => {
                    const active = c === chip;
                    c.setAttribute('aria-pressed', active ? 'true' : 'false');
                    c.classList.toggle('bg-forest', active);
                    c.classList.toggle('border-forest', active);
                    c.classList.toggle('text-canvas', active);
                    c.classList.toggle('bg-surface', !active);
                    c.classList.toggle('border-hairline', !active);
                    c.classList.toggle('text-ink-muted', !active);
                });

                // Show/hide items
                grid.querySelectorAll('[data-category]').forEach((item) => {
                    const cats = (item.getAttribute('data-category') || '').split(' ');
                    const show = value === 'all' || cats.includes(value);
                    item.style.display = show ? '' : 'none';
                });
            });
        });
    });
});
</script>
@endpush
