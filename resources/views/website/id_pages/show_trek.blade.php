<x-website-layout :seoData="$seoData">
    <div class="bg-blue-100/10 font-body">
        <div data-scrollspy-scrollable-parent="#scrollspy-scrollable-parent-1">
            <div id="scrollspy-scrollable-parent-1 overflow-x-hidden">

                {{-- topsection --}}
                <div class="bg-blue-100/20">
                    {{-- top section card --}}
                    <x-show-trek.top-section-card :trek="$trek" />
                    {{-- end-section-card --}}


                    <x-breadcrumb :breadcrumbs="[
                        [
                            'name' => 'Home',
                            'url' => url('/' . app()->currentLocale() . '/home'),
                        ],
                        [
                            'name' => 'Treks',
                            'url' => url('/' . app()->currentLocale() . '/treks'),
                        ],
                        [
                            'name' => $trek->title,
                        ],
                    ]" />

                    <div class="xl:mx-32 mx-4 text-left">
                        {{-- description --}}
                        <x-show-trek.description :trek="$trek" />
                        {{-- end description --}}
                        <div class="h-4  "></div>

                    </div>

                    <div class="h-12 "></div>

                </div>

                {{-- end-top-section --}}


                {{-- mobile-booking-section --}}

                <x-booking.mobile-booking-section :bookingFor="$trek" />



                {{-- stat-mobile --}}
                <x-show-trek.mobile-stat :trek="$trek" />
                {{-- end-stat-section --}}



                {{-- scrollspy navigation --}}
                <x-show-trek.scroll-spy-navigation />
                {{-- end scrollspy navigation --}}



                {{-- scrollspy body --}}
                <div class="bg-transparent">
                    <div class="mx-4 xl:mx-32 gap-2 max-w-full ">
                        <main class="xl:grid grid-cols-3  gap-6">
                            <div class="xl:col-span-2 ">
                                {{-- key_highlights --}}
                                <x-show-trek.scroll-spy-body.key-highlight :trek="$trek" />
                                {{-- end_key_highlights --}}



                                {{-- itineraries --}}
                                <x-show-trek.scroll-spy-body.itinerary :trek="$trek" />

                                {{-- cost-info --}}
                                <x-show-trek.scroll-spy-body.cost-info :trek="$trek" />

                                {{-- essential_tips --}}
                                <x-show-trek.scroll-spy-body.essential-tip :trek="$trek" />

                                {{-- gallery --}}
                                <x-show-trek.gallery :trek="$trek" />

                                {{-- destinations --}}
                                {{-- <x-show-trek.scroll-spy-body.destination :trek="$trek" /> --}}

                                {{-- recommendation --}}
                                <div class="h-10"></div>
                            </div>

                            <aside class=" ">
                                <div class="h-8"></div>
                                <div class="sticky top-20 hidden xl:block">
                                    {{-- stat --}}
                                    <x-show-trek.stat-section :trek="$trek" />

                                    {{-- booking-section --}}
                                    <x-booking.booking-section :bookingFor="$trek" />

                                    <div class="h-10"></div>
                                </div>
                            </aside>
                        </main>
                        <x-show-recommendation :recommendFor="$trek" />

                    </div>
                </div>
                {{-- scrollspy-body -end --}}

            </div>
        </div>
    </div>
</x-website-layout>
