<?php

namespace App\View\Components\Booking;

use App\Contracts\CanBeInquiried;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class BookingSection extends Component
{
    public CanBeInquiried $bookingFor;

    /**
     * Create a new component instance.
     */
    public function __construct(
        CanBeInquiried $bookingFor,
    ) {
        $this->bookingFor = $bookingFor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.booking.booking-section'
        );
    }
}
