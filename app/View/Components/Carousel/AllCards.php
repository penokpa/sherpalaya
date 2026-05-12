<?php

namespace App\View\Components\Carousel;

use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllCards extends Component
{
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel.all-cards');
    }
}
