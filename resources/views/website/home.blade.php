<x-website-layout :initAOS="false">
    {{-- Page Loading Screen --}}
    <div id="homepage-loading-container"
        class="fixed top-0 left-0 w-screen h-screen flex flex-col justify-center items-center bg-white z-50">
        <img src="{{ asset('photos/logo.png') }}" alt="Logo" class="w-1/4 h-1/3 animate-pulse" />
    </div>
    <div id="main-content" class="opacity-0">
        <x-home-page-animation />
        <x-carousel.home-page-carousel />
        <x-carousel.all-cards />
        <x-stat-widget />
        <x-featured.featured-expedition />
        {{-- <x-featured.featured-peak /> --}}
        <x-featured.featured-trek />
        <x-featured.featured-tour />
        <x-cards.about-card />
        <x-review />
        {{-- <x-company.service /> --}}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let navbarComponent = document.querySelector("#navbar");
            let pageLoadingContainer = document.querySelector("#homepage-loading-container");
            let mainContent = document.querySelector("#main-content");

            // Show navbar
            if (navbarComponent) {
                navbarComponent.classList.remove('hidden');
            }

            // Hide the loading screen after page is fully loaded
            setTimeout(() => {
                pageLoadingContainer.classList.add('opacity-0', 'transition-opacity', 'duration-700');
                setTimeout(() => {
                    pageLoadingContainer.classList.add('hidden');
                }, 700); // Delay to allow smooth fade-out

                // Fade in the main content
                mainContent.classList.add('opacity-100', 'transition-opacity', 'duration-700');
            }, 500); // Optional delay before hiding the loader
        });
    </script>

</x-website-layout>
