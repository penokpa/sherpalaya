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

        $allTreks = Category::with([
            'treks',
        ])->where('type', CategoryType::TREK)
            ->get();

        // dd($allTreks);
        return view('website.trekking', [
            'allTreks' => $allTreks,
            'pageSetting' => $pageSetting,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $locale, string $id)
    {
        $trek = Trek::with([
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
