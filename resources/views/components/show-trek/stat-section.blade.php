<div class="w-full my-4">
    <div class="stats stats-vertical bg-blue-100/50 w-full rounded-lg shadow-sm shadow-gray-200">

        @if (!empty($trek->duration) || !empty($trek->best_time_for_trek))
            <div class="stat">
                @if (!empty($trek->duration))
                    <div class="stat-title text-black uppercase font-normal">
                        {{ __('show-page.duration') }}
                    </div>
                    <div class="stat-value font-normal tracking-wider">
                        {{ $trek->duration ? $trek->duration . ' Days' : 'N/A' }}
                    </div>
                @endif
                @if (!empty($trek->best_time_for_trek))
                    <div class="stat-value font-body">
                        <span class="badge badge-outline badge-success text-wrap h-full font-normal text-base px-2">
                            {{ __('show-page.best-time') }} {{ $trek->best_time_for_trek }}
                        </span>
                    </div>
                @endif
            </div>
        @endif

        @if (!empty($trek->grade) || !empty($trek->trek_difficulty))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.difficulty') }}
                </div>
                <div class="stat-value font-body">
                    @if (!empty($trek->grade))
                        <span class="badge badge-outline badge-primary text-base">
                            {{ __('show-page.grade') }} {{ $trek->grade }}
                        </span>
                    @endif
                    @if (!empty($trek->trek_difficulty))
                        <span class="badge badge-outline badge-error text-base">
                            {{ $trek->trek_difficulty->getLabel() }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

        @if (!empty($trek->starting_altitude) || !empty($trek->highest_altitude))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.altitude') }}
                </div>
                <div class="stat-value font-body">
                    @if (!empty($trek->starting_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.start') }} {{ $trek->starting_altitude }}M
                        </span>
                    @endif
                    @if (!empty($trek->highest_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.highest') }} {{ $trek->highest_altitude }}M
                        </span>
                    @endif
                </div>
            </div>
        @endif

        @if (!empty($trek->starting_point) || !empty($trek->ending_point))
            <div class="stat">
                <div class="stat-title text-black uppercase font-normal">
                    {{ __('show-page.journey') }}
                </div>
                <div class="stat-value font-body">
                    @if (!empty($trek->starting_point))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.from') }}: {{ $trek->starting_point }}
                        </span>
                    @endif
                    @if (!empty($trek->ending_point))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.to') }}: {{ $trek->ending_point }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
