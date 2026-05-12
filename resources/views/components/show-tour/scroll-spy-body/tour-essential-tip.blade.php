{{-- <x-show-tour.scroll-spy-navigation /> --}}
@if (!empty($tour->essentialTips))
    <section id="essential_tips" class="card 2xl:max-w-full rounded-none bg-blue-100/10 ">
        <div class="h-6">
        </div>
        <div class="card-header px-2 pb-2" data-aos="fade-down" data-aos-duration="1200">
            <h3 class="card-title text-black uppercase font-body tracking-normal font-bold text-3xl">
                {{ __('show-page.tips') }}
            </h3>
            <div class="h-4"></div>

        </div>
        <div class="card-body justify-center items-start px-2 font-body">
            @foreach ($tour->essentialTips as $highlight)
                <div class="flex flex-col gap-0 items-start">
                    <h4 class="mt-2 uppercase md:text-justify text-black font-medium tracking-tight text-lg/8">

                        {{ $highlight->title }} :
                    </h4>
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
    </section>
@endif
