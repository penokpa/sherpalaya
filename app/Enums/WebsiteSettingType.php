<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum WebsiteSettingType: string implements HasLabel
{
    case NUMBER = 'number';
    case TEXT = 'text';
    case HTML = 'html';
    case IMAGE = 'image';
    case FILE = 'file';

    public function getLabel(): ?string
    {
        return match ($this)
        {
            self::NUMBER => 'Number',
            self::TEXT => 'Text',
            self::HTML => 'HTML',
            self::IMAGE => 'Image',
            self::FILE => 'File',
        };
    }
}
