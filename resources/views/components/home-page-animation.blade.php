<div>
    {{-- Ask for animations --}}
    <div id="ask-for-animation" class="w-[100vw] h-[100vh] card image-full flex-col-reverse rounded-none">
        <figure class="overflow-hidden rounded-none">
            <img src="{{ $animationMediaUrls[$askForAnimation['image_id']] }}" alt="overlay image" />
        </figure>
        <div class="card-body justify-center items-center">

            {{-- <span class="icon-[mynaui--{{ $icon }}] size-28 text-white animated-icon"></span> --}}
            <h2 class="card-title mb-2.5 text-white animated-title text-3xl">
                {{ $askForAnimation['title'] }}
            </h2>
            <p class="text-white animated-content">
                {{ $askForAnimation['content'] }}
            </p>
            <div class="flex flex-row items-center justify-evenly w-full max-w-64 mt-10">
                <button class="btn btn-outline btn-success min-w-20" id="ask-for-animation-positive-response">
                    {{ $askForAnimation['positive_response'] }}
                </button>
                <button class="btn btn-soft btn-error" id="ask-for-animation-negative-response">
                    {{ $askForAnimation['negative_response'] }}
                </button>
            </div>
        </div>
    </div>

    {{-- Animation sections --}}
    <div id="home-page-animation">
        @foreach ($animationSections as $animationSection)
            <x-animation.scroll-animation-section :id="$animationSection['id']" :title="$animationSection['title']" :image="isset($animationSection['images'])
                ? $animationMediaUrls[$animationSection['images'][0]]
                : $animationMediaUrls[$animationSection['image_id']]"
                :images="isset($animationSection['images'])
                    ? Arr::map($animationSection['images'], function ($imageId) use ($animationMediaUrls) {
                        return $animationMediaUrls[$imageId];
                    })
                    : []" :content="$animationSection['content']" :hideAfterScroll="$loop->remaining != 0" :waitBeforeHide="$animationSection['wait_time']" :icon="$animationMediaUrls[$animationSection['icon_id']]">
                @if ($loop->remaining == 0)
                    <div class="absolute bottom-20">
                        <p class="text-xl text-white text-center w-full cursor-pointer hidden" id="scroll-down-wrapper">
                            <img src="{{ $animationMediaUrls[$animationButton['icon_id']] }}"
                                class="inline size-8 text-white animated-scroll-down-icon" alt="Scroll down">
                            {{ $animationButton['text'] }}
                            <img src="{{ $animationMediaUrls[$animationButton['icon_id']] }}"
                                class="inline size-8 text-white animated-scroll-down-icon" alt="Scroll down">
                        </p>
                    </div>
                @endif
            </x-animation.scroll-animation-section>
        @endforeach

        <!-- Hidden Audio Player -->
        <audio id="background-audio" loop>
            <source src="{{ $parallaxAudioUrl }}" type="{{ $parallaxAudioType }}">
            Your browser does not support the audio element.
        </audio>

    </div>
</div>

@push('scripts')
    <script type="module">
        document.addEventListener("DOMContentLoaded", function() {

            let audio = document.getElementById("background-audio");

            let askedForHomepageAnimation = sessionStorage.getItem("asked-for-homepage-animation");
            let showHomepageAnimation = sessionStorage.getItem("shown-homepage-animation");

            let scrollDownIcons = document.querySelectorAll(".animated-scroll-down-icon");
            let scrollDownWrapper = document.querySelector("#scroll-down-wrapper");
            let homePageAnimationSection = document.querySelector("#home-page-animation");
            let navbar = document.querySelector("#navbar");
            let askForAnimationSection = document.querySelector("#ask-for-animation");
            let positiveResponseButton = document.querySelector("#ask-for-animation-positive-response");
            let negativeResponseButton = document.querySelector("#ask-for-animation-negative-response");

            let bodyElement = document.querySelector('body');

            let lastAnimationSectionId = "#{{ $animationSections->last()['id'] }}";

            let finalAnimationSection = document.querySelector(lastAnimationSectionId);

            navbar.classList.add('hidden');
            bodyElement.classList.add('overflow-y-hidden');

            if (askedForHomepageAnimation) {
                askForAnimationSection.remove();
            }

            if (showHomepageAnimation) {
                afterAnimationEnds();
            }
            scrollDownWrapper.classList.remove('hidden');

            positiveResponseButton.addEventListener('click', (event) => {
                askForHomepageAnimation(true);
            });

            negativeResponseButton.addEventListener('click', (event) => {
                askForHomepageAnimation(false);
            });

            window.motion.inView(scrollDownWrapper, (element) => {
                window.motion.animate(
                    scrollDownIcons, {
                        y: [-5, 5]
                    }, {
                        duration: 0.6,
                        repeat: Infinity,
                        repeatType: "reverse",

                    }
                )
            });

            window.motion.press(scrollDownWrapper, (element) => {
                let finalAnimation = window.motion.animate(
                    finalAnimationSection, {
                        y: [0, -1000]
                    }, {
                        duration: 0.5
                    }
                );

                finalAnimation.then(() => {
                    afterAnimationEnds();
                });
            });

            function afterAnimationEnds() {
                sessionStorage.setItem("shown-homepage-animation", true);
                audio.pause();
                homePageAnimationSection.remove();
                navbar.classList.remove('hidden');
                bodyElement.classList.remove('overflow-y-hidden');

                window.AOS.init();
            }

            function askForHomepageAnimation(showAnimation = true) {
                sessionStorage.setItem("asked-for-homepage-animation", true);
                askForAnimationSection.remove();
                if (!showAnimation) {
                    afterAnimationEnds();
                }

                audio.play().catch((error) => console.log("Autoplay blocked", error));

            }
        });
    </script>
@endpush
