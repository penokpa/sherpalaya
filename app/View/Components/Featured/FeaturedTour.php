<?php

namespace App\View\Components\Featured;

use App\Models\Tour;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedTour extends Component
{
    public $tours;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tours = Tour::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured.featured-tour',[
            'tours' => $this->tours,
        ]);
    }
}
