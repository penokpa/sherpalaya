<x-website-layout>
    {{-- <x-trek.trek-landing-page /> --}}
    <div class="bg-blue-100/10 font-body">
        <header class="card--rounded-none image-full bg-blue-100/50 h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->trek_page_cover_image_id ?? null" fallback="default"
                    loading="lazy" alt="Trek Cover Image"/>
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-semibold tracking-wider opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->trek_page_title_up_fr : $pageSetting->trek_page_title_up_en }}
                    </h2>
                    <h1
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100 antialiased">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->trek_page_main_title_fr : $pageSetting->trek_page_main_title_en }}
                    </h1>
                    <h3
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-semibold tracking-wider opacity-75 ">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->trek_page_title_down_fr : $pageSetting->trek_page_title_down_en }}
                    </h3>
                </div>
            </div>
        </header>

        <div class="bg-blue-100/30">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/' . app()->currentLocale() . '/home'),
                ],
                [
                    'name' => 'Treks',
                ],
            ]" />
            <div class="h-4 "></div>
            <article class="xl:mx-32 mx-4 text-justify">
                <div class="text-md text-justify  mt-2  text-stone-600 font-body text-lg/7 font-light ">
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->trek_page_content_fr : $pageSetting->trek_page_content_en }}
                </div>
            </article>
            <div class="h-12 "></div>
        </div>

        <div class="h-12"></div>
        <div class="xl:mx-32 mx-4">
            <div class="h-4"></div>
            <nav class="sticky top-0 z-30 tabs bg-white horizontal-scrollbar md:justify-end py-4 md:gap-8 gap-2"
                aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="tab active-tab:tab-active active-tab:font-extrabold active text-base font-medium "
                    id="tabs-center-item-all" data-tab="#trek-tabs-center-all" aria-controls="trek-tabs-center-all"
                    role="tab" aria-selected="true">
                    ALL
                </button>
                @foreach ($allTreks as $index => $trekCategory)
                    @if ($trekCategory->treks->count() > 0)
                        <button type="button"
                            class="tab active-tab:tab-active active-tab:font-extrabold uppercase text-nowrap text-base font-medium "
                            id="trek-tabs-center-item-{{ $trekCategory->id }}"
                            data-tab="#trek-tabs-center-{{ $trekCategory->id }}"
                            aria-controls="trek-tabs-center-{{ $trekCategory->id }}" role="tab"
                            aria-selected="false">
                            {{ $trekCategory->name }}
                        </button>
                    @endif
                @endforeach
            </nav>
            <main class="mt-8">
                <div id="trek-tabs-center-all" role="tabpanel" aria-labelledby="tabs-center-item-all">
                    <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                        @foreach ($allTreks as $allTrek)
                            @foreach ($allTrek->treks as $catTrek)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[40vh] w-full">
                                        <img src="{{ optional($catTrek->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $catTrek->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a
                                        href="{{ route('show_trek', ['id' => $catTrek->id, 'locale' => app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center group ">
                                            <div class="text-center font-oswald tracking-wide font-medium ">
                                                <h3 class=" text-blue-50 text-3xl uppercase group-hover:text-warning text-balance">
                                                    {{ $catTrek->title }}
                                                </h3>
                                                <h4
                                                    class=" text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $catTrek->highest_altitude }} m
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($allTreks as $index => $trekCategory)
                    <div id="trek-tabs-center-{{ $trekCategory->id }}" role="tabpanel"
                        aria-labelledby="trek-tabs-center-item-{{ $trekCategory->id }}"
                        class="@if ($index !== -1) hidden @endif ">
                        <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                            @foreach ($trekCategory->treks as $trek)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[40vh] w-full">
                                        <img src="{{ optional($trek->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $trek->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a
                                        href="{{ route('show_trek', ['id' => $trek->id, 'locale' => app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center font-oswald tracking-wide font-medium">
                                                <h3 class=" text-blue-50 text-3xl uppercase group-hover:text-warning text-balance">
                                                    {{ $trek->title }}
                                                </h3>
                                                <h4
                                                    class=" tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $trek->highest_altitude }} m
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </main>
        </div>


        <div class="h-12"></div>
        <x-whatsapp-icon />

    </div>

</x-website-layout>
