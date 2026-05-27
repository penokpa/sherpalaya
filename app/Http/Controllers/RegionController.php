<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Trekking regions hub — grid of region cards.
     */
    public function index()
    {
        $regions = Region::query()
            ->with(['coverImage', 'treks' => fn ($q) => $q->published()->with('coverImage')])
            ->get()
            ->filter(fn ($r) => $r->treks->isNotEmpty())
            ->sortBy('sort_order')
            ->values();

        return view('website.regions.index', [
            'regions' => $regions,
        ]);
    }

    /**
     * Region detail page — trek listing filtered to this region.
     */
    public function show(Request $request, string $locale, string $slug)
    {
        $region = Region::query()
            ->where('slug', $slug)
            ->with(['coverImage', 'treks' => fn ($q) => $q->published()->with('coverImage')])
            ->firstOrFail();

        return view('website.regions.show', [
            'region' => $region,
        ]);
    }
}
