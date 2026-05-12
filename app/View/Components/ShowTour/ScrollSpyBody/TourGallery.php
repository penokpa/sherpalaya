<?php

namespace App\View\Components\ShowTour\ScrollSpyBody;

use App\Models\Tour;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourGallery extends Component
{
    public Tour $tour;
    
    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-tour.scroll-spy-body.tour-gallery');
    }
}
