<x-website-layout :seoData="$seoData">
    <div class="bg-blue-100/10 font-body">
        <div data-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-1" class="">
            <div id="scrollspy-scrollable-parent-1" class="">
                {{-- topsection --}}
                <div class="bg-blue-100/20">
                    {{-- top section card --}}

                    <x-show-expedition.expedition-top-section-card :expedition="$expedition" />

                    {{-- end-section-card --}}


                    <x-breadcrumb :breadcrumbs="[
                        [
                            'name' => 'Home',
                            'url' => url('/' . app()->currentLocale() . '/home'),
                        ],
                        [
                            'name' => 'Expeditions',
                            'url' => url('/' . app()->currentLocale() . '/expeditions'),
                        ],
                        [
                            'name' => $expedition->title,
                        ],
                    ]" />

                    <div class="xl:mx-32 mx-4 text-left">

                        {{-- description --}}
                        <x-show-expedition.expedition-description :expedition="$expedition" />
                        {{-- end description --}}

                        <div class="h-4  "></div>

                    </div>

                    <div class="h-12 "></div>

                </div>
                {{-- mobile-booking-section --}}
                <x-booking.mobile-booking-section :bookingFor="$expedition" />

                {{-- stat-mobile --}}

                <x-show-expedition.expedition-mobile-stat :expedition="$expedition" />
                {{-- end-stat-section --}}

                {{-- scrollspy navigation --}}
                <x-show-expedition.expedition-scroll-spy-navigation :expedition="$expedition" />


                {{-- scrollspy body --}}

                <div class="bg-transparent">
                    <div class=" mx-4 xl:mx-32 gap-2 max-w-full ">
                        <main class="xl:grid grid-cols-3  gap-6">
                            <div class="xl:col-span-2 ">
                                {{-- key_highlights --}}
                                <x-show-expedition.scroll-spy-body.expedition-key-highlight :expedition="$expedition" />
                                {{-- end_key_highlights --}}



                                {{-- itineraries --}}
                                <x-show-expedition.scroll-spy-body.expedition-itinerary :expedition="$expedition" />

                                {{-- cost-info --}}
                                <x-show-expedition.scroll-spy-body.expedition-cost-info :expedition="$expedition" />

                                {{-- essential_tips --}}
                                <x-show-expedition.scroll-spy-body.expedition-essential-tip :expedition="$expedition" />

                                {{-- gallery --}}
                                <x-show-expedition.scroll-spy-body.expedition-gallery :expedition="$expedition" />

                                {{-- destinations --}}
                                {{-- <x-show-expedition.scroll-spy-body.expedition-destination :expedition="$expedition" /> --}}

                                <div class="h-10"></div>
                            </div>

                            <aside class=" ">
                                <div class="h-8"></div>
                                <div class="sticky top-20 hidden xl:block">
                                    {{-- stat --}}
                                    <x-show-expedition.expedition-stat-section :expedition="$expedition" />

                                    {{-- booking-section --}}
                                    <x-booking.booking-section :bookingFor="$expedition" />

                                    <div class="h-10"></div>
                                </div>
                            </aside>
                        </main>
                        <x-show-recommendation :recommendFor="$expedition" />
                        

                    </div>
                </div>
                {{-- scrollspy-body -end --}}
            </div>
        </div>
    </div>

</x-website-layout>
