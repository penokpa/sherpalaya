<?php

namespace App\View\Components\ShowExpedition;

use App\Models\Expedition;
use App\Settings\PageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExpeditionTopSectionCard extends Component
{
    public Expedition $expedition;
    public PageSetting $pageSetting;

    
    public function __construct(Expedition $expedition)
    {
        $this->pageSetting = app(PageSetting::class);
        $this->expedition = $expedition;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-expedition.expedition-top-section-card');
    }
}
