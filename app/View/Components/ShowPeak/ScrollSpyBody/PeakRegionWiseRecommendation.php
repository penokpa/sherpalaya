<?php

namespace App\View\Components\ShowPeak\ScrollSpyBody;

use App\Models\Peak;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PeakRegionWiseRecommendation extends Component
{
    public Peak $peak;
    public Collection $recommendedPeaks;

    public function __construct(Peak $peak)
    {
        $this->peak = $peak;

        // Fetch peaks in the same region, excluding the current one
        $this->recommendedPeaks = Peak::where('region_id', $peak->region_id)
            ->where('id', '!=', $peak->id) // Exclude the current peak
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-peak.scroll-spy-body.peak-region-wise-recommendation');
    }
}
