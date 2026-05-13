@props([
    'targetId' => 'scrollspy-1',
    'items' => [],   // [['href' => '#section', 'icon' => 'tabler--x', 'label' => 'Overview'], ...]
])

<nav data-scrollspy="#{{ $targetId }}"
     class="sticky top-0 z-30 bg-canvas/95 backdrop-blur-md border-y border-hairline"
     role="tablist" aria-label="Section navigation">
    <div class="mx-auto max-w-7xl px-6 lg:px-12">
        <ul class="flex gap-1 overflow-x-auto horizontal-scrollbar">
            @foreach ($items as $i => $item)
                <li>
                    <a href="{{ $item['href'] }}"
                       class="inline-flex items-center gap-2 px-4 py-4 text-[13px] font-semibold uppercase tracking-[0.12em] text-ink-muted whitespace-nowrap border-b-2 border-transparent hover:text-forest hover:border-forest/30 scrollspy-active:text-forest scrollspy-active:border-forest transition">
                        @if (!empty($item['icon']))
                            <span class="icon-[{{ $item['icon'] }}] size-4"></span>
                        @endif
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
