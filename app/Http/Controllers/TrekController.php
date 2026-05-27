<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Region;
use App\Models\Trek;
use App\Settings\PageSetting;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSetting = app(PageSetting::class);

        // /treks is now the regions hub (matches HWW's UX) — region cards first,
        // click one to see its trek list. Only includes regions with at least one
        // published trek.
        $regions = Region::query()
            ->with([
                'coverImage',
                'treks' => fn ($q) => $q->published()->with('coverImage'),
            ])
            ->get()
            ->filter(fn ($r) => $r->treks->isNotEmpty())
            ->sortBy('sort_order')
            ->values();

        return view('website.trekking', [
            'regions' => $regions,
            'pageSetting' => $pageSetting,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $locale, string $id)
    {
        $trek = Trek::published()
            ->with([
                'coverImage',
                'itineraries.destinations',
                'destinations.destinationImages',
                'images',
            ])
            ->where('id', $id)
            ->firstOrFail();
        return view('website.id_pages.show_trek', [
            'trek' => $trek,
            'seoData' => $trek->getDynamicSEOData(),
        ]);
    }
}
