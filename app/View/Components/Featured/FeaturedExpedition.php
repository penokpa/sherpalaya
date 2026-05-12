<?php

namespace App\View\Components\Featured;

use App\Models\Expedition;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedExpedition extends Component
{
    public $expeditions;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->expeditions = Expedition::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured.featured-expedition', [
            'expeditions' => $this->expeditions,
        ]);
    }
}
