<div id="itineraries" class="card 2xl:max-w-full rounded-none bg-blue-100/20">
    @if ($tour->itineraries->isNotEmpty())
        <div class="h-6">
        </div>
        <div class="card-header px-2" data-aos="fade-down" data-aos-duration="1200">
            <h5 class="card-title text-primary uppercase font-semi-bold text-2xl">
                Itineraries
            </h5>
        </div>
        <div class="card-body mx-0 px-2">
            <div class="accordion">
                @foreach ($tour->itineraries as $itinerary)
                    <div class="accordion-item " id="itinerary-{{ $itinerary->id }}" data-aos="fade-down" data-aos-duration="1200">
                        @if (!empty($itinerary->title))
                            <button
                                class="accordion-toggle inline-flex items-center gap-x-4 text-start text-black font-medium  uppercase px-0"
                                aria-controls="itinerary-{{ $itinerary->id }}-collapse" aria-expanded="false">
                                <div class="card  flex flex-row gap-2 bg-blue-100/40 m-0 p-2 text-base text-slate-900">
                                    <span
                                        class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    {{ $itinerary->title }}
                                </div>
                            </button>
                            <div id="itinerary-{{ $itinerary->id }}-collapse"
                                class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="itinerary-{{ $itinerary->id }}" role="region">
                                <div class=" ">
                                    <div class="cardbg-blue-50 rounded-none mx-0 px-0">
                                        <div class="card-body justify-center items-start py-2 px-0">
                                            @foreach ($itinerary->itineraryDetails as $detail)
                                                @php
                                                    // Map icons to types
                                                    $icons = [
                                                        'flight' => 'icon-[material-symbols-light--flight-takeoff]',
                                                        'drive' =>
                                                            'icon-[material-symbols-light--directions-bus-outline]',
                                                        'tour' => 'icon-[material-symbols-light--hiking-rounded]',
                                                        'tour-hours' => 'icon-[tabler--clock]',
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
                                                <h5
                                                    class="card-title mb-2 text-lg md:text-xl text-blue-600 uppercase font-semibold ">
                                                    <span
                                                        class="{{ $icon }} accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                                    {{ $detail->type->getLabel() }}
                                                </h5>
                                                <p class="mb-4 px-8 text-slate-800 text-base lowercase">
                                                    {{ $detail->description }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div>
                                        @if (!empty($itinerary->destinations))
                                            <div class="card-body bg-transparent w-full p-0">
                                                <div class="flex items-center gap-4 justify-start my-2  font-normal text-blue-600">
                                                    <span class="icon-[tabler--sun-high] size-4"></span>
                                                    <div>
                                                        <h5
                                                            class="card-title  uppercase text-xl ">
                                                            Highlighted Places
                                                        </h5>
                                                    </div>
                                                </div>

                                                @foreach ($itinerary->destinations->take(3) as $itineraryDestination)
                                                    @php
                                                        $destinationImages = $itineraryDestination->destinationImages->take(
                                                            3,
                                                        );
                                                    @endphp

                                                    <h5
                                                        class="card-title mb-1 pt-0 px-8 text-slate-600 uppercase font-bold text-base">
                                                        {{ $itineraryDestination->name }}
                                                    </h5>

                                                    <!-- Grid Layout for Larger Screens -->
                                                    @if ($destinationImages->isNotEmpty())
                                                        <div
                                                            class="px-8 sm:grid sm:grid-cols-2 md:grid-cols-3 flex flex-col gap-1">
                                                            @foreach ($destinationImages as $image)
                                                                <figure>
                                                                    <img src="{{ $image->url }}"
                                                                        alt="{{ $itineraryDestination->name }} Cover Image"
                                                                        class="h-48 w-full object-cover" />

                                                                </figure>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    <p class="mb-4 mt-1.5 px-8 text-slate-900 text-sm">
                                                        {{ $itineraryDestination->description }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
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
</div>
