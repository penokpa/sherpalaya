<section class="mt-15">
    <article class="flex flex-col lg:justify-start lg:items-start xl:mx-32 mx-4 ">
        <h3 class="text-3xl md:text-4xl font-body font-medium uppercase tracking-normal text-black text-left lg:text-justify"
            data-aos="fade-down" data-aos-duration="1200">
            {!! app()->currentLocale() == 'fr'
                ? $landingPageSetting->homepage_title_fr
                : $landingPageSetting->homepage_title_en !!}
        </h3>
        <div
            class="text-lg/7 mt-6 text-preety text-black text-justify lg:text-justify
                 font-light font-body lg:w-[70%] tracking-wide ">
            {!! app()->currentLocale() == 'fr'
                ? $landingPageSetting->homepage_description_fr
                : $landingPageSetting->homepage_description_en !!}
        </div>
        <div class="h-10 md:h-12"></div>
    </article>
    <main class=" max-w-full font-animation-content">
        <div class="md:grid grid-cols-5 gap-2 xl:mx-32 mx-4 flex flex-col ">
            <a href="/{{ app()->currentLocale() }}/expeditions" class="col-span-3 ">
                <div
                    class="card rounded-md image-full h-[40vh] w-full relative flex items-end  card-side group  border expedition-activity-card hover:shadow-sm hover:shadow-black">
                    <figure class="h-full w-full">
                        {{-- expedition_activity_image_id --}}
                        <x-curator-glider
                            class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75"
                            :media="$landingPageSetting->expedition_activity_image_id" fallback="default" loading="lazy" alt="Expedition Image"/>
                    </figure>
                    <div class="card-body absolute bottom-0 inset-0 uppercase" data-aos="flip-up"
                        data-aos-duration="800">
                        <div class="text-left ">
                            <h4 class="font-extrabold text-blue-50 text-2xl lg:text-4xl antialiased">
                                {{ __('footer.expeditions') }}
                            </h4>
                        </div>
                    </div>
                    <div class="absolute bottom-0 opacity-0 group-hover:opacity-100 w-min">
                        <div class="flex flex-row">
                            <div class="flex-none">
                                <span class="icon-[hugeicons--angle] size-44 rotate-12 text-black opacity-35"></span>
                            </div>
                            <div class="flex-none text-yellow-200 font-normal font-oswald text-[2rem] lg:text-[6rem] opacity-60">
                                {{ $landingPageSetting->expedition_activity_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/{{ app()->currentLocale() }}/treks" class="col-span-2">
                <div
                    class="card rounded-md image-full h-[40vh] w-full relative flex items-end  card-side group  border hover:shadow-sm  hover:shadow-black">
                    <figure class="h-full w-full ">
                        <x-curator-glider
                            class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75"
                            :media="$landingPageSetting->trek_activity_image_id" :fallback="asset('/photos/banner.jpg')" loading="lazy" alt="Trek Image"/>

                    </figure>
                    <div class="card-body absolute inset-0 uppercase">
                        <div class="text-left" data-aos="flip-up" data-aos-duration="800">
                            <h4 class="font-extrabold text-blue-50 text-2xl lg:text-4xl antialiased">
                                {{ __('footer.treks') }}
                            </h4>
                        </div>
                    </div>
                    <div class="absolute bottom-0 opacity-0 group-hover:opacity-100 w-min">
                        <div class="flex flex-row">
                            <div class="flex-none">
                                <span
                                    class="icon-[mingcute--mountain-2-line] size-44 rotate-12 text-black opacity-35"></span>

                            </div>
                            <div class="flex-none text-yellow-200 font-normal font-oswald text-[2rem] lg:text-[4rem] opacity-60">
                                {{ $landingPageSetting->trek_activity_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="h-2">
        </div>

        <div class="md:grid grid-cols-5 gap-2 xl:mx-32 mx-4 flex flex-col">
            <a href="/{{ app()->currentLocale() }}/tours" class="col-span-2">
                <div
                    class="card rounded-md image-full h-[40vh] w-full relative flex items-end  card-side group  border hover:shadow-sm  hover:shadow-black">
                    <figure class="h-full w-full">
                        <x-curator-glider
                            class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75"
                            :media="$landingPageSetting->tour_activity_image_id" :fallback="asset('/photos/banner.jpg')" loading="lazy" alt="Activity Image"/>
                    </figure>
                    <div class="card-body absolute inset-0 uppercase" data-aos="flip-up" data-aos-duration="800">
                        <div class="text-left ">
                            <h4 class="font-extrabold text-blue-50 text-2xl lg:text-4xl antialiased">
                                {{ __('footer.activities') }}
                            </h4>
                        </div>
                    </div>
                    <div class="absolute bottom-0 opacity-0 group-hover:opacity-100 w-min">
                        <div class="flex flex-row">
                            <div class="flex-none">
                                <span class="icon-[hugeicons--bus-01] size-40 rotate-12 text-black opacity-35"></span>

                            </div>
                            <div class="flex-none text-yellow-200 font-normal font-oswald text-[2rem] lg:text-[4rem] opacity-60">
                                {{ $landingPageSetting->tour_activity_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/{{ app()->currentLocale() }}/our-team" class=" col-span-3">
                <div
                    class="card rounded-md image-full h-[40vh] w-full relative flex items-end  card-side group hover:shadow-sm  hover:shadow-black border">

                    <figure class="h-full w-full brightness-75">
                        <x-curator-glider
                            class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover brightness-75"
                            :media="$landingPageSetting->peak_activity_image_id" :fallback="asset('/photos/banner.jpg')" loading="lazy" alt="Team Image"/>
                    </figure>
                    <div class="card-body absolute inset-0 uppercase" data-aos="flip-up" data-aos-duration="800">
                        <div class="text-left ">
                            <h4 class="font-extrabold text-blue-50  text-2xl lg:text-4xl antialiased">
                                {{ __('footer.teams') }}
                            </h4>
                        </div>
                    </div>
                    <div class="absolute bottom-0 opacity-0 group-hover:opacity-100 w-min">
                        <div class="flex flex-row">
                            <div class="flex-none">
                                <span class="icon-[hugeicons--gem] size-44 rotate-12 text-black opacity-35"></span>

                            </div>
                            <div class="flex-none text-yellow-200 font-normal font-oswald text-[2rem] lg:text-[4rem] opacity-60">
                                {{ $landingPageSetting->peak_activity_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="h-16">
        </div>
    </main>
    <x-whatsapp-icon />
</section>
