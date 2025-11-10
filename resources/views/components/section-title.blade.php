@props([
    'title',
])

<div class="md:px-8 flex flex-col lg:flex-row md:justify-center md:items-center gap-10 md:gap-24">
    <h5 class="text-6xl md:text-8xl font-body  uppercase tracking-normal text-black font-medium text-left"
        data-aos="flip-up" data-aos-duration="800">
        {{ $title }}
    </h5>
    <p
        class="text-xl md:text-3xl mt-4 text-preety text-black
         font-light font-body lg:w-[80%] tracking-wide text-justify">
        {{ $slot }}
    </p>
    <div class="h-10 md:h-12"></div>
</div>
