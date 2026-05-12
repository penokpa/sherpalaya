{{-- <div class="w-full h-full">
    <div class="bg-white p-4 rounded-lgs w-full relative">
        <button class="absolute top-2 right-2 text-gray-500" onclick="closeModal()">&times;</button>
        <div class="relative w-full h-3/4">
            <img id="mainImage" src="{{ $showMedia }}" class="w-full h-64 object-cover rounded" alt="Gallery Image">
            <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded"
                onclick="prevImage()">&#10094;</button>
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded"
                onclick="nextImage()">&#10095;</button>
        </div>
        <div class="flex pt-2 space-x-2 max-h-1/4s">
            @foreach ($medias as $media)
                <img src="{{ $media }}" class="w-1/3 h-20 object-cover cursor-pointer"
                    onclick="changeImage(this.src)">
            @endforeach
        </div>
    </div>

    <script defer>
        let images = JSON.parse(@json($medias));
        let currentIndex = 0;

        function openModal() {
            document.getElementById("galleryModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("galleryModal").classList.add("hidden");
        }

        function changeImage(src) {
            document.getElementById("mainImage").src = src;
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
        }
    </script>
</div> --}}



<div id="image-carousel" data-carousel='{ "loadingClasses": "opacity-0","isInfiniteLoop": true }' class="relative w-full">
    <div class="carousel">
        <div class="carousel-body h-full opacity-0">
            <!-- Slide 1 -->
            @foreach ($medias as $media)
                <div class="carousel-slide" >
                    <div class="flex h-full justify-center ">
                        <img src="{{ $media }}" class="h-[90vh] w-full object-contain  " alt="game" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Previous Slide -->
    <button type="button" class="carousel-prev">
        <span class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
            <span class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
        </span>
        <span class="sr-only">Previous</span>
    </button>
    <!-- Next Slide -->
    <button type="button" class="carousel-next">
        <span class="sr-only">Next</span>
        <span class="size-9.5 bg-blue-200 hidden lg:flex items-center justify-center rounded-full shadow">
            <span class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
        </span>
    </button>
</div>
