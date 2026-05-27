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
     *
     * Note: dimension validation here is advisory (shown via helperText) — Curator's
     * picker validates its saved value (an integer media ID), not the uploaded file,
     * so a `dimensions:` rule attached here would always fail. MIME + max size still
     * enforce.
     */
    public function heroImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(8 * 1024)
            ->helperText('Drop a file here or click the tile to open the library. Recommended: landscape 16:9, min 2400×1350 px · JPG / PNG / WebP · max 8 MB. Keep subject centered (sides crop on mobile).');
    }

    /**
     * Detail-page cover banner (trek/expedition/tour hero).
     */
    public function coverImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->helperText('Drop a file here or click the tile to open the library. Recommended: landscape 16:9, min 1920×1080 px · JPG / PNG / WebP · max 5 MB. Keep subject centered.');
    }

    /**
     * Homepage featured card image. Landscape 3:2 or 4:3.
     */
    public function featureImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->helperText('Drop a file here or click the tile to open the library. Recommended: landscape 4:3 or 3:2, min 1600×1200 px · JPG / PNG / WebP · max 5 MB.');
    }

    /**
     * Gallery image (mixed orientation OK).
     */
    public function galleryImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(5 * 1024)
            ->helperText('Drop files here or click the tile to open the library. Any orientation · recommended min 1200 px on long edge · JPG / PNG / WebP · max 5 MB.');
    }

    /**
     * Portrait people photo (sherpa profile etc.). Portrait 3:4.
     */
    public function portraitImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(4 * 1024)
            ->helperText('Drop a file here or click the tile to open the library. Recommended: portrait 3:4, min 1200×1600 px · JPG / PNG / WebP · max 4 MB. Face/subject in the upper third.');
    }

    /**
     * Square image (avatars, logos, review profile pics).
     */
    public function squareImage(int $minPx = 400): static
    {
        return $this
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(2 * 1024)
            ->helperText("Drop a file here or click the tile to open the library. Recommended: square 1:1, min {$minPx}×{$minPx} px · JPG / PNG / WebP · max 2 MB.");
    }

    /**
     * Small UI icon. Transparent PNG/SVG preferred.
     */
    public function iconImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/png', 'image/webp', 'image/svg+xml'])
            ->maxSize(500)
            ->helperText('Drop a file here or click the tile to open the library. Square, transparent background · max 500 KB · PNG / WebP / SVG.');
    }

    /**
     * Logo. PNG/SVG, transparent background.
     */
    public function logoImage(): static
    {
        return $this
            ->acceptedFileTypes(['image/png', 'image/webp', 'image/svg+xml'])
            ->maxSize(1024)
            ->helperText('Drop a file here or click the tile to open the library. Transparent background · PNG / WebP / SVG · max 1 MB.');
    }
}
