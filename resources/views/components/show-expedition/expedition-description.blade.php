{{-- <script type="module" defer>
    let {
        element
    } = HSCollapse.getInstance('#expedition-description-collapse-button', true);

    shortExpeditionDescription = document.getElementById("short-expedition-description");

    expeditionDescriptionButton.on('open', function(instance) {
        shortExpeditionDescription.classList.add("hidden");

    });
    expeditionDescriptionButton.on('hide', function(instance) {
        shortExpeditionDescription.classList.remove("hidden");
    });
</script>


<div class="">
    <p class="mb-4 2xl:text-xl text-white font-bold ">
    <p class="inline text-base-content/80" id="short-expedition-description ">
        {{ Str::words(strip_tags($expedition->description), 30) }}
    </p>

    <div id="expedition-description-collapse-heading"
        class="collapse hidden w-full overflow-hidden transition-[height] duration-300 "
        aria-labelledby="expedition-description-collapse">
        {!! $expedition->description !!}
    </div>

    <button type="button" class="collapse-toggle link link-accent inline-flex items-center"
        id="expedition-description-collapse-button" aria-expanded="false" aria-controls="expedition-description-collapse-heading"
        data-collapse="#expedition-description-collapse-heading">
        <span class="collapse-open:hidden">Read more</span>
        <span class="collapse-open:block hidden">Read less</span>
        <span class="icon-[tabler--chevron-down] collapse-open:rotate-180 ms-2 size-4"></span>
    </button>
    </p>
</div> --}}

<div class="h-4"></div>
<div class="card sm:w-full shadow-sm shadow-slate-300 bg-blue-100/20 font-body">
    <div class="card-body gap-2 text-gray px-2  ">
        <article class="align-top text-black-800 text-lg/8 tracking-normal font-light text-justify"
            id="expedition-description-{{ $expedition->id }}">
            {!! $expedition->description !!}
        </article>
        <x-read-more componentId="expedition-description-{{ $expedition->id }}" />
    </div>
</div>
