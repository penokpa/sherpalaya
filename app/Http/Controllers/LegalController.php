<?php

namespace App\Http\Controllers;

use App\Settings\LegalSetting;
use Illuminate\Http\Request;

class LegalController extends Controller
{


    public function termsAndConditions(Request $request)
    {
        $legalSetting = app(LegalSetting::class);
        return view(
            'website.legal.term_and_condition',
            [
                'termsAndCondition' => $legalSetting->terms_and_condition
            ]
        );
    }


    public function privacyPolicy(Request $request)
    {
        $legalSetting = app(LegalSetting::class);

        return view(
            'website.legal.privacy_policy',
            [
                'privacyPolicy' => $legalSetting->privacy_policy
            ]
        );
    }

    public function cookiePolicy(Request $request)
    {
        $legalSetting = app(LegalSetting::class);

        return view(
            'website.legal.cookie_policy',
            [
                'cookiePolicy' => $legalSetting->cookie_policy
            ]
        );
    }
}
