<article class="bg-blue-100/20 font-oswald">

    <div class="h-20 ">

    </div>

    <div class="xl:mx-32 mx-4">
        <div class="stats  gap-2 w-full shadow-2xl">
            <div class="stat" data-aos="fade-down" data-aos-duration="1200">
                <div class="stat-figure text-base-content size-8">
                    <span class="icon-[mingcute--group-3-line] size-14"></span>
                </div>
                <div class="stat-title text-xl lowercase font-light">
                    {{__('stat.traveller')}}
                 </div>
                <div class="stat-value text-success text-5xl font-semibold">
                    {{ $landingPageSetting->stat_traveller_count }}
                </div>
            </div>
            <div class="stat" data-aos="fade-down" data-aos-duration="1200">
                <div class="stat-figure text-base-content size-8 ">
                    <span class="icon-[mingcute--building-6-line] size-14"></span>
                </div>
                <div class="stat-title text-xl lowercase font-light">
                    {{__('stat.association')}}
                </div>
                <div class="stat-value text-success text-5xl">
                    {{ $landingPageSetting->stat_association_count }}
                </div>
            </div>

            <div class="stat" data-aos="fade-down" data-aos-duration="1200">
                <div class="stat-figure text-base-content size-8">
                    <span class="icon-[mingcute--star-line] size-14"></span>
                </div>
                <div class="stat-title text-xl lowercase font-light">
                    {{__('stat.customer')}}
                 </div>
                <div class="stat-value text-success text-5xl">
                    {{ $landingPageSetting->stat_customer_feedback }}/10
                </div>
            </div>

            <div class="stat" data-aos="fade-down" data-aos-duration="1200">
                <div class="stat-figure text-base-content size-8">
                    <span class="icon-[mingcute--certificate-line] size-14"></span>
                </div>
                <div class="stat-title text-xl lowercase font-light">
                    {{__('stat.success')}} </div>
                <div class="stat-value text-success text-5xl">
                    {{ $landingPageSetting->stat_success_rate }} %
                </div>
            </div>


        </div>
    </div>
    <div class="h-20">

    </div>
</article>
