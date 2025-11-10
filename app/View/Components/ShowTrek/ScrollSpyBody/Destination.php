<?php

namespace App\View\Components\ShowTrek\ScrollSpyBody;

use App\Models\Trek;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Destination extends Component
{
    public Trek $trek;
    /**
     * Create a new component instance.
     */
    public function __construct(Trek $trek)
    {
        $this->trek = $trek;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-trek.scroll-spy-body.destination');
    }
}
