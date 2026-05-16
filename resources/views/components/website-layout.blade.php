<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! seo(isset($seoData) ? $seoData : null) !!}

    {{-- Design system fonts: Fraunces (display) + Inter (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @livewireStyles

    @stack('styles')

</head>

<body class="bg-canvas font-sans text-ink antialiased">

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

    @stack('scripts')
    @stack('modals')

    @if ($cfAnalyticsToken = config('services.cloudflare_analytics.token'))
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
                data-cf-beacon='@json(["token" => $cfAnalyticsToken])'></script>
    @endif
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
