<div class="xl:hidden w-full my-4 font-oswald">
    <div class="stats stats-vertical bg-blue-100/50 w-full rounded-lg shadow-sm shadow-gray-200">

        @if (!empty($expedition->duration) || !empty($expedition->best_time_for_expedition))
            <div class="stat">
                @if (!empty($expedition->duration))
                    <div class="stat-title text-black uppercase font-normal">
                        {{ __('show-page.duration') }}
                    </div>
                    <div class="stat-value font-normal tracking-wider">
                        {{ $expedition->duration ? $expedition->duration . ' Days' : 'N/A' }}
                    </div>
                @endif
                @if (!empty($expedition->best_time_for_expedition))
                    <div class="stat-value font-body">
                        <span class="badge badge-outline badge-success text-wrap h-full font-normal text-base px-2">
                            {{ __('show-page.best-time') }} {{ $expedition->best_time_for_expedition }}
                        </span>
                    </div>
                @endif
            </div>
        @endif

        @if (!empty($expedition->grade) || !empty($expedition->expedition_difficulty))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.difficulty') }}
                </div>
                <div class="stat-value font-body">
                    @if (!empty($expedition->grade))
                        <span class="badge badge-outline badge-primary text-base">
                            {{ __('show-page.grade') }} {{ $expedition->grade }}
                        </span>
                    @endif
                    @if (!empty($expedition->expedition_difficulty))
                        <span class="badge badge-outline badge-error text-base">
                            {{ $expedition->expedition_difficulty->getLabel() }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

        @if (!empty($expedition->starting_altitude) || !empty($expedition->highest_altitude))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.altitude') }}
                </div>
                <div class="stat-value font-body">
                    @if (!empty($expedition->starting_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.start') }} {{ $expedition->starting_altitude }}M
                        </span>
                    @endif
                    @if (!empty($expedition->highest_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.highest') }} {{ $expedition->highest_altitude }}M
                        </span>
                    @endif
                </div>
            </div>
        @endif

        @if (!empty($expedition->starting_point) || !empty($expedition->ending_point))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.journey') }}
                </div>
                <div class="stat-value font-body flex flex-col gap-2 mt-2">
                    @if (!empty($expedition->starting_point))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.from') }}: {{ $expedition->starting_point }}
                        </span>
                    @endif
                    @if (!empty($expedition->ending_point))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.to') }}: {{ $expedition->ending_point }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
