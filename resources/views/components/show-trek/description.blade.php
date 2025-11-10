<div class="h-4"></div>
<div class="card sm:w-full shadow-sm shadow-slate-300 bg-blue-100/20 font-body">
    <div class="card-body gap-2 text-gray-700 px-2  text-preety">
        <div class="align-top text-black text-lg/8 tracking-wide  font-light">
            {!! $trek->description !!}
        </div>

        <x-read-more componentId="trek-description-{{ $trek->id }}"/>

    </div>
</div>