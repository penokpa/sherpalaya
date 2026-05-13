<?php

namespace App\Filament\Fields;

use Awcodes\Curator\Components\Forms\CuratorPicker as FormsCuratorPicker;
use Filament\Forms\Components\Actions\Action;

class CuratorPicker extends FormsCuratorPicker
{
    public function getPickerAction(): Action
    {
        return parent::getPickerAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }

    public function getRemoveAction(): Action
    {
        return parent::getRemoveAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }

    public function getRemoveAllAction(): Action
    {
        return parent::getRemoveAllAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }

    /**
     * Full-screen hero (homepage carousel). Landscape 16:9, min 2400x1350.
     */
    public function heroImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(8 * 1024)
            ->rules(['dimensions:min_width=1920,min_height=1080'])
            ->helperText('Landscape 16:9 · min 2400×1350 px · JPG / PNG / WebP · max 8 MB. Keep subject centered (sides crop on mobile).');
    }

    /**
     * Detail-page cover banner (e.g. expedition / trek page hero). Landscape 16:9, min 1920x1080.
     */
    public function coverImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->rules(['dimensions:min_width=1600,min_height=900'])
            ->helperText('Landscape 16:9 · min 1920×1080 px · JPG / PNG / WebP · max 5 MB. Keep subject centered.');
    }

    /**
     * Homepage featured card image. Landscape 3:2 or 4:3, min 1600x1200.
     */
    public function featureImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->rules(['dimensions:min_width=1400,min_height=900'])
            ->helperText('Landscape 4:3 or 3:2 · min 1600×1200 px · JPG / PNG / WebP · max 5 MB.');
    }

    /**
     * Gallery image (mixed orientation OK). Min 1200px on long edge.
     */
    public function galleryImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->rules(['dimensions:min_width=1200'])
            ->helperText('Any orientation · min 1200 px on long edge · JPG / PNG / WebP · max 5 MB.');
    }

    /**
     * Portrait people photo (sherpa profile etc.). Portrait 3:4, min 1200x1600.
     */
    public function portraitImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(4 * 1024)
            ->rules(['dimensions:min_width=800,min_height=1000'])
            ->helperText('Portrait 3:4 · min 1200×1600 px · JPG / PNG / WebP · max 4 MB. Face/subject in the upper third.');
    }

    /**
     * Square image (avatars, logos, review profile pics). 1:1, min 400x400.
     */
    public function squareImage(int $minPx = 400): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(2 * 1024)
            ->rules(["dimensions:min_width={$minPx},min_height={$minPx},ratio=1/1"])
            ->helperText("Square 1:1 · min {$minPx}×{$minPx} px · JPG / PNG / WebP · max 2 MB.");
    }

    /**
     * Small UI icon (animation icons, button icons). Square, transparent PNG/SVG ok.
     */
    public function iconImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/png', 'image/webp', 'image/svg+xml'])
            ->maxSize(500)
            ->helperText('Square, transparent background · max 500 KB · PNG / WebP / SVG.');
    }

    /**
     * Logo. PNG/SVG, transparent background.
     */
    public function logoImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/png', 'image/webp', 'image/svg+xml'])
            ->maxSize(1024)
            ->helperText('Transparent background · PNG / WebP / SVG · max 1 MB.');
    }
}
