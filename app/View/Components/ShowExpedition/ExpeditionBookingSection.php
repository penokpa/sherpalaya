<?php

namespace App\View\Components\ShowExpedition;

use App\Models\Expedition;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExpeditionBookingSection extends Component
{
    public Expedition $expedition;
    
    public function __construct(Expedition $expedition)
    {
        $this->expedition = $expedition;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-expedition.expedition-booking-section');
    }
}
