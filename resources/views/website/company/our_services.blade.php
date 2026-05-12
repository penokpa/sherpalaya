<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        {{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[60vh]">
            <figure class="h-[60vh] w-full">
                <x-curator-glider class="h-[60vh] w-full object-cover brightness-75" :media="$pageSetting->service_page_cover_image_id" :fallback="asset('/photos/banner.jpg')"
                    loading="lazy" />
            </figure>
            <div class="card-body">
                <div class="absolute bottom-1/2 xl:left-32   left-4   max-w-full  2xl:max-w-full overflow-hidden border-none "
                    data-aos="fade-down" data-aos-duration="1200">
                    <div class=" max-w-[92%] 2xl:max-w-[100%]">
                        <h5 class="card-title mb-2.5 text-warning text-2xl md:text-4xl uppercase font-extrabold ">
                            Our
                        </h5>
                        <h2 class="card-title mb-2.5  text-white text-3xl md:text-5xl uppercase font-bold">
                            Services
                        </h2>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card--rounded-none image-full  h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->service_page_cover_image_id" fallback="default"
                    loading="lazy" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->service_page_title_up_fr : $pageSetting->service_page_title_up_en }}
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->service_page_main_title_fr : $pageSetting->service_page_main_title_en }}
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->service_page_title_down_fr : $pageSetting->service_page_title_down_en }}
                    </h5>
                </div>
            </div>
        </div>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/' . app()->currentLocale() . '/home'),
            ],
            [
                'name' => 'Services',
            ],
        ]" />

        <div class="xl:mx-32 mx-4 ">
            <div class="h-8"></div>

            <div class=" flex flex-col lg:justify-start lg:items-start">
                <h5 class="text-3xl md:text-4xl font-body  font-medium uppercase tracking-normal text-black text-left"
                    data-aos="fade-down" data-aos-duration="1200">
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->service_page_content_title_fr : $pageSetting->service_page_content_title_en }}
                </h5>
                <div
                    class="text-lg/7 mt-4 text-preety text-black lg:text-justify
                     font-light font-body lg:w-[80%]">
                    {{-- {{ $pageSetting->service_page_page_content }} --}}
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->service_page_content_fr : $pageSetting->service_page_content_en }}
                </div>
                <div class="h-10 md:h-12"></div>

            </div>

            {{-- Showing <strong>{{ $serviceDestination->services->count() }}</strong> --}}

            <div class="flex flex-col  md:grid md:grid-cols-2 xl:grid-cols-3  gap-4 ">
                @foreach ($services as $serviceData)
                    <div class="card w-full h-full">
                        <a href="{{ route('show_service',['id'=> $serviceData->service->id, 'locale'=>app()->currentLocale()]) }}">
                            <figure>
                                <img src="{{ $serviceData->service->coverImage?->url ?? asset('photos/P1030127.JPG') }}"
                                    alt="{{ $serviceData->service->title }} Cover Image" class="h-60 object-cover" />
                            </figure>
                        </a>
                        <div class="card-body group px-2 py-4  bg-blue-100/40 ">
                            <a href="{{ route('show_service',['id'=> $serviceData->service->id, 'locale'=>app()->currentLocale()]) }}">
                                <h5
                                    class="card-title line-clamp-2 mb-2 uppercase text-lg text-black tracking-tight group-hover:underline decoration-4 decoration-warning">
                                    {{ $serviceData->service->title }}</h5>
                            </a>
                            <div class="justify-start flex flex-col gap-2 pb-0">
                                <div
                                    class="items-center text-black text-justify text-base/7 font-body font-light line-clamp-4">
                                    {!! $serviceData->service->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="h-20"></div>

        </div>

</x-website-layout>
