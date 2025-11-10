{{-- <script type="module" defer>
    let {
        element
    } = HSCollapse.getInstance('#peak-description-collapse-button', true);

    shortpeakDescription = document.getElementById("short-peak-description");

    peakDescriptionButton.on('open', function(instance) {
        shortpeakDescription.classList.add("hidden");

    });
    peakDescriptionButton.on('hide', function(instance) {
        shortpeakDescription.classList.remove("hidden");
    });
</script>


<div class="">
    <p class="mb-4 2xl:text-xl text-white font-bold ">
    <p class="inline text-base-content/80" id="short-peak-description ">
        {{ Str::words(strip_tags($peak->description), 30) }}
    </p>

    <div id="peak-description-collapse-heading"
        class="collapse hidden w-full overflow-hidden transition-[height] duration-300 "
        aria-labelledby="peak-description-collapse">
        {!! $peak->description !!}
    </div>

    <button type="button" class="collapse-toggle link link-accent inline-flex items-center"
        id="peak-description-collapse-button" aria-expanded="false" aria-controls="peak-description-collapse-heading"
        data-collapse="#peak-description-collapse-heading">
        <span class="collapse-open:hidden">Read more</span>
        <span class="collapse-open:block hidden">Read less</span>
        <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 ms-2 size-4"></span>
    </button>
    </p>
</div> --}}

<div class="card sm:w-full shadow-sm shadow-slate-300 bg-blue-100/10" data-aos="fade-down" data-aos-duration="1200">
    <div class="card-body gap-2 text-slate-700 px-2 capitalize text-preety lg:text-justify" >
        <p class="first-line:uppercase text-balance tracking-tighter align-top text-base/8" >
            {!! $peak->description !!}
        </p>
    </div>
</div>
