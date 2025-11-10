<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <div class="card--rounded-none image-full  bg-blue-100/50 h-[60vh]">
            <figure class="h-[60vh] w-full">
                <img src="{{ asset('/photos/mountain2.jpg') }}" alt="Trekking background image"
                    class="h-[60vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body">
                <div
                    class="absolute bottom-1/2 2xl:left-32  left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                    <div class="">
                        <h5 class="card-title mb-2.5 text-white text-2xl md:text-4xl uppercase font-extrabold ">
                            Sherpalaya's
                        </h5>
                        <h5 class="card-title mb-2.5 text-warning text-2xl md:text-4xl uppercase font-extrabold ">
                            Terms & Conditions
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/home'),
            ],
            [
                'name' => 'Terms And Condition',
                // 'url' => url('/terms-and-conditions'),
            ],
            // [
            //     'name' => $trek->title,
            // ],
        ]" />
        <div class="h-8"></div>
        <div class="mx-4 2xl:mx-32">
            <div class="bg-blue-transparent text-blue-600">
               {!! $termsAndCondition !!}
            </div>
        </div>
        <div class="h-8"></div>

    </div>
</x-website-layout>
