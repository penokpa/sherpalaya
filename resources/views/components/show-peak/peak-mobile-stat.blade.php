<div class="xl:hidden w-full my-4">
    <div class="stats stats-vertical bg-blue-100/20 w-full rounded-none">
        <div class="stat">
            <div class="stat-title text-primary uppercase font-semibold">Duration</div>
            <div class="stat-value">
                {{ $peak->duration ? $peak->duration . ' Days' : 'N/A' }}
            </div>
            <div class="stat-value">
                <span class="badge badge-outline badge-success text-wrap h-full">
                    @if (!empty($peak->best_time_for_peak))
                        Best Time: {{ $peak->best_time_for_peak }}
                    @endif
                </span>
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-primary uppercase font-semibold">Difficulty</div>
            <div class="stat-value">
                @if ($peak->grade)
                    <span class="badge badge-outline badge-primary">Grade:
                        {{ $peak->grade }}</span>
                @endif
                @if ($peak->peak_difficulty)
                    <span
                        class="badge badge-outline badge-error">{{ $peak->peak_difficulty->getLabel() }}</span>
                @endif
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-primary uppercase font-semibold">Altitude</div>
            <div class="stat-value">

                @if (!empty($peak->starting_altitude))
                    <span class="badge badge-outline">
                        Start: {{ $peak->starting_altitude }}
                    </span>
                @endif

                @if (!empty($peak->highest_altitude))
                    <span class="badge badge-outline">
                        Highest: {{ $peak->highest_altitude }}
                    </span>
                @endif
                </span>
            </div>
        </div>
    </div>
</div>