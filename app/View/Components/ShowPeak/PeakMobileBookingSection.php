<?php

namespace App\View\Components\ShowPeak;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PeakMobileBookingSection extends Component
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
        return view('components.show-peak.peak-mobile-booking-section');
    }
}
