@php $locale = app()->currentLocale(); @endphp

<x-website-layout :overHero="true">
    <x-listing.hero
        :image="asset('photos/mountain2.jpg')"
        :eyebrow="__('blog.eyebrow')"
        :title="__('blog.title')"
        :subtitle="__('blog.subtitle')"
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => __('blog.eyebrow')],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-7xl px-6 py-14 lg:py-20 lg:px-12 space-y-12">

            @if ($featured)
                <x-blog.post-card :post="$featured" variant="featured" />
            @endif

            @if ($posts->count() > 0)
                <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <x-blog.post-card :post="$post" />
                    @endforeach
                </div>

                @if ($posts->hasPages())
                    <div class="pt-4">
                        {{ $posts->links() }}
                    </div>
                @endif
            @elseif (!$featured)
                <div class="rounded-2xl border border-ink/10 bg-surface p-12 text-center">
                    <span class="icon-[tabler--book-2] size-10 text-ink/40 mb-4 inline-block"></span>
                    <p class="text-ink/70 text-[15px]">{{ __('blog.empty') }}</p>
                </div>
            @endif
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
