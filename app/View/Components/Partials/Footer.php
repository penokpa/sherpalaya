<?php

namespace App\View\Components\Partials;

use App\Settings\CompanySetting;
use App\Settings\ContactUsSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public CompanySetting $companySetting;
    public ContactUsSetting $contactUsSetting;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->companySetting = app(CompanySetting::class);
        $this->contactUsSetting = app(ContactUsSetting::class);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.footer');
    }
}
