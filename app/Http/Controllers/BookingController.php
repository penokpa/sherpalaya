<?php

namespace App\Http\Controllers;

use App\Enums\InquiryType;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function addBooking(Request $request)
    {
        $validatedData = $request->validate([
            'inquiriable_id' => [
                'required',
                'string'
            ],
            'inquiriable_type' => [
                'required',
                'string'
            ],
            'full_name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'message' => [
                'required',
                'string'
            ],
        ]);

        Inquiry::create([
            ...$validatedData,
            'type' => 'booking'
        ]);

        $previousUrl = redirect()
            ->back()
            ->getTargetUrl();

        $url = Arr::last(
            explode('?', $previousUrl)
        );

        return redirect()
            ->to(
                $url . '?' . http_build_query([
                    'booking_success' => true
                ])
            );
    }

    public function addInquiry(Request $request)
    {
        $validatedData = $request->validate([
            'inquiriable_id' => [
                'required',
                'string'
            ],
            'inquiriable_type' => [
                'required',
                'string'
            ],
            'full_name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'message' => [
                'required',
                'string'
            ],
        ]);

        Inquiry::create([
            ...$validatedData,
            'type' => 'inquiry'
        ]);

        $previousUrl = redirect()
            ->back()
            ->getTargetUrl();

        $url = Arr::last(
            explode('?', $previousUrl)
        );

        return redirect()
            ->to(
                $url . '?' . http_build_query([
                    'inquiry_success' => true
                ])
            );
    }
}
