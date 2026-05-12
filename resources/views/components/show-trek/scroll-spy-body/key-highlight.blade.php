{{-- <x-show-trek.scroll-spy-navigation /> --}}
@if (count($trek->keyHighlights) > 0)
    <section id="key_highlights" class="card 2xl:max-w-full rounded-none bg-blue-100/30 font-body">
        <div class="h-6">
        </div>
        <div class="card-header  text-left px-2 pb-2" data-aos="fade-down" data-aos-duration="1200">
            <h3 class="card-title text-black uppercase tracking-normal font-body font-bold text-3xl">
                {{ __('show-page.key') }}
            </h3>
            <div class="h-2"></div>
        </div>
        <div class="card-body justify-center items-start px-2 mt-2 ">
            @foreach ($trek->keyHighlights as $highlight)
                <div class="flex flex-col gap-0 items-start">
                    <h4 class="mt-2 uppercase md:text-justify tracking-tight text-black font-medium font-body text-lg">
                        {{ $highlight->title }} :
                    </h4>
                    <div class="col-span-2 items-start  text-left">
                        <p class="my-1 font-light text-lg/7 tracking-wide  text-black ">
                            {{ $highlight->description }}
                        </p>
                    </div>
                    <div class="h-2"></div>

                </div>
            @endforeach
        </div>
        <div class="h-6">
        </div>
    </section>
@endif
