<?php

namespace App\View\Components\ShowTrek;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrekMobileBookingSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-trek.trek-mobile-booking-section');
    }
}
