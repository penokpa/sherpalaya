<?php

namespace App\View\Components\Featured\Expedition;

use App\Models\Expedition;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FourItem extends Component
{
    public $featuredExpeditions;
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->featuredExpeditions = Expedition::where('is_featured', true)->get(); // Fetch data
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.featured.expedition.four-item',
            [
                'featuredExpeditions' => $this->featuredExpeditions
            ]
        );
    }
}
