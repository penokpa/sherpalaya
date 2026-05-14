@php $locale = app()->currentLocale(); @endphp

<x-website-layout>
    <x-listing.hero
        :image="asset('photos/mountain2.jpg')"
        eyebrow="Legal"
        title="Privacy Policy"
        subtitle="How we collect, use, and protect your data."
    />

    <x-breadcrumb :breadcrumbs="[
        ['name' => 'Home', 'url' => url('/' . $locale . '/home')],
        ['name' => 'Privacy Policy'],
    ]" />

    <section class="bg-canvas">
        <div class="mx-auto max-w-4xl px-6 py-16 lg:py-20 lg:px-12">
            <article class="prose prose-lg max-w-none text-ink/85 leading-relaxed font-sans prose-headings:font-display prose-headings:text-ink prose-headings:font-medium prose-headings:tracking-tightish prose-a:text-forest hover:prose-a:text-terracotta">
                {!! $privacyPolicy !!}
            </article>
        </div>
    </section>

    <x-whatsapp-icon />
</x-website-layout>
