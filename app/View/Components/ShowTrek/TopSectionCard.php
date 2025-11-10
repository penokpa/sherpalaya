<?php

namespace App\View\Components\ShowTrek;

use App\Models\Trek;
use App\Settings\PageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopSectionCard extends Component
{
    public Trek $trek;
    public PageSetting $pageSetting;

    /**
     * Create a new component instance.
     */
    public function __construct(Trek $trek)
    {
        $this->pageSetting = app(PageSetting::class);
        $this->trek = $trek;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-trek.top-section-card');
    }
}
