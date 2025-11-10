<?php

namespace App\View\Components\ShowTour\ScrollSpyBody;

use App\Models\Tour;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class TourRegionWiseRecommendation extends Component
{
    public Tour $tour;
    public Collection $recommendedTours;

    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
        
        // Fetch all tours with the same type, excluding the current tour
        $this->recommendedTours = Tour::where('type', $tour->type)
            ->where('id', '!=', $tour->id) // Exclude current tour
            ->get();
    }

    public function render()
    {
        return view('components.show-tour.scroll-spy-body.tour-region-wise-recommendation', [
            'recommendedTours' => $this->recommendedTours
        ]);
    }
}
