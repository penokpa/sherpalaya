<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <header class="card--rounded-none image-full  bg-blue-100/50 h-[70dvh]">
            <figure class="h-[70dvh] w-full">
                <img src="{{ asset('/photos/mountain2.jpg') }}" alt="Cookie Policy Image"
                    class="h-[70dvh] w-full object-cover brightness-75" />
            </figure>
            <div class="card-body">
                <div
                    class="absolute bottom-1/2 xl:left-32  left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                    <div class="">
                        <h2 class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-semibold tracking-wider opacity-75">
                            Sherpalaya's
                        </h2>
                        <h1 class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100 antialiased">
                            Cookie Policy
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/' . app()->currentLocale() . '/home'),
            ],
            [
                'name' => 'Cookie Policy',
            ],
        ]" />
        <div class="h-8"></div>
        <div class="mx-4 xl:mx-32">
            <div class="bg-blue-transparent text-blue-600">
                {!! $cookiePolicy !!}
            </div>
        </div>
        <div class="h-16"></div>
        <x-whatsapp-icon />

    </div>
</x-website-layout>
