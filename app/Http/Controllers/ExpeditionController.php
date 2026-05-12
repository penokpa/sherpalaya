<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Expedition;
use App\Models\Region;
use App\Settings\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSetting = app(PageSetting::class);
        $allExpeditions = Category::with([
            'expeditions'
        ])->where('type', CategoryType::EXPEDITION)
            ->get();

        return view('website.expeditions', [
            'pageSetting' => $pageSetting,
            'allExpeditions' => $allExpeditions
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $locale, string $id)
    {
        $pageSetting = app(PageSetting::class);
        $expedition = Expedition::findOrFail($id);

        return view('website.id_pages.show_expedition', [
            'expedition'=>$expedition,
            'seoData' => $expedition->getDynamicSEOData(),
        ]);
    }
}
