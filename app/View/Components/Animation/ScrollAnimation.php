<?php

namespace App\View\Components\Animation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ScrollAnimation extends Component
{
    public function __construct(
        public string $id,
        public string $direction = 'vertical',
        public ?string $parentScrollId = null,
        public string $class = '',
    ) {}


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animation.scroll-animation');
    }
}
