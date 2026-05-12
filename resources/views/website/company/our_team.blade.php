<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        <header class="card--rounded-none image-full  h-[80dvh] relative">
            <figure class="h-[80dvh] w-full">
                <x-curator-glider class="h-[80dvh] w-full object-cover brightness-75" :media="$pageSetting->team_page_cover_image_id" fallback="default"
                    loading="lazy" alt="team cover image"/>
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 xl:left-32 transform translate-y-1/2 overflow-hidden  "
                    data-aos="fade-down" data-aos-duration="1200">
                    <h2
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->team_page_title_up_fr : $pageSetting->team_page_title_up_en }}
                    </h2>
                    <h1
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-bold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-100">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->team_page_main_title_fr : $pageSetting->team_page_main_title_en }}
                    </h1>
                    <h3
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        {{ app()->currentLocale() == 'fr' ? $pageSetting->team_page_title_down_fr : $pageSetting->team_page_title_down_en }}
                    </h3>
                </div>
            </div>
        </header>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/' . app()->currentLocale() . '/home'),
            ],
            [
                'name' => 'Our Team',
            ],
        ]" />


        {{--  --}}
        <article class="xl:mx-32 mx-4 ">
            <div class="h-8"></div>

            <div class=" flex flex-col lg:justify-start lg:items-start">
                <h4 class="text-3xl md:text-4xl font-body  font-medium uppercase tracking-normal text-black text-left"
                    data-aos="fade-down" data-aos-duration="1200">
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->team_page_content_title_fr : $pageSetting->team_page_content_title_en }}
                </h4>
                <div
                    class="text-lg/7 mt-4 text-preety text-black lg:text-justify
                     font-light font-body lg:w-[80%]">
                    {{-- {{ $pageSetting->about_us_page_content }} --}}
                    {{ app()->currentLocale() == 'fr' ? $pageSetting->team_page_content_fr : $pageSetting->team_page_content_en }}

            </div>
                <div class="h-10 md:h-12"></div>
            </div>
        </article>

        {{-- {{ dd($allSherpas) }} --}}

        <aside class="mx-4 xl:mx-32">
            <div class=" flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
                @foreach ($allSherpas as $allSherpa)
                    <a href="{{ route('show_team_member', ['id'=>$allSherpa->id,'locale'=>app()->currentLocale()]) }}">
                        <div class="card w-full h-full ">
                            <img src="{{ $allSherpa->profilePicture->url ?? asset('photos/P1030127.JPG') }}"
                                alt="{{ $allSherpa->title }} Cover Image" class="h-[20rem] object-cover " />
                            <div class="card-body bg-blue-100/50 px-2 py-2 text-left">
                                <h5
                                    class="card-title mb-1 line-clamp-2 uppercase text-xl text-black font-medium tracking-wide font-body hover:text-warning hover:underline ">
                                    {{ $allSherpa->name }}
                                </h5>
                                <h6
                                    class="card-title  capitalize tracking-wide  text-xs badge badge-outline text-primary font-light  text-left py-4">
                                    {{ $allSherpa->title }}
                                </h6>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </aside>
        <x-whatsapp-icon />

        <div class="h-20"></div>
    </div>
</x-website-layout>
