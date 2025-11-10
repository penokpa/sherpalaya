<?php

namespace App\View\Components\Partials;

use App\Enums\CategoryTypes;
use App\Models\Category;
use App\Models\Expedition;
use App\Models\Peak;
use App\Models\Region;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Trek;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $navTours;
    public $navTreks;
    public $navExpeditions;
    public $navServices;

    public function __construct(
        public ?string $query = null,
        public ?string $type = null,
    ) {

        $this->navTours = Category::with([
            'tours'
        ])->where('type', CategoryTypes::TOUR)
            ->get();
        $this->navTreks = Category::with([
            'treks'
        ])->where('type', CategoryTypes::TREK)
            ->get();
        $this->navExpeditions = Category::with([
            'expeditions'
        ])->where('type', CategoryTypes::EXPEDITION)
            ->get();
        $this->navServices = Service::select('id', 'title')
            ->get();
            // dd($this->navServices);
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.navbar');
    }
}
