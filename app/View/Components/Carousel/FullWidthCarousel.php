<?php

namespace App\View\Components\Carousel;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FullWidthCarousel extends Component
{
    public ?string $carouselId = null;
    public ?string $header = null;
    public ?string $viewAllUrl = null;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $carouselId = null,
        ?string $header = null,
        ?string $viewAllUrl = null,
    ) {
        if (is_null($carouselId)) {
            $carouselId = 'carousel-' . Str::random(14);
        }
        $this->carouselId = $carouselId;
        $this->header = $header;
        $this->viewAllUrl = $viewAllUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel.full-width-carousel');
    }
}
