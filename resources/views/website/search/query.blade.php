<x-website-layout>
    {{-- <div class="w-full bg-white">
        <div class="h-32"></div>
        <div class="w-full min-h-96 flex flex-col justify-center items-center ">
            <div class="max-w-md">
                <div class="card w-full h-full bg-blue-100/60">
                    <img src="{{ asset('photos/logo.png') }}" alt=""
                        class="rounded-md shadow-lg shadow-indigo-500/50 w-25 absolute -right-10 -top-10 p-1">

                    <div class="w-full card-header">
                        <h5 class="card-title">
                            Find your adventure
                        </h5>
                    </div>
                    <div class="card-body">
                        <x-search.search-input :query="$query" :type="$type->value" />

                    </div>
                    <div class="card-footer text-center">
                        <h5 class="mt-1 line-clamp-2 uppercase text-md text-primary font-normal">
                            Your results for
                            <span class="badge badge-soft badge-secondary">{{ $query }}</span>
                            is ready
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="bg-blue-100/40">
        {{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[80dvh] w-full">
            <figure class="h-[80dvh] w-full">
                
                <img src="{{ asset('/photos/mountain1.jpg') }}"
                    class="h-[80dvh] w-full object-cover object-center brightness-75" alt="">
            </figure>
            <div class="card-body">
                <div
                    class="absolute bottom-1/3 xl:left-32   left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                    <div class=" max-w-[92%] 2xl:max-w-[100%]">
                        <h5 class="card-title mb-2.5 text-warning text-2xl md:text-4xl uppercase font-medium ">
                            Search Result For
                        </h5>
                        <h2 class="card-title mb-2.5  text-white text-2xl md:text-4xl uppercase font-medium">
                            {{ $query }}
                        </h2>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card--rounded-none image-full  h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <img src="{{ asset('/photos/mountain1.jpg') }}"
                    class="h-[80dvh] w-full object-cover object-center brightness-75" alt="background-image">
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-semibold tracking-wider opacity-100 animate-bounce">
                        Search Result For ...
                    </h2>
                    <h1
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100">
                        {{ $query }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="xl:mx-32 mx-4 ">
            <div class="h-8"></div>
            <div class="md:grid md:grid-cols-2  xl:grid-cols-3 gap-2 flex flex-col ">
                @forelse ($results ?? [] as $resultType => $resultDatas)
                    {{-- bg-blue-100/20 --}}
                    {{-- <div class="w-full "> --}}
                    {{-- <x-carousel.full-width-carousel :header="$searchTypes->get($resultType)->getLabel()" viewAllUrl="/{{ Str::plural($resultType) }}"> --}}

                    @forelse ($resultDatas?->slice(0,8) ?? [] as $resultData)
                        <x-search.search-result :searchedResult="$resultData" />
                    @empty
                    @endforelse
                    {{-- </div> --}}
                    {{-- </x-carousel.full-width-carousel> --}}
                @empty
                    <div class="card min-h-60 w-full rounded-none bg-red-50">
                        <div class="card-body items-center justify-center">
                            <span class="icon-[tabler--brand-google-drive] mb-2 size-8"></span>
                            <p>No data to show.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="h-8"></div>
        </div>
    </div>




    {{-- @dd($results) --}}

</x-website-layout>
