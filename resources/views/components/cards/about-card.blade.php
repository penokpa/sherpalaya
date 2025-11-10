<div  style="background-image: url('{{ $parallaxImageUrl }}');"
    class="bg-cover object-center bg-center h-[80vh] w-full bg-fixed ">
</div>
{{-- <div class="bg-blue-100/10">
    <div class="mx-0 w-full overflow-hidden">
        <div id="audio-section" style="background-image: url('{{ $parallaxImageUrl }}');"
            class="bg-cover object-center bg-center h-[150vh] w-full bg-fixed scale-[.4]">
        </div>
    </div>

    <!-- Hidden Audio Player -->
    <audio id="background-audio" loop>
        <source src="{{ $parallaxAudioUrl }}" type="{{ $parallaxAudioType }}">
        Your browser does not support the audio element.
    </audio>

    @push('scripts')
        <script type="module">
            let section = document.getElementById("audio-section");
            let audio = document.getElementById("background-audio");

            document.addEventListener("DOMContentLoaded", function() {


                window.motion.inView(section, onInViewEvent);
            });

            function onInViewEvent(element) {
                let animation = window.motion.animate(
                    element, {
                        scale: [1, 1.5]
                    }, {
                        duration: 50
                    }
                );

                animation.then(()=>{
                    audio.pause();
                    if(animation.animations.length > 0){
                        let lastAnimation = animation.animations[animation.animations.length - 1];
                        if(!lastAnimation.isStopped){
                            audio.currentTime = 0;
                        }
                    }
                });

                if (audio.paused) {
                    audio.play().catch((error) => console.log("Autoplay blocked", error));
                }
                return (leaveInfo) => offInViewEvent(animation, element, leaveInfo);
            }

            function offInViewEvent(animation, element, leaveInfo) {
                audio.pause();
                animation.stop();
            }
        </script>
    @endpush
</div> --}}
