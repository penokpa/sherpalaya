<?php

namespace App\View\Components\ShowPeak\ScrollSpyBody;

use App\Models\Peak;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PeakGallery extends Component
{
    public Peak $peak;
    
    public function __construct(Peak $peak)
    {
        $this->peak = $peak;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-peak.scroll-spy-body.peak-gallery');
    }
}
