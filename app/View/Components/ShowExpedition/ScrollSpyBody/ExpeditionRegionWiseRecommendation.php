<?php

namespace App\View\Components\ShowExpedition\ScrollSpyBody;

use App\Models\Expedition;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class ExpeditionRegionWiseRecommendation extends Component
{
    public Expedition $expedition;
    public Collection $recommendedExpeditions;

    public function __construct(Expedition $expedition)
    {
        $this->expedition = $expedition;

        // Fetch expeditions in the same region, excluding the current one
        $this->recommendedExpeditions = Expedition::where('region_id', $expedition->region_id)
            ->where('id', '!=', $expedition->id) // Exclude the current expedition
            ->get();
    }

    public function render()
    {
        return view('components.show-expedition.scroll-spy-body.expedition-region-wise-recommendation', [
            'recommendedExpeditions' => $this->recommendedExpeditions
        ]);
    }
}
