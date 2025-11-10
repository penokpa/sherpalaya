<x-website-layout>
    <section class="bg-blue-100/10 font-body" id="contact">
        {{-- <div class="card--rounded-none image-full  bg-blue-100/50 h-[60vh]">
            <figure class="h-[60vh] w-full">
                <img src="{{ asset('/photos/satellite.jpg') }}" alt="Trekking background image"
                    class="h-[60vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body">
                <div
                    class="absolute bottom-1/2 2xl:left-32  left-4   max-w-full  2xl:max-w-full overflow-hidden border-none ">
                    <div class="">
                        <h5 class="card-title mb-2.5 text-white text-2xl md:text-4xl uppercase font-extrabold ">
                            Contact Us
                        </h5>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="card--rounded-none image-full  h-[80vh] relative">
            <figure class="h-[80vh] w-full">
                <img src="{{ asset('/photos/satellite.jpg') }}" alt="Trekking background image"
                    class="h-[80vh] w-full object-cover brightness-50" />
            </figure>
            <div class="card-body absolute inset-0 flex items-center justify-start">
                <div class="absolute bottom-1/4  left-4 lg:left-4 2xl:left-32 transform translate-y-1/2 overflow-hidden"
                    data-aos="fade-down" data-aos-duration="1200">
                    <h5
                        class="card-title mb-2 text-blue-50 text-xl sm:text-2xl  uppercase font-oswald  font-medium tracking-wider opacity-75">
                        {{__('contact.title-up')}}
                    </h5>
                    <h2
                        class="card-title mb-2 text-warning text-4xl sm:text-5xl md:text-6xl  uppercase font-card font-semibold tracking-tight text-wrap  leading-[1.3]  overflow-hidden opacity-75">
                        {{__('contact.title-main')}}
                    </h2>
                    <h5
                        class="card-title  mb-8 text-blue-50 text-xl sm:text-2xl font-oswald  uppercase  font-medium tracking-wider opacity-75 ">
                        {{__('contact.title-down')}}
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
                'name' => 'Contact',
            ],
        ]" />
        <div class="2xl:mx-32 mx-4">
            <div class="h-8"></div>
            <div class="">
                <div class=" text-center sm:text-center ">
                    <h2 class="font-medium text-black uppercase tracking-normal text-3xl md:text-4xl ">
                        {{__('contact.heading')}}
                    </h2>
                </div>
                <div class=" md:h-10"></div>

                <div class="flex items-stretch justify-center ">
                    <div class="grid md:grid-cols-2">
                        <div class="h-full pr-4 ">
                            <p class="mt-3 mb-12 font-body text-xl/7  tracking-wide font-light text-black">
                                {{ $contactUsSetting->content }}
                            </p>
                            <ul class="mb-6 md:mb-0">
                                <li class="flex">
                                    <div
                                        class="flex h-12 w-12 mt-1 items-center justify-center rounded bg-blue-900 text-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            <path
                                                d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg font-medium leading-6 text-black uppercase">
                                            {{__('contact.address')}}</h3>
                                        <p class="text-black font-light text-lg tracking-tighter font-body">
                                            {{ $contactUsSetting->address }}
                                        </p>
                                        {{-- <p class="text-black font-light">New York, EEUU</p> --}}
                                    </div>
                                </li>
                                <li class="flex">
                                    <div
                                        class="flex h-12 w-12 mt-1 items-center justify-center rounded bg-blue-900 text-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <path
                                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                            </path>
                                            <path d="M15 7a2 2 0 0 1 2 2"></path>
                                            <path d="M15 3a6 6 0 0 1 6 6"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg uppercase font-medium leading-6 text-black">Contact
                                        </h3>
                                        <p class="text-black font-light text-lg tracking-wide">
                                            {{ $contactUsSetting->contact }}
                                        </p>
                                        {{-- <p class="text-black font-light">Mail: tailnext@gmail.com</p> --}}
                                    </div>
                                </li>
                                <li class="flex">
                                    <div
                                        class="flex h-12 w-12 mt-1 items-center justify-center rounded bg-blue-900 text-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                            <path d="M12 7v5l3 3"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg uppercase font-medium leading-6 text-black">{{__('contact.work')}}
                                        </h3>
                                        <p class="text-black font-light text-lg tracking-wide">
                                            {{ $contactUsSetting->working_hour }}
                                        </p>
                                        {{-- <p class="text-black font-light">Saturday &amp; Sunday: 08:00 - 12:00</p> --}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card h-fit max-w-6xl p-5 md:px-12 bg-blue-100/30" id="form ">
                            <h2 class="mb-2 text-2xl font-bold uppercase text-black">{{__('contact.form-head')}}</h2>
                            @if (isset($contactUsSubmitted))
                                @if ($contactUsSubmitted === true)
                                    <div class="alert alert-outline alert-success mb-2" role="alert">
                                        {{__('contact.form-success')}}
                                    </div>
                                @endif

                            @endif
                            <form id="contactForm" action="/contact" method="POST" class="mt-2">
                                @csrf
                                <div class="mb-6 ">
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="full_name"
                                                class="pb-1 text-xs uppercase tracking-wider"></label>
                                            <input type="text" id="full_name" autocomplete="name"
                                                placeholder="Your full name"
                                                class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md"
                                                name="full_name" required>
                                        </div>
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="email"
                                                class="pb-1 text-xs uppercase tracking-wider"></label>
                                            <input type="email" id="email" autocomplete="email"
                                                placeholder="Your email address"
                                                class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md"
                                                name="email" required>
                                        </div>
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="mobile_number"
                                                class="pb-1 text-xs uppercase tracking-wider"></label>
                                            <input type="tel" id="mobile_number" autocomplete="tel"
                                                placeholder="Your contact number"
                                                class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md"
                                                name="mobile_number">
                                        </div>
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="textarea" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <textarea id="textarea" name="message" cols="30" rows="5" placeholder="Write your message..."
                                            class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="w-full bg-blue-800 text-white px-6 py-3 font-xl tracking-wide uppercase rounded-md sm:mb-0">{{__('contact.send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-12"></div>
        </div>
    </section>
</x-website-layout>
