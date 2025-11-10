@props(['componentId', 'readMoreButtonId' => Str::random(16)])
<button class="btn btn-text read-more hidden" id="{{ $readMoreButtonId }}">
    Read More
</button>

@push('scripts')
    <script defer>
        document.addEventListener('DOMContentLoaded', (e) => {
            let expeditionDescription = document.getElementById('{{ $componentId }}');
            let expeditionDescriptionReadMore = document.getElementById('{{ $readMoreButtonId }}');

            let descriptionDivHeight = expeditionDescription.offsetHeight;
            let desriptionDivLineHeight = parseInt(window.getComputedStyle(expeditionDescription).lineHeight);


            let descriptionLines = descriptionDivHeight / desriptionDivLineHeight;

            if (descriptionLines > 10) {
                expeditionDescriptionReadMore.classList.remove('hidden');
                expeditionDescription.classList.add('line-clamp-[10]');
            }

            expeditionDescriptionReadMore.addEventListener('click', function(clickEvent) {

                let isInReadMoreState = expeditionDescriptionReadMore.classList.contains('read-more');

                console.log("Read more clicked", {
                    clickEvent,
                    isInReadMoreState
                });


                if (isInReadMoreState) {
                    expeditionDescriptionReadMore.classList.remove('read-more');
                    expeditionDescription.classList.remove('line-clamp-[10]');
                    expeditionDescriptionReadMore.innerHTML = "Read Less";
                } else {
                    expeditionDescriptionReadMore.classList.add('read-more');
                    expeditionDescription.classList.add('line-clamp-[10]');
                    expeditionDescriptionReadMore.innerHTML = "Read More";
                }
            });
        });
    </script>
@endpush
