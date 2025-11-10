<div class="bg-transparent">
    <div class="breadcrumbs 2xl:mx-32 mx-4 text-accent  ">
        <ul >
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="hover:text-primary hover:underline decoration-wavy">
                    @if (!empty($breadcrumb['url']))
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    @else
                        <span aria-current="page">{{ $breadcrumb['name'] }}</span>
                    @endif
                </li>
                @if (!$loop->last)
                    <li class="breadcrumbs-separator rtl:rotate-180">
                        <span class="icon-[tabler--chevron-right]"></span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
