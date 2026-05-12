@php
    $featuredTreks = $treks->where('is_featured', true);
@endphp
@if ($featuredTreks->count() === 1)
    <div class="bg-blue-100/60" data-aos="fade-down" data-aos-duration="1200">
        <div class="xl:mx-32 mx-4 ">
            <div class="h-14"></div>
            <div class="lg:grid grid-cols-3 md:gap-8 flex flex-col gap-2 bg-blue-100/10">
                <div class="col-span-1">
                    <h5 class="text-3xl font-light line-clamp-2 tracking-wider text-black lg:text-right ">Trek</h5>
                    <h3 class="text-3xl tracking-wider text-accent lg:text-right ">With Sherpalaya</h3>
                    <p
                        class="text-md mt-2 text-preety text-slate-800 lg:text-right lg:text-wrap
                         first-line:uppercase first-line:font-light">
                        {{ app()->currentLocale() == 'fr' ? $landingPageSetting->trek_activity_content_fr : $landingPageSetting->trek_activity_content_en }}
                    </p>
                    <div class="h-4"></div>
                </div>
                @foreach ($featuredTreks as $featuredTrek)
                    <div
                        class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border col-span-2">
                        <figure class="h-[28rem] w-full">
                            <img src="{{ optional($featuredTrek->featureImage)->url ?? asset('photos/DSCF2600.JPG') }}"
                                alt="{{ $featuredTrek->title }} Cover Image"
                                class="transition-transform brightness-75 duration-500 group-hover:scale-110 h-full w-full object-cover" />
                        </figure>
                        <a href="{{ route('show_trek', ['id'=>$featuredTrek->id, 'locale'=>app()->currentLocale()]) }}">
                            <div class="card-body absolute inset-0 justify-end">
                                <div class="text-center">
                                    <h2 class="font-bold text-white text-2xl">
                                        {{ $featuredTrek->title }}
                                    </h2>
                                    <h2 class="font-bold tracking-normal text-white line-clamp-2 text-2xl">
                                        {{ $featuredTrek->highest_altitude }} m
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="h-14"></div>
        </div>
    </div>
@endif
