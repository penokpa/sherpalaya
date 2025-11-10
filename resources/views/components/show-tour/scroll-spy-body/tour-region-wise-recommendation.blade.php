<div id="recommended" class="bg-blue-100/20">
    @if ($recommendedTours->isNotEmpty())
        <div class="h-12"></div>
        <h5 class="card-title text-secondary uppercase font-normal text-3xl">
            More {{ $tour->type }} Tours
        </h5>
        <div class="h-6"></div>

        <div class="lg:grid grid-cols-3 gap-2 flex flex-col">
            @foreach ($recommendedTours as $recommendedTour)
                <div class="card group hover:shadow sm:max-w-sm bg-blue-100/80 h-full overflow-hidden">
                    <a href="{{ route('show_tour', $recommendedTour->id) }}">

                        <figure class="h-44">
                            <img src="{{ $recommendedTour->coverImage?->url }}"
                                alt="{{ $recommendedTour->title }} Cover Image"
                                class="transition-transform duration-500 group-hover:scale-110 h-44 object-cover" />
                        </figure>
                    </a>
                    <div class="card-body p-2">
                        <h5 class="card-title mb-2.5 uppercase text-primary text-wrap font-normal text-lg">
                            {{ $recommendedTour->title }}
                        </h5>
                        <div class="justify-start flex flex-row items-center  gap-2">
                            {{-- <span class="icon-[solar--calendar-outline] size-5 font-extrabold text-primary"></span> --}}
                            <span
                                class="text-primary uppercase items-center font-normal badge badge-outline badge-warning">
                                {{ $recommendedTour->duration }}
                            </span>
                        </div>
                        <div class="justify-start  items-start gap-2 pt-3">
                            <div class="text-slate-700 capitalize items-center line-clamp-5">
                                {{ $recommendedTour->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="h-8"></div>
    @endif

</div>
