<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class WebsiteLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $showFooter = true,
        public bool $initAOS = true,
        public ?SEOData $seoData = null,
        /** Set true on pages whose first section is a dark, full-bleed hero
         *  image so the navbar fades to transparent over it. Default false
         *  (solid dark) so internal pages with light backgrounds stay legible. */
        public bool $overHero = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website-layout');
    }
}
