@php
    $latestPosts = App\Models\Post::published()
        ->orderByDesc('published_at')
        ->with('coverImage')
        ->limit(3)
        ->get();

    $locale = app()->currentLocale();
    $count = $latestPosts->count();

    // Adaptive grid so 1 or 2 posts don't look like a broken row.
    $gridCols = match (true) {
        $count >= 3 => 'lg:grid-cols-3',
        $count === 2 => 'md:grid-cols-2',
        default => 'md:grid-cols-1',  // single post — use featured variant below
    };
@endphp

@if ($count > 0)
    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:py-24 lg:px-12">

            {{-- Header — eyebrow + title + "all stories" link --}}
            <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <p class="mb-3 text-[12px] font-semibold uppercase tracking-[0.18em] text-terracotta">
                        {{ __('blog.eyebrow') }}
                    </p>
                    <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight tracking-tighter-display text-ink">
                        {{ __('blog.title') }}
                    </h2>
                </div>
                <a href="{{ url('/' . $locale . '/blog') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-forest hover:text-terracotta transition">
                    {{ __('blog.view_all') }}
                    <span class="icon-[tabler--arrow-right] size-4"></span>
                </a>
            </div>

            @if ($count === 1)
                {{-- Single post → use the featured 2-col card so it doesn't look orphaned in a grid --}}
                <x-blog.post-card :post="$latestPosts->first()" variant="featured" />
            @else
                <div class="grid gap-7 {{ $gridCols }}">
                    @foreach ($latestPosts as $post)
                        <x-blog.post-card :post="$post" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
