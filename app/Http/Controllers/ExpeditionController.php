<?php

namespace App\Http\Controllers;

use App\Enums\CategoryTypes;
use App\Models\Category;
use App\Models\Expedition;
use App\Models\Region;
use App\Settings\PageSetting;
use Illuminate\Http\Request;

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
        ])->where('type', CategoryTypes::EXPEDITION)
            ->get();

        return view('website.expeditions', [
            'pageSetting' => $pageSetting,
            'allExpeditions' => $allExpeditions
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $expedition = Expedition::findOrFail($id);
        return view('website.id_pages.show_expedition', compact('expedition'));
    }
}
