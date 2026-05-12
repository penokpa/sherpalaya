<?php

namespace App\Http\Controllers;

use App\Models\OurSherpa;
use App\Settings\PageSetting;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function index()
    {
        $pageSetting = app(PageSetting::class);

        // $expedSherpas = OurSherpa::whereHas('expeditions')
        //     ->with([
        //         'profilePicture',
        //         'awardsAndCertificates',
        //         'expeditions',
        //     ])
        //     ->get();

        $allSherpas = OurSherpa::with([
            'profilePicture',
            'awardsAndCertificates',
            'expeditions',
            'treks',
            'tours',
        ])
            ->get();

        // $trekSherpas = OurSherpa::whereHas('treks')
        //     ->with([
        //         'profilePicture',
        //         'awardsAndCertificates',
        //         'treks',
        //     ])
        //     ->get();
        // $tourSherpas = OurSherpa::whereHas('tours')
        //     ->with([
        //         'profilePicture',
        //         'awardsAndCertificates',
        //         'tours'
        //     ])
        //     ->get();


        return view('website.company.our_team', [
            'pageSetting' => $pageSetting,
            'allSherpas' => $allSherpas,
        ]);
    }


    public function show(Request $request, string $locale, string $id)
    {
        $sherpa = OurSherpa::findOrFail($id);
        return view('website.id_pages.show_team_member', [
            'sherpa' => $sherpa,
            'seoData' => $sherpa->getDynamicSEOData(),
        ]);
    }
}
