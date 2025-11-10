<div class="xl:hidden w-full my-4 font-oswald">
    <div class="stats stats-vertical bg-blue-100/20 w-full rounded-none">
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal">Duration</div>
            <div class="stat-value font-normal">
                {{ $expedition->duration ? $expedition->duration . ' Days' : 'N/A' }}
            </div>
            <div class="stat-value font-body">
                <span class="badge badge-outline badge-success text-wrap h-full text-lg px-2">
                    @if (!empty($expedition->best_time_for_expedition))
                        Best Time: {{ $expedition->best_time_for_expedition }}
                    @endif
                </span>
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal">Difficulty</div>
            <div class="stat-value font-body">
                @if ($expedition->grade)
                    <span class="badge badge-outline badge-primary text-lg">Grade:
                        {{ $expedition->grade }}</span>
                @endif
                @if ($expedition->expedition_difficulty)
                    <span
                        class="badge badge-outline badge-error text-lg">{{ $expedition->expedition_difficulty->getLabel() }}</span>
                @endif
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal">Altitude</div>
            <div class="stat-value font-body">

                @if (!empty($expedition->starting_altitude))
                    <span class="badge badge-outline text-lg">
                        Start: {{ $expedition->starting_altitude }}
                    </span>
                @endif

                @if (!empty($expedition->highest_altitude))
                    <span class="badge badge-outline text-lg">
                        Highest: {{ $expedition->highest_altitude }}
                    </span>
                @endif
                </span>
            </div>
        </div>
    </div>
</div>