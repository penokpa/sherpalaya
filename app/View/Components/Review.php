<?php

namespace App\View\Components;

use App\Models\Review as ReviewModel;
use App\Settings\LandingPageSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class Review extends Component
{
    public Collection $allReviews;
    public ?string $sectionTitle;
    public ?string $sectionSubtitle;
    public ?string $googleUrl;
    public ?string $tripadvisorUrl;
    public ?string $trustpilotUrl;

    public function __construct()
    {
        $this->allReviews = ReviewModel::where('display_in_home_page', true)
            ->orderByDesc('reviewed_at')
            ->limit(8)
            ->get();

        $settings = app(LandingPageSetting::class);
        $locale = App::getLocale() === 'fr' ? 'fr' : 'en';

        $this->sectionTitle = $settings->{"review_section_title_{$locale}"} ?? null;
        $this->sectionSubtitle = $settings->{"review_section_subtitle_{$locale}"} ?? null;
        $this->googleUrl = $settings->google_reviews_url;
        $this->tripadvisorUrl = $settings->tripadvisor_url;
        $this->trustpilotUrl = $settings->trustpilot_url;
    }

    public function shouldRender(): bool
    {
        return $this->allReviews->isNotEmpty();
    }

    public function render(): View|Closure|string
    {
        return view('components.review');
    }
}
