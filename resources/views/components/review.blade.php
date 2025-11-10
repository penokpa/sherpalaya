<div class="bg-blue-100/20 font-body">

    <div class="h-20"></div>

    <div class="2xl:mx-32 mx-4">
        <div class="">
            <h5 class="text-3xl md:text-4xl font-body font-medium uppercase tracking-normal text-black text-left md:text-left"
                data-aos="fade-down" data-aos-duration="1200">
                Real Stories, Real Adventures!</h5>
            <div class="h-6 md:h-12"></div>
        </div>
        <div class="accordion accordion-shadow max-w-full ">
            {{-- First review --}}
            @foreach ($allReviews as $review)
                <div class="accordion-item accordion-item-active:scale-[1] transition-transform ease-in duration-300 delay-[1ms] {{ $loop->index == 0 ? 'accordion-item-active:mb-3 active' : 'accordion-item-active:my-3' }}"
                    id="review-{{ $review->id }}">

                    <button class="accordion-toggle inline-flex items-center justify-between text-start bg-blue-100/50"
                        aria-controls="review-{{ $review->id }}-collapse"
                        aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}">
                        <div class="flex gap-4">
                            <div class="avatar">
                                <div class="size-12 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-2.png" alt="avatar" />
                                </div>
                            </div>
                            <div>
                                <p class="mb-0.5 text-black text-lg font-body font-normal tracking-tight ">
                                    {{ $review->name }}</p>
                                <p class=" text-black font-light text-lg tracking-wide">{{ $review->title }}</p>
                            </div>
                        </div>
                        <span
                            class="icon-[tabler--chevron-left] accordion-item-active:-rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:-rotate-180"></span>
                    </button>
                    <div id="review-{{ $review->id }}-collapse"
                        class="accordion-content w-full overflow-hidden transition-[height] duration-300 {{ $loop->index != 0 ? 'hidden' : '' }}"
                        aria-labelledby="review-{{ $review->id }}" role="region">
                        <div class="px-5 pb-4 bg-blue-100/50">
                            <p class="text-secondary  ">
                            <blockquote class="relative md:ml-10 p-4 text-lg/7">
                                <span
                                    class="icon-[tabler--quote] text-base-300/80 absolute -start-3 -top-3 size-8 rotate-180 rtl:rotate-0 opacity-25"></span>

                                <div class="relative z-[1]">
                                    <p class="text-black font-body font-light tracking-wide ">
                                        <em>
                                            {{ $review->description }}
                                        </em>
                                    </p>
                                </div>
                            </blockquote>

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="h-20"></div>

    {{-- {{ route('show_trek', $trek->id) }} --}}
</div>
