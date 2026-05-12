<x-website-layout :seoData="$seoData">
    <div class="bg-blue-100/10 font-oswald">
        <div data-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-1" class="">
            <div id="scrollspy-scrollable-parent-1" class="">
                {{-- topsection --}}
                <div class="bg-blue-100/30">
                    {{-- top section card --}}
                    <x-show-tour.tour-top-section-card :tour="$tour" />
                    {{-- end-section-card --}}

                    <x-breadcrumb :breadcrumbs="[
                        [
                            'name' => 'Home',
                            'url' => url('/' . app()->currentLocale() . '/home'),
                        ],
                        [
                            'name' => 'Tours',
                            'url' => url('/' . app()->currentLocale() . '/tours'),
                        ],
                        [
                            'name' => $tour->title,
                        ],
                    ]" />
                    <div class="h-4"></div>

                    <div class="xl:mx-32 mx-4 text-left">
                        {{-- description --}}
                        <x-show-tour.tour-description :tour="$tour" />
                        {{-- end description --}}
                        <div class="h-4  "></div>



                    </div>

                    <div class="h-12 "></div>

                </div>



                {{-- mobile section tour --}}
                <x-booking.mobile-booking-section :bookingFor="$tour" />


                {{-- stat-mobile --}}

                <x-show-tour.tour-mobile-stat :tour="$tour" />
                {{-- end-stat-section --}}

                {{-- scrollspy navigation --}}
                <x-show-tour.tour-scroll-spy-navigation :tour="$tour" />


                {{-- scrollspy body --}}

                <div class="bg-blue-100/10">
                    <div class=" mx-4 xl:mx-32 gap-2 max-w-full ">
                        <main class="xl:grid grid-cols-3  gap-6">
                            <div class="xl:col-span-2 ">
                                {{-- key_highlights --}}
                                <x-show-tour.scroll-spy-body.tour-key-highlight :tour="$tour" />
                                {{-- end_key_highlights --}}



                                {{-- itineraries --}}
                                <x-show-tour.scroll-spy-body.tour-itinerary :tour="$tour" />

                                {{-- cost-info --}}
                                <x-show-tour.scroll-spy-body.tour-cost-info :tour="$tour" />

                                {{-- essential_tips --}}
                                <x-show-tour.scroll-spy-body.tour-essential-tip :tour="$tour" />

                                {{-- gallery --}}
                                <x-show-tour.scroll-spy-body.tour-gallery :tour="$tour" />

                                {{-- destinations --}}
                                {{-- <x-show-tour.scroll-spy-body.tour-destination :tour="$tour" /> --}}



                                <div class="h-10 "></div>
                            </div>

                            <aside class=" ">
                                <div class="h-8"></div>
                                <div class="sticky top-20 hidden xl:block">
                                    {{-- stat --}}
                                    <x-show-tour.tour-stat-section :tour="$tour" />

                                    {{-- booking-section --}}
                                    <x-booking.booking-section :bookingFor="$tour" />

                                    <div class="h-10"></div>
                                </div>
                            </aside>
                        </main>
                        <x-show-recommendation :recommendFor="$tour" />

                    </div>
                </div>
                {{-- scrollspy-body -end --}}
            </div>
        </div>
    </div>

</x-website-layout>
