<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CanBeInquiried
{
    public function getKey();
    public function inquiries(): MorphMany;
    public function getWhatsappUrl(): string;
    public function getUrl(): string;
}
