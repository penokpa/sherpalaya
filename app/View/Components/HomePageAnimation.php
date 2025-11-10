<?php

namespace App\View\Components;

use App\Settings\LandingPageSetting;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HomePageAnimation extends Component
{
    public LandingPageSetting $landingPageSetting;
    public Collection $animationSections;
    public array $animationMediaUrls = [];

    public array $askForAnimation = [];
    public array $animationButton = [];

    public string $parallaxAudioUrl;
    public string $parallaxAudioType;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $landingPageSetting = $this->landingPageSetting = app(LandingPageSetting::class);

        $this->animationSections = collect($this->landingPageSetting->animation_sections ?? []);

        $mediaIds = collect([])
            ->merge($this->animationSections->pluck('image_id'))
            ->merge($this->animationSections->pluck('icon_id'))
            ->push($landingPageSetting->animation_button_icon_id)
            ->push($landingPageSetting->ask_for_animation_image_id)
            ->push($landingPageSetting->animation_sound_id)
            ->toArray();

        $mediaIds = array_merge(
            $mediaIds,
            $this->animationSections
                ->pluck('images')
                ->filter()
                ->flatten()
                ->toArray()
        );

        $this->animationMediaUrls = Media::whereIn('id', $mediaIds)
            ->get()
            ->pluck('url', 'id')
            ->toArray();

        $this->askForAnimation = [
            'title' => $landingPageSetting->ask_for_animation_title,
            'content' => $landingPageSetting->ask_for_animation_content,
            'image_id' => $landingPageSetting->ask_for_animation_image_id,
            'positive_response' => $landingPageSetting->ask_for_animation_positive_response,
            'negative_response' => $landingPageSetting->ask_for_animation_negative_response,
        ];

        $this->animationButton = [
            'icon_id' => $landingPageSetting->animation_button_icon_id,
            'text' => $landingPageSetting->animation_button_text,
        ];

        $this->parallaxAudioUrl = Media::find($landingPageSetting->animation_sound_id)?->url ?? asset('audio/background-music.mp3');
        $this->parallaxAudioType = Media::find($landingPageSetting->animation_sound_id)?->type ?? 'audio/mpeg';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-page-animation');
    }
}
