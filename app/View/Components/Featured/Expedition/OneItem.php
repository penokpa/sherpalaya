<?php

namespace App\View\Components\Featured\Expedition;

use App\Models\Expedition;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OneItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $expeditions;
    public LandingPageSetting $landingPageSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->expeditions = Expedition::all();
        $this->landingPageSetting = app(LandingPageSetting::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.featured.expedition.one-item',
            ['expeditions' => $this->expeditions]
        );
    }
}
