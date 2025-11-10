<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Laravel\Scout\Searchable as ScoutSearchable;

trait EasySearch
{
    use ScoutSearchable;

    public function toSearchResult(): Collection
    {
        return collect([
            'id' => $this->id,
            'type' => $this->searchType(),
            'title' => $this->searchResultTitle(),
            'url' => $this->searchResultUrl(),
            'coverImage' => $this->searchResultImage(),
        ]);
    }
}
