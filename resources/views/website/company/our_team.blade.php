<x-website-layout>
    <div class="bg-blue-100/10 font-body">
        {{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[60vh]">
            <figure class="h-[60vh] w-full">
                <img src="{{ asset('/photos/activity2.JPG') }}" alt="Trekking background image"
                    class="h-[60vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body">
                <div
                    class="absolute bottom-1/2 2xl:left-32  left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                    <div class="">
                        
                        <h5 class="card-title mb-8 text-white text-3xl md:text-5xl uppercase font-normal tracking-wide ">
                            Sherpalaya's Team
                        </h5>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card--rounded-none image-full  h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <img src="{{ asset('/photos/activity2.JPG') }}" alt="Trekking background image"
                    class="h-[80vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        Meet Our Experts
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        Our Travel Specialists
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        The People Behind Your Journeys
                    </h5>
                </div>
            </div>
        </div>

        <x-breadcrumb :breadcrumbs="[
            [
                'name' => 'Home',
                'url' => url('/home'),
            ],
            [
                'name' => 'Our Team',
            ],
        ]" />


        {{--  --}}
        <div class="2xl:mx-32 mx-4 ">
            <div class="h-8"></div>

            <div class="lg:px-8 flex flex-col lg:justify-center lg:items-center">
                <h5 class="text-3xl md:text-4xl font-body  font-medium uppercase tracking-normal text-black text-left lg:text-center"
                    data-aos="fade-down" data-aos-duration="1200">
                    Journey with Experts
                </h5>
                <p
                    class="text-xl/7 mt-6 text-preety text-black text-left lg:text-center 
                             font-light font-body lg:w-[80%] tracking-wide">
                    {{-- {{ $pageSetting->about_us_page_content }} --}}
                    Our team of travel experts is dedicated to making your journey seamless and unforgettable. With
                    years of experience and a passion for exploration, we ensure every trip is planned to perfection.
                    From breathtaking destinations to personalized itineraries, we’re here to guide you every step of
                    the way.
                </p>
                <div class="h-10 md:h-12"></div>
            </div>
        </div>

        <div class="mx-4 2xl:mx-32">
            <div class=" flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
                @foreach ($allSherpas as $allSherpa)
                    <a href="{{ route('show_team_member', $allSherpa->id) }}">
                        <div class="card w-full h-full ">
                            <img src="{{ $allSherpa->profilePicture->url ?? asset('photos/P1030127.JPG') }}"
                                alt="{{ $allSherpa->title }} Cover Image" class="h-[20rem] object-cover " />
                            <div class="card-body bg-blue-100/50 px-2 py-2 text-left">
                                <h5
                                    class="card-title mb-1 line-clamp-2 uppercase text-xl text-black font-medium tracking-wide font-body hover:text-warning hover:underline ">
                                    {{ $allSherpa->name }}
                                </h5>
                                <h5
                                    class="card-title line-clamp-2 capitalize tracking-wide warning text-sm badge badge-outline text-primary font-light  ">
                                    {{ $allSherpa->title }}
                                </h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="h-20"></div>
    </div>
</x-website-layout>
