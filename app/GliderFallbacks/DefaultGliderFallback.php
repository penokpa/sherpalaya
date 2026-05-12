<?php

namespace App\GliderFallbacks;

use Awcodes\Curator\Glide\GliderFallback;
 
class DefaultGliderFallback extends GliderFallback
{
    public function getAlt(): string
    {
        return 'default fallback image';
    }
 
    public function getHeight(): int
    {
        return 640;
    }
 
    public function getKey(): string
    {
        return 'default';
    }
 
    public function getSource(): string
    {
        return asset('/photos/kanchenjunga.jpg');
    }
 
    public function getType(): string
    {
        return 'image/jpg';
    }
 
    public function getWidth(): int
    {
        return 420;
    }
}
