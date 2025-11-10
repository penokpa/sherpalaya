@props([
    'id',
    'icon',
    'title',
    'image',
    'content',
    'hideAfterScroll' => false,
    'waitBeforeHide' => 0,
    'images' => [],
])

<div id="{{ $id }}" class="w-[100vw] h-[100vh] card image-full flex-col-reverse rounded-none">
    <figure class="overflow-hidden rounded-none">
        @if (is_array($images) && count($images) != 0)
            @foreach ($images as $image)
                <img src="{{ $image }}" alt="overlay image" class="hidden" />
            @endforeach
        @else
            <img src="{{ $image }}" alt="overlay image" />
        @endif
    </figure>
    <div class="card-body justify-center items-center">
        <div class="max-w-[40rem]">
            <div class="grid grid-cols-2 justify-between items-end mb-2.5 mt-2.5">
                <div class="justify-self-start">
                    <h2 class="card-title  animated-title text-3xl lg:text-6xl font-animation-title text-warning">
                        {{ $title }}
                    </h2>
                </div>
                <img src="{{ $icon }}" class="size-14 lg:size-28 animated-icon justify-self-end" />
            </div>
            <p class="text-white animated-content font-animation-content text-2xl lg:text-4xl text-justify">
                @foreach (explode(' ', $content) as $unitContent)
                    <span class="inline-block p-0 m-0">{{ $unitContent }}</span>
                @endforeach
            </p>
        </div>


        {{ $slot ?? '' }}
    </div>
</div>

@push('scripts')
    <script type="module">
        document.addEventListener("DOMContentLoaded", function() {

            let animationInviewSelector = "#{{ $id }} h2";
            let animationRootId = "#{{ $id }}";
            let animationRoot = document.querySelector(animationRootId);
            let hideAfterScroll = {{ $hideAfterScroll ? 'true' : 'false' }};
            let waitBeforeHide = {{ $waitBeforeHide }};


            let multipleImages = animationRoot.querySelectorAll("figure img");

            let totalAnimationDuration = 0;


            let inviewEffect = window.motion.inView(animationInviewSelector, (element) => {

                let contentSpanElements = animationRoot.querySelector(".animated-content").querySelectorAll(
                    'span');

                let logoAnimationSequence = [
                    animationRoot.querySelector(".animated-icon"),
                    {
                        scaleY: [4, 1]
                    },
                    {
                        duration: 1,
                        at: 0,
                        type: window.motion.spring,
                    }
                ];

                let titleAnimationSequence = [
                    animationRoot.querySelector(".animated-title"),
                    {
                        scaleX: [7, 1],
                    },
                    {
                        duration: 1,
                        at: 0,
                        type: window.motion.spring,
                    }
                ];

                totalAnimationDuration = 1;

                let contentSpanAnimationSequence = [
                    contentSpanElements,
                    {
                        scale: [0, 1],
                    },
                    {
                        duration: (contentSpanElements.length + 1) * 0.125,
                        delay: window.motion.stagger(0.125)
                    }
                ];

                totalAnimationDuration = 1 * (contentSpanElements.length + 1) * 0.125;


                let sequence = [
                    logoAnimationSequence,
                    titleAnimationSequence,
                    contentSpanAnimationSequence,
                ];

                if (hideAfterScroll) {
                    console.log("Hiding after scroll {{ $id }}");
                    sequence.push([
                        animationRoot,
                        {
                            scale: [1, 1],
                        },
                        {
                            duration: waitBeforeHide,
                        }
                    ]);

                    sequence.push([
                        animationRoot,
                        {
                            opacity: [1, 0]
                        },
                        {
                            duration: 0.5
                        },
                    ]);

                    totalAnimationDuration = 1 + waitBeforeHide + 0.5;


                } else {
                    totalAnimationDuration = 50;

                }

                let imageAnimation = window.motion.animate(
                    animationRoot.querySelector("figure img"), {
                        scale: [1, 2]
                    }, {
                        duration: 50,
                    }
                );

                let sequenceAnimation = window.motion.animate(sequence);
                let imageAnimationInvervalId = null;
                if (multipleImages.length > 1) {
                    let currentImageIndex = 0;
                    imageAnimationInvervalId = setInterval(function() {
                        if (currentImageIndex >= multipleImages.length) {
                            return;
                        }

                        if (currentImageIndex > 0) {
                            multipleImages[currentImageIndex - 1].classList.add('hidden');
                        }
                        multipleImages[currentImageIndex].classList.remove('hidden');
                        currentImageIndex = currentImageIndex + 1;
                    }, (totalAnimationDuration * 1000 / multipleImages.length));
                }


                sequenceAnimation.then(() => {
                    if (imageAnimationInvervalId !== null) {
                        // window.clearInverval(imageAnimationInvervalId);
                    }
                    if (hideAfterScroll) {
                        animationRoot.remove();
                    }
                });


                return (leaveInfo) => {
                    imageAnimation.stop();
                    sequenceAnimation.stop();
                    // imageAnimation.stop();
                    // contentAnimation.stop();
                };
            });

        });
    </script>
@endpush
