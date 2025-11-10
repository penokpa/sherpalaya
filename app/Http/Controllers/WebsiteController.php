<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Faq;
use App\Settings\AboutUsSetting;
use App\Settings\ContactUsSetting;
use App\Settings\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    public function home(Request $request){
        return view('website.home');
    }

    public function contactUs(Request $request, bool $contactUsSubmitted = false){
        $contactUsSetting = app(ContactUsSetting::class);
        return view('website.contact_us', [
            'contactUsSubmitted' => $contactUsSubmitted,
            'contactUsSetting' => $contactUsSetting,
        ]);
    }

    public function contactUsSubmit(Request $request){
        $validatedData = $request->validate([
            'full_name' => [
                'required', 'string'
            ],
            'email' => [
                'required', 'string'
            ],
            'mobile_number' => [
                'nullable', 'sometimes'
            ],
            'message' => [
                'required', 'string'
            ],
        ]);

        ContactUs::create($validatedData);
        return $this->contactUs(
            $request,
            true
        );
    }

    public function aboutUs(Request $request){
        $aboutUsSetting = app(AboutUsSetting::class);

        $faqs = Faq::all();

        return view('website.company.about_us',[
            'aboutUsSetting' => $aboutUsSetting,
            'faqs' => $faqs
        ]);
    }

    public function ourTeam(Request $request){
        return view('website.company.our_team');
    }

    public function whySherpalaya(Request $request){
        return view('website.company.why_sherpalaya');
    }

    public function changeLocale(Request $request, string $locale = 'en'){
        if (! in_array($locale, ['en', 'fr'])) {
            $locale = 'en';
        }
        App::setLocale($locale);
        Session::put('current_locale', $locale);

        return redirect()->back();
    }
}
