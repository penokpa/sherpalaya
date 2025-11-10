<?php

namespace App\View\Components\Featured\Tour;

use App\Models\Tour;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourSingleItem extends Component
{
    public $tours;
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tours = Tour::all();
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.featured.tour.tour-single-item',
            ['tours' => $this->tours]
        );
    }
}
