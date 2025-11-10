<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $query = null,
        public ?string $type = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search.search-form');
    }
}
