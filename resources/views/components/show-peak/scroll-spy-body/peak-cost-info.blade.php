<div class="md:grid grid-cols-2 ">
    @if (!empty($peak->costs_include))

        <div id="costs_include" class="card 2xl:max-w-full rounded-none bg-blue-100/60">
            <div class="h-8">

            </div>
            <div class="card-header p-2" data-aos="fade-down" data-aos-duration="1200">
                <h5 class="card-title text-primary uppercase font-semibold text-xl">Cost
                    Includes
                </h5>
            </div>
            <div class="card-body p-2 mt-4" data-aos="fade-down" data-aos-duration="1200">
                <ul class="space-y-5 ">
                    @foreach ($peak->costs_include as $cost_include)
                        <li class="flex items-center space-x-3 rtl:space-x-reverse  ">
                            <span class="bg-transparent text-success flex items-center justify-center rounded-full p-1">
                                <span class="icon-[eva--done-all-fill] size-5"></span>
                            </span>
                            <p class="text-slate-900  md:text-justify text-preety text-base">
                                {{ $cost_include[app()->currentLocale()] }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="h-8">

            </div>
        </div>
    @endif

    @if (!empty($peak->costs_exclude))
        {{-- cost exclude --}}
        <div id="costs_exclude" class="card 2xl:max-w-full  rounded-none bg-red-100/60">
            <div class="h-8">

            </div>
            <div class="card-header p-2" data-aos="fade-down" data-aos-duration="2000">
                <h5 class="card-title text-primary uppercase font-semibold text-xl">Cost
                    Excludes
                </h5>
            </div>
            <div class="card-body p-2 mt-4" data-aos="fade-down" data-aos-duration="2000">
                <ul class="space-y-5">
                    @foreach ($peak->costs_exclude as $cost_exclude)
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <span class="bg-transparent text-red-300 flex items-center justify-center rounded-full ">
                                <span class="icon-[tabler--exclamation-circle] size-5"></span>
                            </span>
                            <p class="text-slate-900 md:text-justify text-preety text-base">
                                {{ $cost_exclude[app()->currentLocale()] }} </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="h-8">

            </div>
        </div>
    @endif
</div>
