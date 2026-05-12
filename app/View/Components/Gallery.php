<?php

namespace App\View\Components;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Gallery extends Component
{
    public Collection $medias;

    public string $showMedia;

    /**
     * Create a new component instance.
     */
    public function __construct(
        array|Collection $medias,
        ?Media $showMedia = null,
    )
    {
        if(is_array($medias)){
            $medias = collect($medias);
        }

        $this->medias = $medias->map(function(Media $media){
            return $media->url;
        });

        if(!is_null($showMedia)){
            $this->showMedia = $showMedia->url;
        }else{
            $this->showMedia = $this->medias->first();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery');
    }
}
