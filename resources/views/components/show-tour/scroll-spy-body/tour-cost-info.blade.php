<div class="md:grid grid-cols-2 ">
    @php
        $costsInclude = array_filter($tour->costs_include, function ($costInc) {
            return !is_null($costInc[app()->currentLocale()]);
        });
        $costsExclude = array_filter($tour->costs_exclude, function ($costExc) {
            return !is_null($costExc[app()->currentLocale()]);
        });
    @endphp
    @if (!empty($costsInclude))

        <section id="costs_include" class="card 2xl:max-w-full rounded-none bg-blue-100/40">
            <div class="h-8">
            </div>
            <div class="card-header p-2" data-aos="fade-down" data-aos-duration="1200">
                <h3 class="card-title text-black uppercase font-body tracking-normal font-bold text-2xl">
                    {{ __('show-page.costs_include') }}
                </h3>
            </div>
            <aside class="card-body p-2 mt-4 font-body">
                <ul class="space-y-5 ">

                    @foreach ($costsInclude as $cost_include)
                        <li class="flex items-center space-x-3 rtl:space-x-reverse  ">
                            <span class="bg-transparent text-success flex items-center justify-center rounded-full p-1">
                                <span class="icon-[eva--done-all-fill] size-5"></span>
                            </span>
                            <p class="text-black  break-before-auto text-preety text-lg/7 font-light tracking-wide">
                                {{ $cost_include[app()->currentLocale()] }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </aside>
            <div class="h-8">

            </div>
        </section>
    @endif

    @if (!empty($costsExclude))
        {{-- cost exclude --}}
        <section id="costs_exclude" class="card 2xl:max-w-full  rounded-none bg-red-100/40">
            <div class="h-8">

            </div>
            <div class="card-header p-2" data-aos="fade-down" data-aos-duration="1200">
                <h3 class="card-title text-black uppercase font-body tracking-normal font-bold text-2xl">
                    {{ __('show-page.costs_exclude') }}
                </h3>
            </div>
            <aside class="card-body p-2 mt-4 font-body">
                <ul class="space-y-5">
                    @foreach ($costsExclude as $cost_exclude)
                        <li class="flex items-center space-x-3 rtl:space-x-reverse">
                            <span class="bg-transparent text-red-300 flex items-center justify-center rounded-full ">
                                <span class="icon-[tabler--exclamation-circle] size-5"></span>
                            </span>
                            <p class="text-black  break-before-auto text-preety text-lg/7 font-light tracking-wide">
                                {{ $cost_exclude[app()->currentLocale()] }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </aside>
            <div class="h-8">

            </div>
        </section>
    @endif
</div>
