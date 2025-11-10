<div id="{{ $id }}" class="scroll-animation-container animation-section">
    {{ $slot }}
</div>

@push('scripts')
    <script type="module">
        document.addEventListener("DOMContentLoaded", function() {

            window.motion.inView("#{{ $id }}>.animation-section>.card-body", (element) => {
                window.motion.animate(
                    element, {
                        opacity: 1,
                        x: [-100, 100]
                    }, {
                        duration: 0.9,
                        easing: [0.17, 0.55, 0.55, 1],
                    }
                );

                return () => window.motion.animate(element, {
                    opacity: 0,
                    x: -100
                });
            });
        });
    </script>
@endpush
