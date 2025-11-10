<?php

namespace App\Contracts;

use App\Enums\SearchType;
use Awcodes\Curator\Models\Media;
use Illuminate\Support\Collection;

interface CanBeEasySearched
{

    public function searchType(): SearchType;

    // Search Result Config
    public function searchResultTitle(): string;

    public function searchResultUrl(): string;

    public function searchResultImage(): ?Media;

    // Search Result
    public function toSearchResult(): Collection;
}
