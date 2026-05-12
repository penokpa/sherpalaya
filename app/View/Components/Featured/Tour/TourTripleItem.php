<?php

namespace App\View\Components\Featured\Tour;

use App\Models\Tour;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourTripleItem extends Component
{
    public $featuredTours;
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->featuredTours = Tour::where('is_featured', true)->get(); // Fetch data
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.featured.tour.tour-triple-item',
            [
                'featuredTours' => $this->featuredTours
            ]
        );
    }
}
