<?php

namespace App\View\Components\Featured\Trek;

use App\Models\Trek;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrekQuadItem extends Component
{
    public $featuredTreks;
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->featuredTreks = Trek::where('is_featured', true)->get(); // Fetch data
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.featured.trek.trek-quad-item',
            [
                'featuredTreks' => $this->featuredTreks
            ]
        );
    }
}
