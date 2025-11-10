<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{-- {{ config('app.name') }} --}}
        sherpalaya
    </title>
    <link rel="icon" type="image/png" href="{{ asset('photos/logo.png') }}">


    @vite('resources/css/app.css')
    @livewireStyles

    @stack('styles')

</head>

<body class="bg-white font-mono">

    <div
    class="h-screen w-screen overflow-hidden flex flex-col justify-center items-center" id="page-loading-container">
        <span class="loading loading-spinner loading-lg"></span>
    </div>

    {{-- top --}}
    <x-partials.navbar />

    {{-- start --}}

    {{ $slot }}

    {{-- stop --}}

    @if ($showFooter)
        <x-partials.footer />
    @endif
    {{-- bottom --}}


    @vite('resources/js/app.js')
    @livewireScripts

    @if ($initAOS)
        <script type="module">
            document.addEventListener("DOMContentLoaded", function() {
                window.AOS.init();
            });
        </script>
    @endif

    <script>
        let navbarComponent = document.querySelector("#navbar");
        let pageLoadingContainer = document.querySelector("#page-loading-container");
        navbarComponent.classList.add('hidden');
        document.addEventListener("DOMContentLoaded", function() {
            navbarComponent.classList.remove('hidden');

            pageLoadingContainer.classList.remove('h-screen');
            pageLoadingContainer.classList.add('h-0');
            pageLoadingContainer.classList.add('hidden');
            });
    </script>

    @stack('scripts')
    @stack('modals')
</body>

</html>


{{--
Home
About Us
Trekking
Peaks
Expeditions
Tour
Sightseeing Tours (Helicopter/Vehicle)
Photography Tours
Cycling Tours
Running Tours
Cultural Tours/Meditation
Contact Us  --}}
