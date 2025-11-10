<?php

namespace App\View\Components\ShowService;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceGallery extends Component
{
    public Service $service;
    /**
     * Create a new component instance.
     */
    public function __construct(Service $service)
    {
        $this->service = $service ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-service.service-gallery');
    }
}
