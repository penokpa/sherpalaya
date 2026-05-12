<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <header class="card--rounded-none image-full bg-blue-100/50 h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->tour_page_cover_image_id ?? null" fallback="default"
                    loading="lazy" alt="activity background image"/>
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-semibold tracking-wider opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->tour_page_title_up_fr : $pageSetting->tour_page_title_up_en }}
                    </h2>
                    <h1
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->tour_page_main_title_fr : $pageSetting->tour_page_main_title_en }}

                    </h1>
                    <h3
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-semibold tracking-wider opacity-75 ">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->tour_page_title_down_fr : $pageSetting->tour_page_title_down_en }}
                    </h3>
                </div>
            </div>
        </header>

        <div class="bg-blue-100/20">
            <x-breadcrumb :breadcrumbs="[
                [
                    'name' => 'Home',
                    'url' => url('/' . app()->currentLocale() . '/home'),
                ],
                [
                    'name' => 'Activities',
                ],
            ]" />
            <div class="h-4"></div>
            <article class="xl:mx-32 mx-4 text-justify">
                <div class="text-lg/7   text-stone-600 font-light font-body">
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->tour_page_content_fr : $pageSetting->tour_page_content_en }}
                </div>
            </article>
            <div class="h-14"></div>
        </div>

        {{-- Showing <strong>{{ $tourRegion->tours->count() }}</strong> --}}
        <div class="xl:mx-32 mx-4">
            <div class="h-4"></div>
            <nav class="sticky top-0 z-30 tabs  gap-2 md:gap-4  bg-white horizontal-scrollbar md:justify-end py-4"
                aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="tab active-tab:tab-active active-tab:font-extrabold active text-base font-medium"
                    id="tabs-center-item-all-tour" data-tab="#tabs-center-all-tour" aria-controls="tabs-center-all-tour"
                    role="tab" aria-selected="true">
                    ALL
                </button>
                @foreach ($allTours as $index => $tourCategory)
                    @if ($tourCategory->tours->count() > 0)
                        <button type="button"
                            class="tab active-tab:tab-active active-tab:font-extrabold uppercase text-nowrap text-base font-medium"
                            id="tour-tabs-center-item-{{ $tourCategory->id }}"
                            data-tab="#tour-tabs-center-{{ $tourCategory->id }}"
                            aria-controls="tour-tabs-center-{{ $tourCategory->id }}" role="tab"
                            aria-selected="false">
                            {{ $tourCategory->name }}
                        </button>
                    @endif
                @endforeach
            </nav>
            <main class="mt-8">
                <div id="tabs-center-all-tour" role="tabpanel" aria-labelledby="tabs-center-item-all-tour">
                    <div class="flex flex-col md:grid md:grid-cols-2  gap-2">
                        @foreach ($allTours as $allExpedition)
                            @foreach ($allExpedition->tours as $tour)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[40vh] w-full">
                                        <img src="{{ optional($tour->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $tour->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a
                                        href="{{ route('show_tour', ['id' => $tour->id, 'locale' => app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center font-oswald">
                                                <h3
                                                    class="font-medium text-blue-50 text-3xl uppercase group-hover:text-warning text-balance">
                                                    {{ $tour->title }}
                                                </h3>
                                                <h4
                                                    class="font-medium tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $tour->duration }}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($allTours as $index => $tourCategory)
                    <div id="tour-tabs-center-{{ $tourCategory->id }}" role="tabpanel"
                        aria-labelledby="tour-tabs-center-item-{{ $tourCategory->id }}"
                        class="@if ($index !== -1) hidden @endif ">
                        <div class="flex flex-col md:grid md:grid-cols-2  gap-1">
                            @foreach ($tourCategory->tours as $tour)
                                <div
                                    class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border ">
                                    <figure class="h-[40vh] w-full">
                                        <img src="{{ optional($tour->coverImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                            alt="{{ $tour->title }} Cover Image"
                                            class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                                    </figure>
                                    <a
                                        href="{{ route('show_tour', ['id' => $tour->id, 'locale' => app()->currentLocale()]) }}">
                                        <div class="card-body absolute inset-0 justify-center">
                                            <div class="text-center font-oswald">
                                                <h3
                                                    class="font-medium text-blue-50 text-3xl uppercase group-hover:text-warning text-balance">
                                                    {{ $tour->title }}
                                                </h3>
                                                <h4
                                                    class="font-medium tracking-normal text-blue-50 line-clamp-2 text-3xl group-hover:text-warning">
                                                    {{ $tour->duration }}
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
            <div class="h-10"></div>
        <x-whatsapp-icon />

        </div>
</x-website-layout>
