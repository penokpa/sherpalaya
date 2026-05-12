<?php

namespace App\View\Components\Search;

use App\Contracts\CanBeEasySearched;
use App\Enums\SearchType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SearchResult extends Component
{

    public CanBeEasySearched $searchedResult;
    public Collection $result;

    /**
     * Create a new component instance.
     */
    public function __construct(
        CanBeEasySearched $searchedResult,

    ) {
        $this->searchedResult = $searchedResult;
        $this->result = $searchedResult->toSearchResult();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search.search-result');
    }
}
