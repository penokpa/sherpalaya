<div class="w-full my-4">
    <div class="stats stats-vertical bg-blue-100/50 w-full rounded-none">
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal ">Duration</div>
            <div class="stat-value font-normal tracking-wider">
                {{ $trek->duration ? $trek->duration . ' Days' : 'N/A' }}
            </div>
            <div class="stat-value font-body">
                <span class="badge badge-outline badge-success text-wrap h-full font-normal text-base px-2">
                    @if (!empty($trek->best_time_for_trek))
                        Best Time: {{ $trek->best_time_for_trek }}
                    @endif
                </span>
            </div>
        </div>
        <div class="stat ">
            <div class="stat-title text-black uppercase font-normal">Difficulty</div>
            <div class="stat-value font-body">
                @if ($trek->grade)
                    <span class="badge badge-outline badge-primary text-base">Grade:
                        {{ $trek->grade }}</span>
                @endif
                @if ($trek->trek_difficulty)
                    <span
                        class="badge badge-outline badge-error text-base">{{ $trek->trek_difficulty->getLabel() }}</span>
                @endif
            </div>
        </div>
        <div class="stat">
            <div class="stat-title text-black uppercase font-normal">Altitude</div>
            <div class="stat-value font-body">
                @if (!empty($trek->starting_altitude))
                    <span class="badge badge-outline text-base">
                        Start: {{ $trek->starting_altitude }}M
                    </span>
                @endif

                @if (!empty($trek->highest_altitude))
                    <span class="badge badge-outline text-base">
                        Highest: {{ $trek->highest_altitude }}M
                    </span>
                @endif
                </span>
            </div>
        </div>
    </div>
</div>


{{-- <div class="h-8"></div>
<div class="card grid grid-cols-2  gap-2 font-body px-2 bg-gray-100">
   
    <div class="flex flex-col gap-2 justify-center items-start my-4">
        <span class="icon-[material-symbols-light--altitude-outline-rounded] size-10 text-warning"></span>
        <span class=" text-sm uppercase text-warning">Highest Altitude</span>
        <span class="text-2xl uppercase text-black ">
            {{ $trek->highest_altitude }} m
        </span>
    </div>
    
    @if (!empty($trek->duration))
        <div class="flex flex-col gap-2 justify-center items-start my-4 ">
            <span class="icon-[mingcute--time-duration-line] size-10 text-warning"></span>
            <span class=" text-sm uppercase text-warning">Duration</span>
            <span class="text-2xl uppercase text-black ">
                {{ $trek->duration }} days
            </span>
        </div>
    @endif
    @if (!empty($trek->best_time_for_trek))
        <div class="flex flex-col gap-2 justify-center items-start my-4">
            <span class="icon-[mdi--sun-time-outline] size-10 text-warning"></span>
            <span class=" text-sm uppercase text-warning">Best Time</span>
            <span class="text-2xl uppercase text-black text-wrap w-1/2 lg:w-full">
                {{ $trek->best_time_for_trek }}
            </span>
        </div>
    @endif
    <div class="flex flex-col gap-2 justify-center items-start my-4">
        <span class="icon-[arcticons--levelsfyi] size-10 text-warning"></span>
        <span class=" text-sm uppercase text-warning">Difficulty</span>
        <span class="text-2xl uppercase text-black">
            {{ $trek->trek_difficulty }}
        </span>
    </div>
</div> --}}
{{-- </div> --}}
