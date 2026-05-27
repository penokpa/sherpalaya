<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Expedition;
use App\Settings\PageSetting;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Expedition landing page — grid of category tiles (Seven Summit Treks
     * style). Each tile = one category (Everest Expeditions, 8000ers, etc.).
     */
    public function index()
    {
        $pageSetting = app(PageSetting::class);

        $categories = Category::query()
            ->where('type', CategoryType::EXPEDITION)
            ->with([
                'coverImage',
                'expeditions' => fn ($q) => $q->published()->with('coverImage'),
            ])
            ->orderBy('sort_order')
            ->get()
            ->filter(fn ($c) => $c->expeditions->isNotEmpty())
            ->values();

        return view('website.expeditions', [
            'pageSetting' => $pageSetting,
            'categories'  => $categories,
        ]);
    }

    /**
     * Per-category landing — lists all expeditions in one category.
     */
    public function category(Request $request, string $locale, string $slug)
    {
        $category = Category::query()
            ->where('type', CategoryType::EXPEDITION)
            ->where('slug', $slug)
            ->with([
                'coverImage',
                'expeditions' => fn ($q) => $q->published()->with(['coverImage', 'region']),
            ])
            ->firstOrFail();

        return view('website.expedition_category', [
            'category' => $category,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $locale, string $id)
    {
        $pageSetting = app(PageSetting::class);
        $expedition = Expedition::published()->findOrFail($id);

        return view('website.id_pages.show_expedition', [
            'expedition'=>$expedition,
            'seoData' => $expedition->getDynamicSEOData(),
        ]);
    }
}
