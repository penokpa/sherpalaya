<?php

namespace App\View\Components\ShowTour;

use App\Models\Tour;
use App\Settings\PageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourTopSectionCard extends Component
{
    public Tour $tour;
    public PageSetting $pageSetting;

    
    public function __construct(Tour $tour)
    {
        $this->pageSetting = app(PageSetting::class);
        $this->tour = $tour;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-tour.tour-top-section-card');
    }
}
