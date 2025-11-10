<?php

namespace App\View\Components\Carousel;

use App\Models\Expedition;
use App\Models\Peak;
use App\Models\Tour;
use App\Models\Trek;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HomePageCarousel extends Component
{

    public Collection $featuredData;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $treks = Trek::with('featureImage')
            ->where('is_featured', true)
            ->get()
            ->map(function (Trek $trek) {
                return (object)[
                    'id' => $trek->id,
                    'title' => $trek->title,
                    'description' => $trek->highest_altitude . 'm',
                    'image' => $trek->featureImage,
                    'url' => "/treks/" . $trek->id,
                ];
            })->unique();

        // $peaks = Peak::with('featureImage')
        //     ->where('is_featured', true)
        //     ->get()
        //     ->map(function (Peak $peak) {
        //         return (object)[
        //             'id' => $peak->id,
        //             'title' => $peak->title,
        //             'image' => $peak->featureImage,
        //             'url' => "/peaks/" . $peak->id,
        //         ];
        //     })->unique();

        $expeditions = Expedition::with('featureImage')
            ->where('is_featured', true)
            ->get()
            ->map(function (Expedition $expedition) {
                return (object)[
                    'id' => $expedition->id,
                    'title' => $expedition->title,
                    'description' => $expedition->highest_altitude . 'm',
                    'image' => $expedition->featureImage,
                    'url' => "/expeditions/" . $expedition->id,
                ];
            })->unique();

        $tours = Tour::with('featureImage')
            ->where('is_featured', true)
            ->get()
            ->map(function (Tour $tour) {
                return (object)[
                    'id' => $tour->id,
                    'title' => $tour->title,
                    'description' =>null,
                    'image' => $tour->featureImage,
                    'url' => "/tours/" . $tour->id,

                ];
            })->unique();

        $this->featuredData = collect([
            ...$expeditions->toArray(),
            // ...$peaks->toArray(),
            ...$treks->toArray(),
            // ...$tours->toArray(),
        ])->filter(function ($data) {
            return !is_null($data->image);
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel.home-page-carousel');
    }
}
