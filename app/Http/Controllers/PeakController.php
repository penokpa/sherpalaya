<?php

namespace App\Http\Controllers;

use App\Models\Peak;
use App\Models\Region;
use App\Settings\PageSetting;
use Illuminate\Http\Request;

class PeakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSetting = app(PageSetting::class);
        $peaksRegion = Region::with([
            'peaks'
        ])->get();

        return view('website.peaks', [
            'pageSetting' => $pageSetting,
            'peaksRegion' => $peaksRegion,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $pageSetting = app(PageSetting::class);

        $peak = Peak::findOrFail($id);
        return view('website.id_pages.show_peak', [
            'peak' => $peak,
            'pageSetting' => $pageSetting,
        ]);
    }
}
