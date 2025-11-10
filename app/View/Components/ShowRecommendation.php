<?php

namespace App\View\Components;

use App\Models\DestinationExpedition;
use App\Models\DestinationPeak;
use App\Models\DestinationService;
use App\Models\DestinationTour;
use App\Models\DestinationTrek;
use App\Models\Expedition;
use App\Models\Peak;
use App\Models\Region;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Trek;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;


class ShowRecommendation extends Component
{
    public Model $recommendFor;

    public array $recommendations;

    /**
     * Create a new component instance.
     * trek
     * expedition
     * tour
     * peak
     * service
     */
    public function __construct(

        Model $recommendFor
    ) {
        $this->recommendFor = $recommendFor;

        $allData = $this->getData();

        $this->recommendations = $this->sortRecommendations($allData);
    }

    public function getData(): Collection
    {

        $destinationIds = $this->recommendFor->destinations()->get()->pluck('id');

        $treksQuery = DestinationTrek::whereIn('destination_id', $destinationIds);
        $expeditionsQuery = DestinationExpedition::whereIn('destination_id', $destinationIds);
        // $peaksQuery = DestinationPeak::whereIn('destination_id', $destinationIds);
        $toursQuery = DestinationTour::whereIn('destination_id', $destinationIds);
        $servicesQuery = DestinationService::whereIn('destination_id', $destinationIds);

        if ($this->recommendFor instanceof Trek) {
            $treksQuery = $treksQuery->where('trek_id', '<>', $this->recommendFor->id);
        }
        if ($this->recommendFor instanceof Expedition) {
            $expeditionsQuery = $expeditionsQuery->where('expedition_id', '<>', $this->recommendFor->id);
        }

        // if ($this->recommendFor instanceof Peak) {
        //     $peaksQuery = $peaksQuery->where('peak_id', '<>', $this->recommendFor->id);
        // }
        if ($this->recommendFor instanceof Tour) {
            $toursQuery = $toursQuery->where('tour_id', '<>', $this->recommendFor->id);
        }
        if ($this->recommendFor instanceof Service) {
            $servicesQuery = $servicesQuery->where('service_id', '<>', $this->recommendFor->id);
        }

        $trekIds = $treksQuery->get(['id'])->pluck('id');
        $expeditionIds = $expeditionsQuery->get(['id'])->pluck('id');
        // $peakIds = $peaksQuery->get(['id'])->pluck('id');

        $tourIds = $toursQuery->get(['id'])->pluck('id');
        $serviceIds = $servicesQuery->get(['id'])->pluck('id');

        $tours = Tour::with('coverImage')
            ->whereIn('id', $tourIds)
            ->get();
        $services = Service::with('coverImage')
            ->whereIn('id', $serviceIds)
            ->get();

        $treks = Trek::with('coverImage')
            ->whereIn('id', $trekIds)
            ->get();
        $expeditions = Expedition::with('coverImage')
            ->whereIn('id', $expeditionIds)
            ->get();
        // $peaks = Peak::with('coverImage')
        //     ->whereIn('id', $peakIds)
        //     ->get();

        return collect([
            'Treks' => $treks
                ->filter(function (Trek $trek) {
                    return !is_null($trek->coverImage);
                })
                ->map(function (Trek $trek) {
                    return (object)[
                        'title' => $trek->title,
                        'duration' => $trek->duration . ' Days',
                        'description' => Str::words($trek->description, 30),
                        'url' => '/treks/' . $trek->id,
                        'coverImage' => $trek->coverImage->url,
                    ];
                }),
            'Expeditions' => $expeditions
                ->filter(function (Expedition $expedition) {
                    return !is_null($expedition->coverImage);
                })
                ->map(function (Expedition $expedition) {
                    return (object)[
                        'title' => $expedition->title,
                        'duration' => $expedition->duration . ' Days',
                        'description' => Str::words($expedition->description),
                        'url' => '/expeditions/' . $expedition->id,
                        'coverImage' => $expedition->coverImage->url,

                    ];
                }),
            'Tours' => $tours
                ->filter(function (Tour $tour) {
                    return !is_null($tour->coverImage);
                })
                ->map(function (Tour $tour) {
                    return (object)[
                        'title' => $tour->title,
                        'duration' => $tour->duration,
                        'description' => Str::words($tour->description),
                        'url' => '/tours/' . $tour->id,
                        'coverImage' => $tour->coverImage->url,

                    ];
                }),
            // 'Peaks' => $peaks
            //     ->filter(function (Peak $peak) {
            //         return !is_null($peak->coverImage);
            //     })
            //     ->map(function (Peak $peak) {
            //         return (object)[
            //             'title' => $peak->title,
            //             'duration' => $peak->duration . ' Days',
            //             'description' => Str::words($peak->description),
            //             'url' => '/peaks/' . $peak->id,
            //             'coverImage' => $peak->coverImage->url,

            //         ];
            //     }),
            'Services' => $services
                ->filter(function (Service $service) {
                    return !is_null($service->coverImage);
                })
                ->map(function (Service $service) {
                    return (object)[
                        'title' => $service->title,
                        'duration' => null,
                        'description' => Str::words($service->description),
                        'url' => '/services/' . $service->id,
                        'coverImage' => $service->coverImage->url,

                    ];
                }),
        ]);
    }

    public function sortRecommendations(Collection $data): array
    {
        $order = [
            'Expeditions',
            'Treks',
            // 'Peaks',
            'Tours',
            'Services',
        ];

        $top = match (get_class($this->recommendFor)) {
            "App\Models\Expedition" => "Expeditions",
            "App\Models\Trek" => "Treks",
            // "App\Models\Peak" => "Peaks",
            "App\Models\Tour" => "Tours",
            "App\Models\Service" => "Services",
        };

        $sorted = [
            $top,
            ...Arr::except($order, $top)
        ];

        // dd([
        //     $sorted,
        //     $data
        // ]);

        $sortedData = [];

        foreach ($sorted as $sort) {
            $sortedData[$sort] = $data->get($sort);
        }


        return $sortedData;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-recommendation');
    }
}
