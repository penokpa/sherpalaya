{{-- <x-show-tour.scroll-spy-navigation /> --}}
@if (!empty($tour->essentialTips))
    <div id="essential_tips" class="card 2xl:max-w-full rounded-none bg-blue-100/10 ">
        <div class="h-6">
        </div>
        <div class="card-header px-2 pb-2" data-aos="fade-down" data-aos-duration="1200">
            <h5 class="card-title text-black uppercase font-medium text-3xl">
                Essential Tips
            </h5>
            <div class="h-4"></div>

        </div>
        <div class="card-body justify-center items-start px-2 font-body">
            @foreach ($tour->essentialTips as $highlight)
                <div class="flex flex-col gap-0 items-start">
                    <div class="mt-2 uppercase md:text-justify text-black font-medium tracking-tight text-lg/8">
                        <p>
                            {{ $highlight->title }} :
                        </p>
                    </div>
                    <div class="col-span-2 mb-3 text-lg/7">
                        <p class="mt-1  font-light  text-black tracking-wide">
                            {{ $highlight->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="h-4">
        </div>
    </div>
@endif
