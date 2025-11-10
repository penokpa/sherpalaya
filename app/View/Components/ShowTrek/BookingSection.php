<?php

namespace App\View\Components\ShowTrek;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookingSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $bookingType,
        public string $bookingId
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-trek.booking-section');
    }
}
