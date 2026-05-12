<?php

namespace App\View\Components\ShowPeak;

use App\Models\Peak;
use App\Settings\PageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PeakTopSectionCard extends Component
{
    public Peak $peak;
    public PageSetting $pageSetting;
    
    public function __construct(Peak $peak)
    {
        $this->pageSetting = app(PageSetting::class);
        $this->peak = $peak;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-peak.peak-top-section-card');
    }
}
