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
                'termsAndCondition' => app()->currentLocale() == 'fr' ? $legalSetting->terms_and_condition_fr : $legalSetting->terms_and_condition_en,
            ]
        );
    }


    public function privacyPolicy(Request $request)
    {
        $legalSetting = app(LegalSetting::class);

        return view(
            'website.legal.privacy_policy',
            [
                'privacyPolicy' => app()->currentLocale() == 'fr' ? $legalSetting->privacy_policy_fr : $legalSetting->privacy_policy_en,
            ]
        );
    }

    public function cookiePolicy(Request $request)
    {
        $legalSetting = app(LegalSetting::class);

        return view(
            'website.legal.cookie_policy',
            [
                'cookiePolicy' => app()->currentLocale() == 'fr' ? $legalSetting->cookie_policy_fr : $legalSetting->cookie_policy_en,
            ]
        );
    }
}
