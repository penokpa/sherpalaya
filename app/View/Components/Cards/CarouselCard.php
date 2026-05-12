<?php

namespace App\View\Components\Cards;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarouselCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $url,
        public ?Media $image,
        public ?string $description = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.carousel-card');
    }
}
