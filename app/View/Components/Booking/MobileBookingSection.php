<?php

namespace App\View\Components\Booking;

use App\Contracts\CanBeInquiried;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class MobileBookingSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public CanBeInquiried $bookingFor,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.booking.mobile-booking-section');
    }
}
