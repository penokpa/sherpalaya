<?php

namespace App\View\Components\Search;

use App\Enums\SearchType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchInput extends Component
{
    public ?string $query;
    public ?string $type;
    public array $searchFilters;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $query = null,
        ?string $type = null,
    ) {
        $this->query = $query;
        $this->type = $type;
        $this->searchFilters = SearchType::cases();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search.search-input');
    }
}
