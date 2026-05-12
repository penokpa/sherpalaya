<?php

namespace App\View\Components\Partials;

use App\Enums\CategoryType;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $navTours;
    public $navTreks;
    public $navExpeditions;

    public function __construct(
        public ?string $query = null,
        public ?string $type = null,
    ) {

        $this->navTours = Category::with([
            'tours'
        ])->where('type', CategoryType::TOUR)
            ->get();
        $this->navTreks = Category::with([
            'treks'
        ])->where('type', CategoryType::TREK)
            ->get();
        $this->navExpeditions = Category::with([
            'expeditions'
        ])->where('type', CategoryType::EXPEDITION)
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
