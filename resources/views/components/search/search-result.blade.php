<header class="card rounded-none image-full w-full relative flex items-center card-side group hover:shadow border">
    <img src="{{ $result->get('coverImage')?->url ?? asset('photos/P1030127.JPG') }}"
        alt="{{ $result->get('title') }} Cover Image"
        class="transition-transform brightness-75 duration-500  h-[40vh] w-full object-cover" />
    <a href="{{ $result->get('url') }}">
        <div class="card-body absolute inset-0 justify-center">
            <div class="font-oswald tracking-wide font-medium text-center">
                <h3 class="text-blue-50 text-3xl uppercase group-hover:text-warning">
                    {{ $result->get('title') }}
                </h3>
            </div>
        </div>
    </a>
</header>
