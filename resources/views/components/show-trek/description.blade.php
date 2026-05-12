<div class="h-4"></div>
<div class="card sm:w-full shadow-sm shadow-slate-300 bg-blue-100/20 font-body">
    <div class="card-body gap-2 text-gray px-2  ">
        <article class="align-top text-black-800 text-lg/8 tracking-normal font-light text-justify"
            id="trek-description-{{ $trek->id }}">
            {!! $trek->description !!}
        </article>
        <x-read-more componentId="trek-description-{{ $trek->id }}" />
    </div>
</div>