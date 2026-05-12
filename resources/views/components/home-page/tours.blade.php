<div style="background-image: url('{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/02.jpg') }}');"
    class="bg-cover bg-center h-full w-full">
    <div class="card-header font-extra-bold capitalize tracking-wide my-8 text-4xl md:mx-64 text-center ">
        <h5 class="card-title ">
            Our Tours
        </h5>
    </div>
    <div class="md:grid md:grid-cols-1 md:max-[77%] md:mx-44 bg-transparent">
        <!-- Card 1 -->
        <div class="card card-side group hover:shadow border border-gray-200 rounded-none overflow-hidden border-none shadow-none bg-transparent"
            dir="ltr">
            <figure class="w-1/2">
                <img src="{{ asset('photos/mountain1.jpg') }}" alt="Shoes"
                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover" />
            </figure>
            <div class="card-body w-1/2 p-4 flex flex-col justify-between">
                <h5 class="card-title text-primary mb-2.5">Cultural</h5>
                <p class="mb-6 text-secondary">Nike Air Max is a popular line of athletic shoes that feature Nike's
                    signature
                    Air
                    cushioning technology in the sole.</p>
                <a href="/{{ app()->currentLocale() }}/tours">
                    <div class="card-actions flex gap-5 flex-row items-center">
                        <span class="text-primary font-medium">Explore</span>
                        <span class="icon-[material-symbols--arrow-right-alt-rounded] link link-primary"
                            style="width: 32px; height: 32px;">
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <!-- Card 1 -->
        <div class="card card-side group hover:shadow border border-gray-200 rounded-none overflow-hidden border-none shadow-none bg-transparent"
            dir="rtl">
            <figure class="w-1/2">
                <img src="{{ asset('photos/mountain2.jpg') }}" alt="Shoes"
                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover" />
            </figure>
            <div class="card-body w-1/2 p-4 flex flex-col justify-between">
                <h5 class="card-title text-primary mb-2.5">Peaks</h5>
                <p class="mb-6 text-secondary">Nike Air Max is a popular line of athletic shoes that feature Nike's
                    signature
                    Air
                    cushioning technology in the sole.</p>
                <a href="/{{ app()->currentLocale() }}/tours">
                    <div class="card-actions flex gap-5 flex-row items-center">
                        <span class="text-primary font-medium">Explore</span>
                        <span class="icon-[material-symbols--arrow-right-alt-rounded] link link-primary"
                            style="width: 32px; height: 32px;">
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-3 md:max-[77%] md:mx-44 mt-4 rounded-none shadow-none gap-2 md:h-[25rem]">
        <div
            class="card--rounded-none image-full h-full w-full relative flex items-center justify-center card-side group hover:shadow border bg-transparent">
            <figure class="h-full w-full">
                <img src="{{ asset('photos/mountain3.jpg') }}" alt="overlay image"
                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="font-bold text-white">
                        Treks
                    </h2>
                    <p class="font-normal tracking-widest text-white text-3xl">
                        Boost your brand
                    </p>
                </div>
            </div>
        </div>
        <div
            class="card--rounded-none image-full h-full w-full relative flex items-center justify-center card-side group hover:shadow border bg-transparent">
            <figure class="h-full w-full">
                <img src="{{ asset('photos/mountain4.jpg') }}" alt="overlay image"
                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="font-bold text-white">
                        Treks
                    </h2>
                    <p class="font-normal tracking-widest text-white text-3xl">
                        Boost your brand
                    </p>
                </div>
            </div>
        </div>
        <div
            class="card--rounded-none image-full h-full w-full relative flex items-center justify-center card-side group hover:shadow border bg-transparent">
            <figure class="h-full w-full">
                <img src="{{ asset('photos/culture2.jpg') }}" alt="overlay image"
                    class="transition-transform duration-500 group-hover:scale-110 h-full w-full object-cover" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="font-bold text-white">
                        Treks
                    </h2>
                    <p class="font-normal tracking-widest text-white text-3xl">
                        Boost your brand
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
