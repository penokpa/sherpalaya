<section id="home-page-carousel-container" class="h-dvh w-full">
    <div id="snap"
        data-carousel='{ "loadingClasses": "opacity-0", "isAutoPlay": true, "speed": 10000, "isCentered": true, "dotsItemClasses": "carousel-dot border shadow-black bg-warning bg-opacity-20 carousel-active:bg-warning carousel-active:bg-opacity-70", "isInfiniteLoop": true}'
        class="relative h-full w-full ">
        <div class="carousel rounded-none h-full w-full">
            <div class="carousel-body opacity-0 h-full w-full rounded-none ">
                <!-- Slide 1 -->
                @foreach ($featuredData as $featured)
                    <div class="carousel-slide snap-center rounded-none ">
                        <x-cards.carousel-card :id="$featured->id" :title="$featured->title" :url="$featured->url" :image="$featured->image"
                            :description="$featured->description" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="carousel-pagination absolute bottom-8 end-0 start-0 flex justify-center gap-3 "></div>

        <!-- Previous Slide -->
        <span
            class="icon-[tabler--chevron-left] carousel-prev size-10 cursor-pointer rtl:rotate-180 hover:text-warning text-white hidden xl:flex justicy-center lg:absolute top-1/2 left-1 opacity-50 hover:opacity-100"></span>
        <span class="sr-only">Previous</span>
        <!-- Next Slide -->
        <span
            class="icon-[tabler--chevron-right] carousel-next size-10 cursor-pointer rtl:rotate-180 hover:text-warning text-white  hidden xl:flex absolute top-1/2 right-1 opacity-50 hover:opacity-100"></span>
        <span class="sr-only">Next</span>
    </div>
</section>


{{-- our-teamound --}}
{{-- <div id="indicators" data-carousel='{ "loadingClasses": "opacity-0", "dotsItemClasses": "carousel-dot" }'
    class="relative w-full">
    <div class="carousel h-screen rounded-none">
        <div class="carousel-body h-full w-full opacity-0">
            <!-- Slide 1 -->
            @foreach ($featuredData as $featured)
                <div class="carousel-slide">
                    <x-cards.carousel-card :id="$featured->id" :title="$featured->title" :url="$featured->url" :image="$featured->image" />
                </div>
            @endforeach
        </div>
    </div>
    <div class="carousel-pagination absolute bottom-3 end-0 start-0 flex justify-center gap-3">
    </div>
</div> --}}
