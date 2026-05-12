<section id="itineraries" class="card 2xl:max-w-full rounded-none bg-blue-50/10">
    @if ($tour->itineraries->isNotEmpty())
        <div class="h-6">
        </div>
        <div class="card-header px-2" data-aos="fade-down" data-aos-duration="1200">
            <h3 class="card-title text-black uppercase tracking-normal font-body font-bold text-3xl">
                {{ __('show-page.itinerary') }}
            </h3>
        </div>
        <div class="card-body mx-0 px-2">
            <div class="accordion">
                @foreach ($tour->itineraries as $itinerary)
                    <div class="accordion-item " id="itinerary-{{ $itinerary->id }}">
                        @if (!empty($itinerary->title))
                            <button
                                class="accordion-toggle inline-flex items-center gap-x-4 text-start text-black font-normal font-body tracking-wide  px-0"
                                aria-controls="itinerary-{{ $itinerary->id }}-collapse" aria-expanded="false">
                                <h4 class="card flex flex-row gap-2 bg-blue-100/40 m-0 p-2 text-lg">
                                    <span
                                        class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    {{ $itinerary->title }}
                                </h4>
                            </button>
                            <div id="itinerary-{{ $itinerary->id }}-collapse"
                                class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="itinerary-{{ $itinerary->id }}" role="region">
                                <div class="">
                                    <div class="card bg-transparent rounded-none mx-0 px-0">
                                        <div class="card-body justify-center items-start py-2 px-0">
                                            @foreach ($itinerary->itineraryDetails as $detail)
                                                @php
                                                    // Map icons to types
                                                    $icons = [
                                                        'flight' => 'icon-[material-symbols-light--flight-takeoff]',
                                                        'drive' =>
                                                            'icon-[material-symbols-light--directions-bus-outline]',
                                                        'trek' => 'icon-[material-symbols-light--hiking-rounded]',
                                                        'trek-hours' => 'icon-[tabler--clock]',
                                                        'rest' => 'icon-[material-symbols-light--airline-seat-flat]',
                                                        'helicopter' =>
                                                            'icon-[material-symbols-light--helicopter-outline]',
                                                        'accomodation' =>
                                                            'icon-[material-symbols-light--king-bed-outline-sharp]',
                                                        'himalaya' => 'icon-[mingcute--mountain-2-line]',
                                                        'altitude' => 'icon-[tabler--arrow-up]',
                                                        'others' => 'icon-[tabler--dots]',
                                                    ];
                                                    // Convert enum to its string value
                                                    $type = $detail->type->value;
                                                    $icon = $icons[$type] ?? 'icon-[tabler--help-circle]'; // Default icon if type is missing
                                                @endphp
                                                <h3
                                                    class="card-title flex gap-2 mb-2  text-lg/7 items-center  text-black capitalize font-medium font-body">
                                                    <span
                                                        class="{{ $icon }} accordion-item-active:rotate-90 size-6 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                                    <span> {{ $detail->type->getLabel() }}</span>
                                                </h3>
                                                <p
                                                    class="mb-6 px-8 text-black font-body font-light tracking-wide text-lg/7 break-all">
                                                    {{ $detail->description }}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- <div>
                                        @if (!empty($itinerary->destinations))
                                            <div class="card-body bg-transparent w-full p-0">
                                                <div class="flex items-center gap-2 justify-start text-black">
                                                    <span class="icon-[tabler--sun-high] size-6"></span>
                                                    <div>
                                                        <h5
                                                            class="card-title uppercase text-lg/7 font-body font-medium tracking-tight ">
                                                            Highlighted Places
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="h-4"></div>


                                                @foreach ($itinerary->destinations->take(3) as $itineraryDestination)
                                                    @php
                                                        $destinationImages = $itineraryDestination->destinationImages->take(
                                                            3,
                                                        );
                                                    @endphp

                                                    <h5
                                                        class="card-title pt-0 px-8 mb-1 text-black tracking-normal font-medium capitalize font-body text-lg/7">
                                                        {{ $itineraryDestination->name }}
                                                    </h5>
                                                    <p class="mb-2 px-8 text-black text-lg/6 font-body font-light">
                                                        {{ $itineraryDestination->description }}
                                                    </p>
                                                    <!-- Grid Layout for Larger Screens -->
                                                    @if ($destinationImages->isNotEmpty())
                                                        <div
                                                            class="px-8 sm:grid sm:grid-cols-2 md:grid-cols-3 flex flex-col gap-1 mb-6">
                                                            @foreach ($destinationImages as $image)
                                                                <figure>
                                                                    <img src="{{ $image->url }}"
                                                                        alt="{{ $itineraryDestination->name }} Cover Image"
                                                                        class="h-48 w-full object-cover" />
                                                                </figure>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="h-6">
        </div>
    @endif
</section>
