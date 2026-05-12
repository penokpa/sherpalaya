<div class="w-full my-4">
    <div class="stats stats-vertical bg-blue-100/50 w-full rounded-lg shadow-sm shadow-gray-200">
        @if (!empty($tour->duration) || !empty($tour->best_time_for_tour))
            <div class="stat">
                @if (!empty($tour->duration))
                    <div class="stat-title text-black uppercase font-normal">
                        {{ __('show-page.duration') }}
                    </div>
                    <div class="stat-value font-normal tracking-wider">
                        {{ $tour->duration ?? 'N/A' }}
                    </div>
                @endif
                @if (!empty($tour->best_time_for_tour))
                    <div class="stat-value font-body">
                        <span class="badge badge-outline badge-success text-wrap h-full font-normal text-base px-2">
                            {{ __('show-page.best-time') }} {{ $tour->best_time_for_tour }}
                        </span>
                    </div>
                @endif
            </div>
        @endif

        @if (!empty($tour->starting_altitude) || !empty($tour->highest_altitude))
            <div class="stat">
                <div class="stat-value font-body">
                    @if (!empty($tour->starting_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.start') }} {{ $tour->starting_altitude }}M
                        </span>
                    @endif
                    @if (!empty($tour->highest_altitude))
                        <span class="badge badge-outline text-base">
                            {{ __('show-page.highest') }} {{ $tour->highest_altitude }}M
                        </span>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
