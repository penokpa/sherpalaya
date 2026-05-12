<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ReviewPlatform: string implements HasLabel
{
    case GOOGLE = 'google';
    case TRIPADVISOR = 'tripadvisor';
    case TRUSTPILOT = 'trustpilot';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::GOOGLE => 'Google',
            self::TRIPADVISOR => 'TripAdvisor',
            self::TRUSTPILOT => 'Trustpilot',
        };
    }

    public function badgeIcon(): string
    {
        return match ($this) {
            self::GOOGLE => 'icon-[logos--google-icon]',
            self::TRIPADVISOR => 'icon-[simple-icons--tripadvisor]',
            self::TRUSTPILOT => 'icon-[simple-icons--trustpilot]',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::GOOGLE => 'text-[#4285F4]',
            self::TRIPADVISOR => 'text-[#34E0A1]',
            self::TRUSTPILOT => 'text-[#00B67A]',
        };
    }
}
