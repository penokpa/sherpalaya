<?php

namespace App\View\Components\ShowTrek\ScrollSpyBody;

use App\Models\Trek;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TrekRegionWiseRecommendation extends Component
{
    public Trek $trek;
    public Collection $recommendedTreks;

    public function __construct(Trek $trek)
    {
        $this->trek = $trek;

        // Fetch treks in the same region, excluding the current one
        $this->recommendedTreks = Trek::where('region_id', $trek->region_id)
            ->where('id', '!=', $trek->id) // Exclude the current trek
            ->get();
    }
    public function render(): View|Closure|string
    {
        return view('components.show-trek.scroll-spy-body.trek-region-wise-recommendation');
    }
}
