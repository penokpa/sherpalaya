<div class="w-full my-4">
    <div class="stats stats-vertical bg-blue-100/50 w-full rounded-none">
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal ">Duration</div>
            <div class="stat-value font-normal tracking-wider">
                {{ $tour->duration ? $tour->duration . ' Days' : 'N/A' }}
            </div>
            <div class="stat-value font-body">
                <span class="badge badge-outline badge-success text-wrap h-full font-normal text-base px-2">
                    @if (!empty($tour->best_time_for_tour))
                        Best Time: {{ $tour->best_time_for_tour }}
                    @endif
                </span>
            </div>
        </div>
        <div class="stat ">
            <div class="stat-title text-black uppercase font-normal">Difficulty</div>
            <div class="stat-value font-body">
                @if ($tour->grade)
                    <span class="badge badge-outline badge-primary text-base">Grade:
                        {{ $tour->grade }}</span>
                @endif
                @if ($tour->tour_difficulty)
                    <span class="badge badge-outline badge-error text-base">{{ $tour->tour_difficulty->getLabel() }}</span>
                @endif
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal">Altitude</div>
            <div class="stat-value font-body">
                @if (!empty($tour->starting_altitude))
                    <span class="badge badge-outline text-base">
                        Start: {{ $tour->starting_altitude }}M
                    </span>
                @endif

                @if (!empty($tour->highest_altitude))
                    <span class="badge badge-outline text-base">
                        Highest: {{ $tour->highest_altitude }}M
                    </span>
                @endif
                </span>
            </div>
        </div>
    </div>
</div>



{{-- <div class="md:hidden w-full mb-4">
    <div class="stats stats-vertical bg-blue-100/20 w-full rounded-none">
        <div class="stat ">
            <div class="stat-title">Duration</div>
            <div class="stat-value">
                {{ $tour->duration ? $tour->duration . ' Days' : 'N/A' }}
            </div>
            <div class="stat-value">
                <span class="badge badge-outline badge-success text-wrap h-full">
                    @if (!empty($tour->best_time_for_tour))
                        Best Time: {{ $tour->best_time_for_tour }}
                    @endif
                </span>
            </div>
        </div>
        <div class="stat">
            <div class="stat-title">Difficulty</div>
            <div class="stat-value">
                @if ($tour->grade)
                    <span class="badge badge-outline badge-primary">Grade:
                        {{ $tour->grade }}</span>
                @endif
                @if ($tour->tour_difficulty)
                    <span class="badge badge-outline badge-error">{{ $tour->tour_difficulty->getLabel() }}</span>
                @endif
            </div>
        </div>
        <div class="stat">
            <div class="stat-title">Altitude</div>
            <div class="stat-value">

                @if (!empty($tour->starting_altitude))
                    <span class="badge badge-outline">
                        Start: {{ $tour->starting_altitude }}
                    </span>
                @endif

                @if (!empty($tour->highest_altitude))
                    <span class="badge badge-outline">
                        Highest: {{ $tour->highest_altitude }}
                    </span>
                @endif
                </span>
            </div>
        </div>
    </div>
</div> --}}
